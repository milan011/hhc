<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    /**
     * The database table used by the model.
     * 定义模型对应数据表及主键
     * @var string
     */
    // protected $table = 'users';
    protected $table      = 'cm_carinfos';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     * 定义可批量赋值字段
     * @var array
     */

    /**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = ['ID', 'Code', 'VIN', 'Area', 'PlateNum', 'BuyDate', 'FullName', 'Factory', 'CarModel', 'CarType', 'CarYear', 'InitPrice', 'ImportType', 'MakeDate', 'Emission', 'Transmission', 'Capacity', 'CapacityNum', 'Status', 'EvalAMT', 'HfEvalById', 'XnEvalById', 'XnDate', 'JzEvalById', 'EvalDate', 'SaleAMT', 'IsSaled', 'SaledAMT', 'SaledDate', 'IsPutOn', 'PutOnDate', 'PutDownDate', 'Depreciate', 'UserKind', 'IsSchool', 'CreateDate', 'UpdateDate', 'IsDeleted', 'IsCase', 'AddCaseTime', 'FromCaseType', 'CaseUserId', 'CaseUserName', 'CaseCarId', 'Shop_Id', 'CreateId', 'Customer_Id', 'Is_Top', 'Is_Show', 'Recommend', 'Car_Status', 'Pg_description', 'XS_description', 'Description', 'Sale_number', 'Safe_end', 'Safe_type', 'Out_colorInside_color', 'AuditStatus'];

    // 插入数据时忽略唯一索引
    public static function insertIgnore($array)
    {
        $a = new static();
        if ($a->timestamps) {
            $now                 = \Carbon\Carbon::now();
            $array['CreateDate'] = $now;
            $array['updated_at'] = $now;
        }
        DB::insert('INSERT IGNORE INTO ' . $a->table . ' (' . implode(',', array_keys($array)) .
            ') values (?' . str_repeat(',?', count($array) - 1) . ')', array_values($array));
    }

    // 搜索条件处理
    public function addCondition($requestData, $is_self)
    {

        if (!isset($requestData['Is_Show'])) {
            $requestData['Is_Show'] = '';
        }

        $query = $this;

        if ($is_self) {

            if (!(Auth::user()->isSuperAdmin())) {

                if (Auth::user()->isMdLeader()) {
                    //店长
                    $user_Shop_Id = Auth::user()->Shop_Id; //用户所属门店id
                    // $this->where('Shop_Id', $user_Shop_Id);
                    $query = $query->where('Shop_Id', $user_Shop_Id);
                } else {
                    //店员
                    // $this->where('creater_id', Auth::id());
                    $query = $query->where('creater_id', Auth::id());
                }
            }
        }

        if (!empty($requestData['Code'])) {
            //有车源编码选择

            $query = $query->where('Code', $requestData['Code']);

            return $query;
        }

        //if(isset($requestData['Car_Status']) && $requestData['Car_Status'] != ''){
        /*p($requestData['Car_Status']);
        dd(empty($requestData['Car_Status']));*/
        if (!empty($requestData['Car_Status']) || ($requestData['Car_Status'] == '0')) {
            //有车源状态选项
            if ($requestData['Car_Status'] == '1') {

                $query = $query->where(function ($query) use ($requestData) {

                    $query = $query->where('Car_Status', $requestData['Car_Status']);
                    $query = $query->orWhere('Car_Status', '6');
                });
            } else {

                $query = $query->where('Car_Status', $requestData['Car_Status']);
            }
        } else {

            // $query = $query->whereIn('Car_Status', ['1', '2', '3', '4', '5', '6']);
            if (!$is_self) {
                //非自身车源
                $query = $query->where('Car_Status', '1');
            }
        }

        if (!empty($requestData['Is_Show']) || ($requestData['Is_Show'] == '0')) {

            $query = $query->where('Is_Show', $requestData['Is_Show']);
        }

        if (!empty($requestData['Transmission'])) {
            // dd($requestData['Transmission']);
            $query = $query->where(function ($query) use ($requestData) {
                foreach ($requestData['Transmission'] as $key => $gear) {
                    $query = $query->orWhere('Transmission', $gear);
                }
            });
        }

        if (!empty($requestData['Shop_Id'])) {

            $query = $query->where('Shop_Id', $requestData['Shop_Id']);
        }

        if (!empty($requestData['is_appraiser'])) {

            $query = $query->where('is_appraiser', $requestData['is_appraiser']);
        }

        if (!empty($requestData['Sale_number'])) {

            $query = $query->where('Sale_number', $requestData['Sale_number']);
        }

        if (!empty($requestData['Out_color'])) {

            $query = $query->where('Out_color', $requestData['Out_color']);
        }

        if (!empty($requestData['Capacity'])) {

            $query = $query->where('Capacity', $requestData['Capacity']);
        }

        if (!empty($requestData['CarType'])) {

            $query = $query->where('CarType', $requestData['CarType']);
        }

        if (!empty($requestData['CarModel'])) {

            $query = $query->where('CarModel', $requestData['CarModel']);
        } else {

            if (!empty($requestData['Factory'])) {
                $query = $query->where('Factory', $requestData['Factory']);
            } else {

                if (!empty($requestData['brand_id'])) {
                    $query = $query->where('brand_id', $requestData['brand_id']);
                }
            }
        }

        if (!empty($requestData['begin_Mileage'])) {
            $query = $query->where('Mileage', '>=', $requestData['begin_Mileage']);
        }

        if (!empty($requestData['end_Mileage'])) {
            $query = $query->where('Mileage', '<=', $requestData['end_Mileage']);
        }

        if (!empty($requestData['SaleAMT'])) {
            $query = $query->where('SaleAMT', '<=', $requestData['SaleAMT']);
        }

        if (!empty($requestData['bottom_price'])) {
            $query = $query->where('SaleAMT', '>=', $requestData['bottom_price']);
        }

        if (!empty($requestData['end_date'])) {
            $query = $query->where('CreateDate', '<=', $requestData['end_date']);
        }

        if (!empty($requestData['begin_date'])) {
            $query = $query->where('CreateDate', '>=', $requestData['begin_date']);
        }

        if (!empty($requestData['need_follow'])) {
            $query = $query->where('updated_at', '<=', $requestData['need_follow']);
        }

        return $query;
    }

    /**
     * 推荐车型信息的查询作用域
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOsRecommend($query, $requestData)
    {
        if (isset($requestData['SaleAMT'])) {
            $query = $query->where('SaleAMT', '<=', $requestData['SaleAMT']);
        }

        if (isset($requestData['bottom_price'])) {
            $query = $query->where('bottom_price', '>=', $requestData['bottom_price']);
        }

        $query = $query->where('Car_Status', '1');
        return $query;
    }

    // 定义Category表与Cars表一对多关系
    public function belongsToCategory()
    {

        return $this->belongsTo('App\Category', 'cate_id', 'id');
    }

    // 定义Shop表与Cars表一对多关系
    public function belongsToShop()
    {

        return $this->belongsTo('App\Shop', 'Shop_Id', 'id');
    }

    // 定义User表与Cars表一对多关系
    public function belongsToUser()
    {

        return $this->belongsTo('App\User', 'CreateId', 'id');
    }

    // 定义customer表与Cars表一对多关系
    public function belongsToCustomer()
    {

        return $this->belongsTo('App\Customer', 'Customer_Id', 'id');
    }

    // 定义customer表与Area表一对多关系
    public function belongsToCity()
    {

        return $this->belongsTo('App\Area', 'plate_city', 'id');
    }

    // 定义Car表与car_follow表一对多关系
    public function hasManyFollow()
    {
        return $this->hasMany('App\CarFollow', 'car_id', 'id');
    }

    // 定义Car表与images表一对多关系
    public function hasManyImages()
    {
        return $this->hasMany('App\Image', 'car_id', 'id')->orderBy('is_top', 'desc');
    }

    // 定义Car表与images表一对多关系
    public function hasOneImagesOnFirst()
    {
        // return $this->hasOne('App\Image', 'car_id', 'id')->where('is_top', '1');
        return $this->hasOne('App\Image', 'car_id', 'id')->orderBy('is_top', 'desc');
    }

    // 定义Car表与chance表一对多关系
    public function hasManyChances()
    {
        return $this->hasMany('App\Chance', 'car_id', 'id');
    }
}

<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Transcation extends Model
{
    /**
     * The database table used by the model.
     * 定义模型对应数据表及主键
     * @var string
     */
    // protected $table = 'users';
    protected $table      = 'smx_enterprise_transaction';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     * 定义可批量赋值字段
     * @var array
     */
    protected $fillable = ['CarId', 'BuyId', 'SaleDate', 'SaledPrice', 'SaleCommission', 'LoanCommission', 'OtherCommission', 'CarCost', 'RepairCost', 'Shop_Id', 'Create_Id', 'Status'];

    /**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes excluded from the model's JSON form.
     * //在模型数组或 JSON 显示中隐藏某些属性
     * @var array
     */
    protected $hidden = [];

    // 搜索条件处理
    public function addCondition($requestData)
    {

        $query = $this;

        $user_id = Auth::id();

        if (!(Auth::user()->isSuperAdmin())) {
            if (Auth::user()->isMdLeader()) {
                //店长
                $user_shop_id = Auth::user()->belongsToShop->id; //用户所属门店id

                $query = $query->where(function ($query) use ($user_shop_id) {

                    $query = $query->where('Shop_Id', $user_shop_id);
                    $query = $query->orWhere('partner_shop', $user_shop_id);
                });

                // $query = $query->where('shop_id', $user_shop_id);
            } else {
                //店员
                $query = $query->where(function ($query) use ($user_id) {

                    $query = $query->where('Create_Id', $user_id);
                    $query = $query->orWhere('partner_id', $user_id);
                });
                // $query = $query->where('user_id', Auth::id());
            }
        }

        if ($requestData['participate']) {
            //用户参与的销售机会
            $query = $query->where('Create_Id', '!=', $user_id);
        } else {
            //用户发起的销售机会
            $query = $query->where('Create_Id', $user_id);
        }

        if (!empty($requestData['end_date'])) {
            $query = $query->where('created_at', '<=', $requestData['end_date']);
        }

        if (!empty($requestData['begin_date'])) {
            $query = $query->where('created_at', '>=', $requestData['begin_date']);
        }

        if (isset($requestData['status']) && $requestData['status'] != '') {

            $query = $query->where('status', $requestData['status']);
        } else {

            $query = $query->whereIn('status', ['1', '2', '3', '4', '5']);
        }

        return $query;
    }

    // 定义Transcation表与Car表一对多关系
    public function belongsToCar()
    {

        return $this->belongsTo('App\Cars', 'CarId', 'ID');
    }

    // 定义Transcation表与Want表一对多关系
    public function belongsToWant()
    {

        return $this->belongsTo('App\Want', 'BuyId', 'id');
    }

    // 定义Transcation表与User表一对多关系
    public function belongsToUser()
    {

        return $this->belongsTo('App\User', 'Create_Id', 'id');
    }

    // 定义Transcation表与Shop表一对多关系
    public function belongsToShop()
    {

        return $this->belongsTo('App\Shop', 'Shop_Id', 'id');
    }
}

<?php
namespace App\Repositories\Shop;

use App\Repositories\BaseInterface\Repository;
use App\Repositories\Shop\ShopRepositoryInterface;
use App\Shop;
use Auth;
use Carbon;
use Datatables;
use DB;
use Debugbar;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PHPZen\LaravelRbac\Traits\Rbac;
use Session;

class ShopRepository implements ShopRepositoryInterface
{

    //默认查询数据
    protected $select_columns = ['id', 'pid', 'name', 'provence_id', 'city_id', 'telephone', 'address', 'status', 'user_id'];

    // 根据ID获得门店信息
    public function find($id)
    {
        return Shop::select($this->select_columns)
            ->findOrFail($id);
    }

    // 获得门店列表
    public function getAllShop()
    {
        return Shop::with('belongsToCreater', 'belongsToCity')
            ->where('status', '1')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }

    // 获得所有门店
    public function getShops()
    {
        return Shop::select($this->select_columns)
            ->with('belongsToCreater')
            ->where('status', '1')
            ->get();
    }

    // 创建门店
    public function create($requestData)
    {
        // dd($requestData->all());

        $requestData['user_id']     = Auth::id();
        $requestData['status']      = '1';
        $requestData['provence_id'] = $requestData['shopCity'][0];
        $requestData['city_id']     = $requestData['shopCity'][1];

        $shop  = new Shop();
        $input = array_replace($requestData->all());
        // $input =  array_filter($input);
        $shop->fill($input);
        // dd($shop);
        $newShop = $shop->create($input);
        // dd($shop);
        // dd($requestData->month_price);

        return $newShop;
    }

    // 修改门店
    public function update($requestData, $id)
    {
        // dd($requestData->all());
        $shop = Shop::findorFail($id);
        // dd($requestData->shopCity);
        $shop->name        = $requestData->name;
        $shop->type        = $requestData->type;
        $shop->provence_id = $requestData->shopCity[0];
        $shop->city_id     = $requestData->shopCity[1];
        $shop->telephone   = $requestData->telephone;
        $shop->address     = $requestData->address;
        $shop->save();

        return $shop;
    }

    // 删除门店
    public function destroy($id)
    {
        try {
            $shop         = Shop::findorFail($id);
            $shop->status = '0';
            $shop->save();

            return $shop;

        } catch (\Illuminate\Database\QueryException $e) {
            return false;
        }
    }

    //判断门店是否重复
    public function isRepeat($requestData)
    {

        $shop = Shop::select('id', 'name')
            ->where('name', $requestData->name)
            ->where('status', '1')
            ->first();
        // dd(isset($cate));
        return $shop;
    }
}

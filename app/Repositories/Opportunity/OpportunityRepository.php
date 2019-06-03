<?php
namespace App\Repositories\Opportunity;

use App\CustomerCar;
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

class OpportunityRepository implements OpportunityRepositoryInterface
{

    // 根据ID获得客户车源信息信息
    public function find($id)
    {
        return CustomerCar::findOrFail($id);
    }

    // 获得客户车源信息列表
    public function getAllCustomersCars($request)
    {
        $query = new CustomerCar(); // 返回的是一个CustomerCar实例,两种方法均可

        $query = $query->addCondition($request->all()); //根据条件组合语句
        $query = $query->where('mobile', '!=', '');
        $query = $query->where('status', '1');
        return $query->orderBy('created_at', 'desc')
            ->paginate(12);

        // return CustomerCar::paginate(10);
    }

    // 创建客户车源信息
    public function create($requestData)
    {
        // 添加信息
        $customerCar = new CustomerCar();

        $requestData['category_id'] = empty($requestData->type) ? '' : $requestData->type;
        $requestData['brand_id']    = empty($requestData->brand) ? '' : $requestData->brand;
        $requestData['car_factory'] = empty($requestData->company) ? '' : $requestData->company;

        // dd($requestData->all());
        $input = array_replace($requestData->all());
        $customerCar->fill($input);
        $customerCar = $customerCar->create($input);

        return $customerCar;
    }

    // 修改报名
    public function update($requestData, $id)
    {

        $carCustomer = CustomerCar::findorFail($id);
        $input       = array_replace($requestData->all());
        $carCustomer->fill($input)->save();
        // dd($carCustomer->toJson());
        Session::flash('sucess', '修改报名成功');
        return $carCustomer;
    }

    // 分发报名
    public function fenfa($id, $fenfa_shop)
    {

        $carCustomer = CustomerCar::findorFail($id);

        $carCustomer->ff_shop  = $fenfa_shop;
        $carCustomer->is_fenfa = '1';
        $carCustomer->save();
        // dd($carCustomer->toJson());
        Session::flash('sucess', '分发成功');
        return $carCustomer;
    }
}

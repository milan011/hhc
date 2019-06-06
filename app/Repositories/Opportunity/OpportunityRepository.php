<?php
namespace App\Repositories\Opportunity;

use App\Opportunity;
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
        return Opportunity::findOrFail($id);
    }

    // 获得客户车源信息列表
    public function getAllOpportunitys($request)
    {
        $query = new Opportunity(); // 返回的是一个Opportunity实例,两种方法均可

        $query = $query->addCondition($request->all()); //根据条件组合语句
        $query = $query->with('belongsToShop')->where('mobile', '!=', '');
        $query = $query->where('status', '1');
        return $query->orderBy('created_at', 'desc')
            ->paginate(12);

        // return Opportunity::paginate(10);
    }

    // 创建客户车源信息
    public function create($requestData)
    {
        // 添加信息
        $opportunity = new Opportunity();

        //$requestData['category_id'] = empty($requestData->type) ? '' : $requestData->type;
        //$requestData['brand_id']    = empty($requestData->brand) ? '' : $requestData->brand;
        //$requestData['car_factory'] = empty($requestData->company) ? '' : $requestData->company;

        // dd($requestData->all());
        $input = array_replace($requestData->all());
        $opportunity->fill($input);
        $opportunity = $opportunity->create($input);

        return $opportunity;
    }

    // 修改报名
    public function update($requestData, $id)
    {

        $carCustomer = Opportunity::findorFail($id);
        $input       = array_replace($requestData->all());
        $carCustomer->fill($input)->save();
        // dd($carCustomer->toJson());
        Session::flash('sucess', '修改报名成功');
        return $carCustomer;
    }

    // 分发报名
    public function fenfa($id, $fenfa_shop)
    {

        $carCustomer = Opportunity::findorFail($id);

        $carCustomer->ff_shop  = $fenfa_shop;
        $carCustomer->is_fenfa = '1';
        $carCustomer->save();
        // dd($carCustomer->toJson());
        Session::flash('sucess', '分发成功');
        return $carCustomer;
    }
}

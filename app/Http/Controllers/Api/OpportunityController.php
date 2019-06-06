<?php

namespace App\Http\Controllers\Api;

use App\Area;
use App\Http\Controllers\Controller;
use App\Http\Requests;
// use App\Http\Requests\CustomerOpportunity\StoreCustomerOpportunityRequest;
use App\Http\Resources\Opportunity\OpportunityResource;
use App\Image;
use App\Repositories\Opportunity\OpportunityRepositoryInterface;
use App\Shop;
use Auth;
use DB;
use Gate;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    protected $opportunity;

    public function __construct(

        OpportunityRepositoryInterface $opportunity
    ) {
        $this->opportunity = $opportunity;

        // $this->middleware('brand.create', ['only' => ['create']]);
    }

    /**
     * Display a listing of the resource.
     * 所有车源列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $opportunitys = $this->opportunity->getAllOpportunitys($request);
        // $select_conditions = $request->all();
        // dd($all_customer_cars[0]);
        // dd($all_customer_cars[0]);
        /*$shop_fenfa = Shop::select(['id', 'name'])
        ->where('status', '1')
        ->where('is_show', '1')
        ->get();*/
        return new OpportunityResource($opportunitys);
    }

    /**
     * Show the form for creating a new resource.
     * 添加报名信息
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.carCustomer.create', compact(''));
    }

    /**
     * Store a newly created resource in storage.
     * 添加报名
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // p(lastSql());exit;
        $opp = $this->opportunity->create($request);
        // p(lastSql());exit;
        /*if(!$getInsertedId){
        // dd('hehe sb');
        return redirect()->route('admin.transcation.edit', ['transcation'=>'1'])->withInput();
        }*/
        /*return response()->json(array(
        'status'      => 200,
        'msg'         => '您的信息已记录,销售顾问会尽快跟您联系',
        ));*/
        if ($opp) {
            //添加成功
            return $this->baseSucceed($Data = $opp, $Message = '您的信息已记录,销售顾问会尽快跟您联系');
        } else {
            //添加失败
            return $this->baseFailed($Message = '内部错误');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * 编辑报名
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $carCustomer_info = $this->opportunity->find($id);
        // dd($carCustomer_info);
        return view('admin.carCustomer.edit', compact('carCustomer_info'));
    }

    /**
     * Update the specified resource in storage.
     * 修改报名
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->opportunity->update($request, $id);
        return redirect()->route('admin.carCustomer.index')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $carCustomer = $this->opportunity->find($id);

        return view('admin.carCustomer.show', compact('carCustomer'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assign(Request $request)
    {
        // dd($request->all());

        $id         = $request->fenfa_info_id;
        $fenfa_shop = $request->fenfa_shop;

        $carCustomer = $this->opportunity->fenfa($id, $fenfa_shop);

        return redirect()->route('admin.carCustomer.index')->withInput();
    }

    /**
     * 删除
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        /*if($request->ajax()){
        echo "zhen de shi AJAX";
        }
        p($request->input('id'));
        p($request->input('status'));
        p($request->method());exit;*/

        $opportunity = $this->opportunity->find($request->id);

        // $opportunity->status = $request->input('status');
        $opportunity->status = '0';

        $opportunity->save();

        return response()->json(array(
            'status' => 1,
            'msg'    => '修改成功',
        ));
    }

}

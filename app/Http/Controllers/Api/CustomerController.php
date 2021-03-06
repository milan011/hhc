<?php

namespace App\Http\Controllers\Api;

use App\Area;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Http\Resources\Customer\CustomerResource;
use App\Repositories\Car\CarRepositoryInterface;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\Want\WantRepositoryInterface;
use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller
{
    protected $customer;
    protected $car;
    protected $want;

    public function __construct(

        CustomerRepositoryInterface $customer,
        CarRepositoryInterface $car,
        WantRepositoryInterface $want
    ) {

        $this->customer = $customer;
        $this->car      = $car;
        $this->want     = $want;

        // $this->middleware('brand.create', ['only' => ['create']]);
    }

    /**
     * Display a listing of the resource.
     * 所有客户列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //初始搜索条件
        $select_conditions = $request->all();
        // dd($request->all());
        // dd($select_conditions);

        $customers = $this->customer->getAllCustomers($request);

        // dd($customers[0]->belongsToUser->nick_name);

        return new CustomerResource($customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * ajax存储客户
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $customerRequest)
    {
        // dd($customerRequest->all());

        $is_repeat = $this->customer->isRepeat($customerRequest->telephone, $customerRequest->customer_name);
        // p(LastSql());exit;
        // p($is_repeat);exit;
        if ($this->customer->isRepeat($customerRequest->telephone, $customerRequest->customer_name)) {
            //已有用户,更新并返回
            // p('重复');exit;
            $customer_id = $this->customer->isRepeat($customerRequest->telephone, $customerRequest->customer_name)->id;
            $customer    = $this->customer->update($customerRequest, $customer_id);
        } else {
            //尚无记录,添加并返回
            $customer = $this->customer->create($customerRequest);
        }
        // p($customer);exit;
        if ($customer) {
            //添加成功
            return $this->baseSucceed($Data = $customer, $Message = '添加客户成功');
        } else {
            //添加失败
            return $this->baseFailed($Message = '内部错误');
        }
    }

    /**
     * Store a newly created resource in storage.
     * ajax存储客户(保险)
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajaxStoreInsurance(StoreCustomerRequest $customerRequest)
    {
        // dd($customerRequest->all());exit;

        $is_repeat = $this->customer->isRepeatInsurance($customerRequest->telephone, $customerRequest->customer_name);
        // p(LastSql());exit;
        // p($is_repeat);exit;
        if ($this->customer->isRepeatInsurance($customerRequest->telephone, $customerRequest->customer_name)) {
            //已有用户,更新并返回
            // p('you ');exit;
            $customer_id = $this->customer->isRepeatInsurance($customerRequest->telephone, $customerRequest->customer_name)->id;
            $customer    = $this->customer->update($customerRequest, $customer_id);
        } else {
            //尚无记录,添加并返回
            // p('meiyou');exit;
            $customer = $this->customer->createInsurance($customerRequest);
        }
        // p($customer);exit;
        return response()->json($customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $customer           = $this->customer->find($id);
        $customer_car_list  = $this->car->getListByCustomerId($customer->id);
        $customer_want_list = $this->want->getListByCustomerId($customer->id);

        //dd($customer_car_list);
        // dd(LastSql());
        // dd($customer_want_list);
        //dd($customer->id);

        return view('admin.customer.show', compact('customer', 'customer_car_list', 'customer_want_list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = $this->customer->find($id);

        // dd($customer);

        return view('admin.customer.edit', compact(
            'customer'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $customerRequest, $id)
    {
        // p($id);
        // dd($customerRequest->all());

        $this->customer->update($customerRequest, $id);
        Session::flash('sucess', '修改用户成功');
        // return redirect()->route('admin.customer.index')->withInput();
        return redirect('admin/customer/index')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Transcation\CompleteTranscationRequest;
use App\Http\Requests\Transcation\StoreTranscationRequest;
use App\Http\Requests\Transcation\UpdateTranscationRequest;
use App\Http\Resources\Transcation\TranscationResource;
use App\Repositories\Car\CarRepositoryInterface;
use App\Repositories\Transcation\TranscationRepositoryInterface;
use App\Repositories\Want\WantRepositoryInterface;
use Illuminate\Http\Request;
use Session;

class TranscationController extends Controller
{
    protected $transcation;

    protected $car;
    protected $want;

    public function __construct(

        CarRepositoryInterface $car,
        WantRepositoryInterface $want,

        TranscationRepositoryInterface $transcation
    ) {

        $this->car  = $car;
        $this->want = $want;

        $this->transcation = $transcation;
        // $this->middleware('brand.create', ['only' => ['create']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $request['participate'] = false;
        $transcations           = $this->transcation->getAllTranscations($request);
        $select_conditions      = $request->all();
        /*dd(lastSql());
        dd($transcations);
        dd($transcation[0]->belongsToChance);*/

        return new TranscationResource($transcations);
    }

    /**
     * Display a listing of the resource.
     * 用户发起的交易
     * @return \Illuminate\Http\Response
     */
    public function selfTranscation(Request $request)
    {
        // p($request->method());
        // dd($request->all());
        $request['participate'] = false;
        $transcations           = $this->transcation->getAllTranscations($request);
        // dd(lastSql());
        // dd($transcations);
        $select_conditions = $request->all();
        $chance_launch     = isset($request->chance_launch) ? $request->chance_launch : '1';

        return view('admin.transcation.self', compact('transcations', 'chance_launch', 'select_conditions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd(old('chance_id'));
        // dd($request->all());
        // dd(isset($request->chance_id));
        $chance_id = isset($request->chance_id) ? $request->chance_id : old('chance_id');
        $car_id    = isset($request->car_id) ? $request->car_id : old('car_id');
        $want_id   = isset($request->want_id) ? $request->want_id : old('want_id');
        $plan_id   = isset($request->plan_id) ? $request->plan_id : old('plan_id');

        // dd($chance_id);
        $chance_info = $this->chance->find($chance_id);
        $car_info    = $this->car->find($car_id);
        $want_info   = $this->want->find($want_id);
        $plan_info   = $this->plan->find($plan_id);

        // dd($chance_info);
        /*dd($car_info->belongsToTranscation);
        dd($want_info);*/
        return view('admin.transcation.create', compact(
            'chance_info',
            'car_info',
            'want_info',
            'plan_info'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $transcationRequest)
    {
        // dd($transcationRequest->all());
        $trans = $this->transcation->create($transcationRequest);
        $trans->belongsToUser;
        $trans->belongsToShop;
        // p(lastSql());exit;
        /*if(!$getInsertedId){
        // dd('hehe sb');
        return redirect()->route('admin.transcation.edit', ['transcation'=>'1'])->withInput();
        }*/
        if ($trans) {
            //添加成功
            return $this->baseSucceed($Data = $trans, $Message = '添加交易成功');
        } else {
            //添加失败
            return $this->baseFailed($Message = '内部错误');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transcation = $this->transcation->find($id);
        // dd($transcation->belongsToShop);
        $chances   = $this->chance->find($transcation->chance_id);
        $car_info  = $this->car->find($chances->car_id); //车源信息
        $want_info = $this->want->find($chances->want_id); //求购信息
        // dd($chances);
        // dd($car_info);
        // dd($want_info);

        /*$gearbox        = config('tcl.gearbox'); //获取配置文件中变速箱类别
        $out_color      = config('tcl.out_color'); //获取配置文件中外观颜色
        $capacity       = config('tcl.capacity'); //获取配置文件排量
        $category_type  = config('tcl.category_type'); //获取配置文件中车型类别
        $mileage        = config('tcl.mileage'); //获取配置文件中车型类别
         */
        // dd($chances->hasManyImages()->get());
        return view('admin.transcation.show', compact('transcation', 'chances', 'car_info', 'want_info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transcations = $this->transcation->find($id);
        $chance_info  = $this->chance->find($transcations->chance_id);
        $car_info     = $this->car->find($chance_info->car_id);
        $want_info    = $this->want->find($chance_info->want_id);

        // dd($chance_info);
        /*dd($want_info->creater_id);
        dd($car_info->belongsToTranscation->customer_telephone);*/
        // dd($want_info);
        // dd($transcations);

        return view('admin.transcation.edit', compact(
            'transcations',
            'car_info',
            'want_info',
            'chance_info'
        ));
    }

    /**
     * Update the specified resource in storage.
     * 交易跟进
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTranscationRequest $transcationRequest, $id)
    {
        // dd($transcationRequest->all());
        $transcation = $this->transcation->update($transcationRequest, $id);

        return redirect()->route('admin.transcation.self')->withInput();
    }

    /**
     * Update the specified resource in storage.
     * 交易完成
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function completeDel(CompleteTranscationRequest $transcationRequest, $id)
    {
        // dd('hehe del');
        // dd($transcationRequest->all());
        $transcation = $this->transcation->update($transcationRequest, $id);

        return redirect()->route('admin.transcation.self')->withInput();
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

    /**
     * 修改交易状态
     * 暂时只有激活-废弃转换
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        /*if($request->ajax()){
        echo "zhen de shi AJAX";
        }
        p($request->input('id'));
        p($request->input('status'));
        p($request->method());exit;*/

        /*$car = $this->car->find($request->id);

        $car->status = $request->input('status');

        $car->save();*/

        $this->transcation->statusChange($request, $request->input('id'));

        return response()->json(array(
            'status' => 1,
            'msg'    => '交易已经废弃',
        ));
    }

    /**
     * 交易完成
     * @return \Illuminate\Http\Response
     */
    public function complete(Request $request)
    {
        // dd(Session::all());

        $transcation_id = isset($request->transcation_id) ? $request->transcation_id : old('transcation_id');
        // dd($transcation_id);
        $transcations = $this->transcation->find($transcation_id);
        $chance_info  = $this->chance->find($transcations->chance_id);
        $car_info     = $this->car->find($chance_info->car_id);
        $want_info    = $this->want->find($chance_info->want_id);

        // dd($chance_info);
        // dd($car_info);
        // dd($want_info);
        // dd($transcations);

        return view('admin.transcation.complete', compact(
            'transcations',
            'car_info',
            'want_info',
            'chance_info'
        ));
    }
}

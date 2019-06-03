<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Resources\Notice\NoticeResource;
use App\Http\Resources\Notice\NoticeResourceCollection;
// use App\Http\Requests\Notice\UpdateNoticeRequest;
// use App\Http\Requests\Notice\StoreNoticeRequest;
// use App\Repositories\Notice\NoticeRepositoryContract;

use App\Repositories\Notice\NoticeRepositoryInterface;
use Illuminate\Http\Request;
use Session;

class NoticeController extends Controller
{
    protected $notice;

    public function __construct(
        NoticeRepositoryInterface $notice
    ) {

        $this->notice = $notice;
        // $this->middleware('notice.create', ['only' => ['create']]);
    }

    /**
     * Display a listing of the resource.
     * 公告列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = $this->notice->allNotices();

        return new NoticeResource($notices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $noticeRequest)
    {
        // dd($noticeRequest->all());
        $new_notice = $this->notice->create($noticeRequest);
        $new_notice->belongsToUser;

        if ($new_notice) {
            //添加成功
            return $this->baseSucceed($Data = $new_notice, $Message = '添加公告成功');
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
        $notice_info = $this->notice->find($id);
        // dd(lastSql());
        // dd($notice_info);exit;
        if ($notice_info) {
            //添加成功
            return $this->baseSucceed($Data = $notice_info, $Message = '获取公告详情成功');
        } else {
            //添加失败
            return $this->baseFailed($Message = '内部错误');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * 编辑公告
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice_info = $this->notice->find($id);
        // dd(lastSql());
        // p($notice_info);exit;
        return view('admin.notice.edit', compact(

            'notice_info'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $noticeRequest, $id)
    {
        // dd($noticeRequest->all());
        $notice = $this->notice->update($noticeRequest, $id);
        if ($notice) {
            //添加成功
            return $this->baseSucceed($Data = $notice, $Message = '添加公告成功');
        } else {
            //添加失败
            return $this->baseFailed($Message = '内部错误');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $notice = $this->notice->destroy($id);
        if ($notice) {
            //添加成功
            return $this->baseSucceed($Data = $notice, $Message = '删除公告成功');
        } else {
            //添加失败
            return $this->baseFailed($Message = '内部错误');
        }
    }
}

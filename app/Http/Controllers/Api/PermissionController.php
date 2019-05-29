<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\Permission\PermissionResource;

class PermissionController extends Controller
{
    public function __construct(){
    
    }

    /**
     * 所有权限列表(分页)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $permissions = Permission::where('status', '1')
                                 ->orderBy('created_at', 'DESC')
                                 ->paginate(10);

        return new PermissionResource($permissions);

        // return $permissions;
    }

    /**
     * 所有权限列表(无分页)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function permissionAll(Request $request)
    {
        $permissions = Permission::select('id', 'name', 'description', 'group')
                                 ->where('status', '1')
                                 ->get();
        $permissions = $permissions->groupBy('group');

        return new PermissionResource($permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // 提交数据格式
        /*$data = [
            "name" => '权限名称'
            "guard_name" => 'api'
            "description" => '权限描述'
            "group" => '权限分组'
        ]*/
        // dd(getRandomStr(5));
        /*$data = [
            "name" => getRandomStr(4).'.'.getRandomStr(5),
            "guard_name" => 'api',
            "description" => '权限描述',
            "group" => '权限分组',
        ];*/

        // $data = $request->except(['token']);
        
        $per = Permission::findOrFail(12);
        // dd(lastSql());
        // dd($this->baseSucceed($Data = $per, $Message = '添加权限成功'));

        // $newPer = Permission::create($data);

        if($per){ //添加成功
            return $this->baseSucceed($Data = $per, $Message = '添加权限成功');
        }else{  //添加失败
            return $this->baseFailed($Message = '内部错误');
        } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        // 提交数据格式
        /*$data = [
          "id" => 12,
          "name" => 'per_name',
          "guard_name" => "api",
          "description" => "权限描述",
          "group" => "权限分组",
          "token" => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly93d3cuaGhjLm5ldC9sb2dpbiIsImlhdCI6MTU1OTAwMjU4OSwiZXhwIjoxNTU5NjA3Mzg5LCJuYmYiOjE1NTkwMDI1ODksImp0aSI6ImZrbWNLZXlUcmp0QW1BQnIifQ.LF1WUVJ3plIjE51dHglR-oXiqRQPORqrrr2flGUao14"
        ]*/
        // dd(Permission::findOrFail($id));
        $data = $request->except(['token']);

        $permission = Permission::findOrFail($id)->update($data);
        $permission = Permission::findOrFail($id);
        if($permission){ //添加成功
            return $this->baseSucceed($Data = $permission, $Message = '修改权限成功');
        }else{  //添加失败
            return $this->baseFailed($Message = '内部错误');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        // dd($id);
        // throw new \App\ApiExceptions\ApiException('添加失败'); 
        $permission = Permission::findOrFail($id);
        $permission->status = '0';
        $permission->save();

        if($permission){ //添加成功
            return $this->baseSucceed($Data = $permission, $Message = '删除权限成功');
        }else{  //添加失败
            return $this->baseFailed($Message = '内部错误');
        }        
    }
}

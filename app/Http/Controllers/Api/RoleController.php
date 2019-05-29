<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Resources\Role\RoleResource;

class RoleController extends Controller
{
    public function __construct(){
    
    }

    /**
     * 所有权限列表
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        // p($request->input('query'));
        $role = Role::where('status', '1')
                                 ->orderBy('created_at', 'DESC')
                                 ->paginate(10);

        return new RoleResource($role);
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
            "name" => '角色名称'
            "guard_name" => 'api'
            "description" => '角色描述'
            "token" => ''
        ]*/
        
        /*$data = $request->except(['token']);
        $newRole = Role::create($data);*/

        $role = Role::findOrFail(12);

        if($role){ //添加成功
            return $this->baseSucceed($Data = $role, $Message = '添加角色成功');
        }else{  //添加失败
            return $this->baseFailed($Message = '内部错误');
        }

        // return Role::create($data);
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
        // dd(Role::findOrFail($id));
        $data = $request->except(['token']);

        // 提交数据格式
        /*$data = [
            "id" => 12,
            "name" => '角色名称'
            "guard_name" => 'api'
            "description" => '角色描述'
            "token" => ''
        ]*/

        $role = Role::findOrFail($id)->update($data);
        $role = Role::findOrFail($id);

        if($role){ //添加成功
            return $this->baseSucceed($Data = $role, $Message = '修改角色成功');
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

        // throw new \App\ApiExceptions\ApiException('添加失败'); 
        $role = Role::findOrFail($id);
        $role->status = '0';
        $role->save();

        if($role){ //添加成功
            return $this->baseSucceed($Data = $role, $Message = '删除角色成功');
        }else{  //添加失败
            return $this->baseFailed($Message = '内部错误');
        }       
    }

    // 获取角色权限列表
    public function getRolePermissions($id)
    {   

        $role = Role::findOrFail($id);
        $permissions = $role->permissions()->get();

        $list = [];
        foreach ($permissions as $key => $value) {
            $list[] = $value->name;
        }
        // dd($list);
        
        if($list){ //添加成功
            return $this->baseSucceed($Data = $list, $Message = '获取角色权限列表');
        }else{  //添加失败
            return $this->baseFailed($Message = '内部错误');
        }
    }

    // 编辑角色权限列表
    public function giveRolePermissions($id, Request $request)
    {
        
        $role = Role::findOrFail($id);
        $permissions = $request->post('permissions');
        /*p($role);
        dd($permissions);*/
        $role->syncPermissions($permissions);


        if($role){ //添加成功
            return $this->baseSucceed($Data = $role, $Message = '赋予角色权限成功');
        }else{  //添加失败
            return $this->baseFailed($Message = '内部错误');
        }
    }
}

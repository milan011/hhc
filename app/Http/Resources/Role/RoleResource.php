<?php

namespace App\Http\Resources\Role;

use Illuminate\Http\Resources\Json\Resource;

class RoleResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'ResultType' => 0,
            'Message'    =>"获取角色列表成功",
            'LogMessage' => null,
            'Data'       => parent::toArray($request),
        ];
        // return parent::toArray($request);
    }
}

<?php

namespace App\Http\Resources\Permission;

use Illuminate\Http\Resources\Json\Resource;

class PermissionResource extends Resource
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
            'Message'    =>"获取权限列表成功",
            'LogMessage' => null,
            'Data'       => parent::toArray($request),
        ];
        // return parent::toArray($request);
    }
}

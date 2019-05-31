<?php

namespace App\Http\Resources\Notice;

use Illuminate\Http\Resources\Json\Resource;

class NoticeResource extends Resource
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
            'Message'    => "获取门店列表成功",
            'LogMessage' => null,
            'Data'       => parent::toArray($request),
        ];
        // return parent::toArray($request);
    }

    /*public function with($request)
{
return [
'return_month_price' => $this->hasManyNoticeInfo(),
];
}*/
}

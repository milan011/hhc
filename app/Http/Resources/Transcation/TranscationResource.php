<?php

namespace App\Http\Resources\Transcation;

use Illuminate\Http\Resources\Json\Resource;

class TranscationResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($this);

        /*return [
        'id' => $this->id,
        'name' => $this->name,
        'month_nums' => $this->month_nums,
        'package_price' => $this->package_price,
        'remark' => $this->remark,
        'created_at' => $this->created_at,
        ];*/

        return [
            'ResultType' => 0,
            'Message'    => "获取交易列表成功",
            'LogMessage' => null,
            'Data'       => parent::toArray($request),
        ];

        // return parent::toArray($request);
    }

    /*public function with($request)
{
return [
'return_month_price' => $this->hasManyTranscationInfo(),
];
}*/
}

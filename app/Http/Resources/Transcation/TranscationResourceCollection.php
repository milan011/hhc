<?php

namespace App\Http\Resources\Transcation;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TranscationCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}

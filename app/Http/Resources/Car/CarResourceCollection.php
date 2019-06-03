<?php

namespace App\Http\Resources\Car;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CarCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}

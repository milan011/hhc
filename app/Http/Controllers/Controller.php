<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\Traits\BaseResponseTrait;
use DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, BaseResponseTrait;

    /*public function __construct()
{

DB::connection()->enableQueryLog(); // 开启查询日志
}
 */}

<?php

namespace App\Http\Controllers\Api\Traits;

trait BaseResponseTrait
{
    /*public function respond($status, $respond_data, $message)
    {
    return ['status' => $status, 'data' => $respond_data, 'message' => $message];
    }*/

    public function respond($ResultType, $Data, $Message, $LogMessage)
    {
        return [
            'ResultType' => $ResultType,
            'Data'       => $Data,
            'Message'    => $Message,
            'LogMessage' => $LogMessage,
        ];
    }

    /*public function baseSucceed($respond_data = [], $message = 'Request success!', $status = true)
    {
    return $this->respond($status, $respond_data, $message);
    }*/

    public function baseSucceed($Data = [], $Message = 'Request success!', $ResultType = 0, $LogMessage = null)
    {
        return $this->respond($ResultType, $Data, $Message, $LogMessage);
    }

    public function baseFailed($Message = 'Request failed!', $Data = [], $ResultType = 1, $LogMessage = null)
    {
        return $this->respond($ResultType, $Data, $Message, $LogMessage);
    }
}

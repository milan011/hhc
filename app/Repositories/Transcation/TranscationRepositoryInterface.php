<?php
namespace App\Repositories\Transcation;

interface TranscationRepositoryInterface
{

    public function find($id);

    public function getAllTranscations($requestData);

    public function create($requestData);

    public function update($id, $requestData);

    public function destroy($id);

    public function isRepeat($chance_id);

}

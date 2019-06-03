<?php
namespace App\Repositories\Opportunity;

interface OpportunityRepositoryInterface
{

    public function find($id);

    public function getAllCustomersCars($request);

    public function create($requestData);

}

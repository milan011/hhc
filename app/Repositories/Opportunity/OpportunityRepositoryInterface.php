<?php
namespace App\Repositories\Opportunity;

interface OpportunityRepositoryInterface
{

    public function find($id);

    public function getAllOpportunitys($request);

    public function create($requestData);

}

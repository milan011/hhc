<?php
namespace App\Repositories\Customer;

interface CustomerRepositoryInterface

public function find($id);

public function getAllCustomers($requestData);

public function create($requestData);

public function update($id, $requestData);

public function destroy($id);

public function isRepeat($customer_telephone, $customer_name);
}

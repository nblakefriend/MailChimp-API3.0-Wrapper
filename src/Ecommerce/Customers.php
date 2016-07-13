<?php
namespace MailChimp\Ecommerce;

class Customers extends Ecommerce
{

    public function getCustomers($storeId, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$storeId}/customers", $query);
    }

    public function getCustomer($storeId, $customerId, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$storeId}/customers/{$customerId}", $query);
    }


    public function addCustomer($storeId, $data = array() )
    {
        $customer = array(
            "id" => $data['id'],
            "email_address" => $data['email_address'],
            "opt_in_status" => $data['optInStatus']
        );
        return self::execute("POST", "ecommerce/stores/{$storeId}/customers/", $customer);
    }


}

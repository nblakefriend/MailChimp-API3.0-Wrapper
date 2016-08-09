<?php
namespace MailChimp\Ecommerce;

class Customers extends Ecommerce
{

    public function getCustomers($store_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/customers", $query);
    }

    public function getCustomer($store_id, $customer_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/customers/{$customer_id}", $query);
    }

    /**
     * Add a new customer to a store
     */
    public function addCustomer($store_id, $customer_id, $email_address, $opt_in_status, array $optional_settings = [] )
    {
        $data = array(
            "id" => $customer_id,
            "email_address" => $email_address,
            "opt_in_status" => $opt_in_status
        );

        if (isset($optional_settings)) {
            foreach ($optional_settings as $key => $value) {

                switch (strtolower($key))
                {
                    case "company":
                        $data["company"] = $value;
                        break;
                    case "first_name":
                        $data["first_name"] = $value;
                        break;
                    case "last_name":
                        $data["last_name"] = $value;
                        break;
                    case "orders_count":
                        $data["orders_count"] = $value;
                        break;
                    case "vendor":
                        $data["vendor"] = $value;
                        break;
                    case "total_spent":
                        $data["total_spent"] = $value;
                        break;
                    case "address":
                        $data["address"] = $value;
                        break;
                    default:
                        break;
                }
            }
        }
        return self::execute("POST", "ecommerce/stores/{$store_id}/customers/", $data);
    }

    /**
     * Update a customer
     *
     * @param string $string_id
     * @param string $customer_id
     * @param array $data
     * @return object
     */
    public function updateCustomer($store_id, $customer_id, array $data = [] )
    {
        return self::execute("PATCH", "ecommerce/stores/{$store_id}/customers/{$customer_id}", $data);
    }

    /**
     * Add or update a customer
     *
     * @param string $string_id
     * @param string $customer_id
     * @param array $data
     * @return object
     */
    public function upsertCustomer($store_id, $customer_id, array $data = [] )
    {
        return self::execute("PUT", "ecommerce/stores/{$store_id}/customers/{$customer_id}", $data);
    }

    /**
     * Delete a customer
     *
     * @param string $string_id
     * @param string $customer_id
     */
    public function deleteCustomer($store_id, $customer_id)
    {
        return self::execute("DELETE", "ecommerce/stores/{$store_id}/customers/{$customer_id}");
    }


}

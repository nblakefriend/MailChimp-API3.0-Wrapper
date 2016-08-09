<?php
namespace MailChimp\Ecommerce;

use MailChimp\MailChimp as MailChimp;
use MailChimp\Ecommerce\Carts as Carts;
use MailChimp\Ecommerce\Customers as Customers;
use MailChimp\Ecommerce\Orders as Orders;
use MailChimp\Ecommerce\Products as Products;

class Ecommerce extends MailChimp
{

    /**
     * Get a list of ecommerce stores for the account
     *
     * @param  (optional) array $query  of query parameters
     * @return object List of Ecommerce Stores
     */
    public function getStores(array $query = [] )
    {
        return self::execute("GET", "ecommerce/stores", $query);
    }

    /**
     * Get a list of ecommerce stores for the account
     *
     * @param string $store_id
     * @param  (optional) $query array of query parameters
     * @return object List of Ecommerce Stores
     */
    public function getStore($store_id, array $query = [] )
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}", $query);
    }

    /**
     * Add a new store
     */
    public function addStore($store_id, $list_id, $name, $currency_code, array $optional_settings = null)
    {
        $data = [
            "id" => $store_id,
            "list_id" => $list_id,
            "name" => $name,
            "currency_code" => $currency_code
        ];

        if (isset($optional_settings)) {
            foreach ($optional_settings as $key => $value) {
                $opts[strtolower($key)] = $value;

                switch (strtolower($key))
                {
                    case "platform":
                        $data["platform"] = $value;
                        break;
                    case "domain":
                        $data["domain"] = $value;
                        break;
                    case "email_address":
                        $data["email_address"] = $value;
                        break;
                    case "money_format":
                        $data["money_format"] = $value;
                        break;
                    case "primary_locale":
                        $data["primary_locale"] = $value;
                        break;
                    case "timezone":
                        $data["timezone"] = $value;
                        break;
                    case "phone":
                        $data["phone"] = $value;
                        break;
                    case "address":
                        $data["address"] = $value;
                        break;
                    default:
                        break;
                }
            }
        }
        return self::execute("POST", "ecommerce/stores", $data);
    }

    /**
     * Update a store
     */
    public function updateStore($store_id, array $data = [])
    {
        return self::execute("PATCH", "ecommerce/stores/{$store_id}", $d);
    }

    /**
     * Delete a store
     */
    public function deleteStore($store_id)
    {
        return self::execute("DELETE", "ecommerce/stores/{$store_id}");
    }

    /**
     *  Ecommerce subresources
     */

     public function carts()
     {
         return new Carts;
     }

     public function customers()
    {
        return new Customers;
    }

    public function orders()
    {
        return new Orders;
    }

    public function products()
    {
        return new Products;
    }

}

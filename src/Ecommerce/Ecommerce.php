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
     * @param  array (optional)  $query
     * @return object
     */
    public function getStores(array $query = [] )
    {
        return self::execute("GET", "ecommerce/stores", $query);
    }

    /**
     * Get a list of ecommerce stores for the account
     *
     * @param string $store_id
     * @param array (optional) $query
     * @return object
     */
    public function getStore($store_id, array $query = [] )
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}", $query);
    }

    /**
     * Add a new store
     *
     * @param string $store_id
     * @param string $list_id
     * @param string $name
     * @param string $currency_code The three-letter ISO 4217 code for the currency that the store accepts.
     * @param array (optional) $optional_settings
     * @return object

     * TODO: expand comment
     */
    public function addStore($store_id, $list_id, $name, $currency_code, array $optional_settings = null)
    {
        $data = [
            "id" => $store_id,
            "list_id" => $list_id,
            "name" => $name,
            "currency_code" => $currency_code
        ];

        /**
         * TODO: See if this functionality can be made into a function in the parent class.
         */
        if (isset($optional_settings)) {
            foreach ($optional_settings as $key => $value) {
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
     *
     * @param string $store_id
     * @param array $data
     */
    public function updateStore($store_id, array $data = [])
    {
        return self::execute("PATCH", "ecommerce/stores/{$store_id}", $d);
    }

    /**
     * Delete a store
     *
     * @param string $string_id
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

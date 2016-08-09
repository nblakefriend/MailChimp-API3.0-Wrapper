<?php
namespace MailChimp\Ecommerce;

class Carts extends Ecommerce
{

    public function getCarts($store_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/carts", $query);
    }

    public function getCart($store_id, $cart_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/carts/{$cart_id}", $query);
    }

    /**
     * Add a new cart to a store
     */
    public function addCart($store_id, $cart_id, $currency_code, $order_total, array $customer = [], array $lines = [], array $optional_settings = [])
    {
        $data = [
            "id" => $cart_id,
            "customer" => $customer,
            "currency_code" => $currency_code,
            "order_total" => $order_total,
            "lines" => $lines
        ];

        if (isset($optional_settings)) {
            foreach ($optional_settings as $key => $value) {
                // $opts[strtolower($key)] = $value;

                switch (strtolower($key))
                {
                    case "campaign_id":
                        $data["campaign_id"] = $value;
                        break;
                    case "checkout_url":
                        $data["checkout_url"] = $value;
                        break;
                    case "tax_total":
                        $data["tax_total"] = $value;
                        break;
                    default:
                        break;
                }
            }
        }
        return self::execute("POST", "ecommerce/stores/{$store_id}/carts", $data);
    }

    public function updateCart($store_id, $cart_id, array $data = [])
    {

    }



    public function getCartLines($store_id, $cart_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/carts/{$cart_id}/lines", $query);
    }

    public function getCartLine($store_id, $cart_id, $line_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/carts/{$cart_id}/lines/{$line_id}", $query);
    }


    public function deleteCart($store_id, $cart_id)
    {
        return self::execute("DELETE", "ecommerce/stores/{$store_id}/carts/{$cart_id}");
    }


}

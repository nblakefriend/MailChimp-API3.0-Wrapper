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
    public function addCart($store_id, $cart_id, $currency_code, $cart_total, array $customer = [], array $lines = [], array $optional_settings = null)
    {
        $optional_fields = ["campaign_id", "checkout_url", "tax_total"];
        $data = [
            "id" => $cart_id,
            "customer" => $customer,
            "currency_code" => $currency_code,
            "cart_total" => $cart_total,
            "lines" => $lines
        ];
        // If the optional fields are passed, process them against the list of optional fields.
        if (isset($optional_settings)) {
            $data = array_merge($data, self::optionalFields($optional_fields, $optional_settings));
        }
        return self::execute("POST", "ecommerce/stores/{$store_id}/carts", $data);
    }

    public function updateCart($store_id, $cart_id, array $data = [])
    {
        return self::excecute("PATCH", "ecommerce/stores/{$store_id}/carts/{$cart_id}", $data);
    }

    public function getCartLines($store_id, $cart_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/carts/{$cart_id}/lines", $query);
    }

    public function getCartLine($store_id, $cart_id, $line_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/carts/{$cart_id}/lines/{$line_id}", $query);
    }

    /**
     * Add a new line item to an existing cart
     *
     * @param string $store_id
     * @param string $cart_id
     * @param string $line_id
     * @param string $product_id
     * @param string $product_variant_id
     * @param int $quantity
     * @param number price
     * @return object
     */
    public function addCartLine($store_id, $cart_id, $line_id, $product_id, $product_variant_id, $quantity, $price)
    {
        $data = [
            "id" => $line_id,
            "product_id" => $product_id,
            "product_variant_id" => $product_variant_id,
            "quantity" => $quantity,
            "price" => $price
        ];
        return self::execute("POST", "ecommerce/stores/{$store_id}/carts/{$cart_id}/lines/", $data);
    }
    /**
     * Update a line item to an existing cart
     *
     * @param string $store_id
     * @param string $cart_id
     * @param string $line_id
     * @param array $data
     * @return object
     */
    public function updateCartLine($store_id, $cart_id, $line_id, array $data = [])
    {
        return self::execute("PATCH", "ecommerce/stores/{$store_id}/carts/{$cart_id}/lines/{$line_id}", $data);
    }

    /**
     * Delete a line item to an existing cart
     *
     * @param string $store_id
     * @param string $cart_id
     * @param string $line_id
     */
    public function deleteCartLine($store_id, $cart_id, $line_id)
    {
        return self::execute("DELETE", "ecommerce/stores/{$store_id}/carts/{$cart_id}/lines/{$line_id}");
    }

    /**
     * Delete a cart
     *
     * @param string $store_id
     * @param string $cart_id
     */
    public function deleteCart($store_id, $cart_id)
    {
        return self::execute("DELETE", "ecommerce/stores/{$store_id}/carts/{$cart_id}");
    }


}

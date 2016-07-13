<?php
namespace MailChimp\Ecommerce;

class Carts extends Ecommerce
{

    public function getCarts($storeId, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$storeId}/carts", $query);
    }

    public function getCart($storeId, $cartId, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$storeId}/carts/{$cartId}", $query);
    }

    // Create Things
    public function addCart($storeId, $data)
    {

    }

}

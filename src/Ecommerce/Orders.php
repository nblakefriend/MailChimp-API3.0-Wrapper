<?php
namespace MailChimp\Ecommerce;

class Orders extends Ecommerce
{

    /**
     * TODO: comment requirements
     */

    public function getOrders($store_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/orders", $query);
    }

    public function getOrder($store_id, $order_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/orders/{$order_id}", $query);
    }

    public function addOrder($store_id, $order_id, array $data = [])
    {
        return self::execute("POST", "ecommerce/stores/{$store_id}/orders/", $data);
    }

    public function updateOrder($store_id, $order_id, array $data = [])
    {
        return self::execute("PATCH", "ecommerce/stores/{$store_id}/orders/{$order_id}", $data);
    }


    public function getOrderLines($store_id, $order_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/orders/{$order_id}/lines", $query);
    }

    public function getOrderLine($store_id, $cart_id, $line_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/orders/{$order_id}/lines/{$line_id}", $query);
    }



    public function deleteOrder($store_id, $order_id)
    {
        return self::execute("DELETE", "ecommerce/stores/{$store_id}/orders/{$order_id}");
    }

}

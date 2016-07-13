<?php
namespace MailChimp\Ecommerce;

class Orders extends Ecommerce
{

    public function getOrders($storeId, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$storeId}/orders", $query);
    }

    public function getOrder($storeId, $orderId, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$storeId}/orders/{$orderId}", $query);
    }

}

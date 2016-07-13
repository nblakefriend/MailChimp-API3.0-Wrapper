<?php
namespace MailChimp\Ecommerce;

class Products extends Ecommerce
{

    public function getProducts($storeId, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$storeId}/products", $query);
    }

    public function getProduct($storeId, $productId, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$storeId}/products/{$productId}", $query);
    }

}

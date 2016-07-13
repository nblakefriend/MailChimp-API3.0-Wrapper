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
    * @param  (optional) $query array of query parameters
    * @return List of Ecommerce Stores
    **/
    public function getStores(array $query = [] )
    {
        return self::execute("GET", "ecommerce/stores", $query);
    }

    public function getStore($storeId, array $query = [] )
    {
        return self::execute("GET", "ecommerce/stores/{$storeId}", $query);
    }

    public function getProductVariants($storeId, $productId, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$storeId}/products/{$productId}/variants", $query);
    }

    public function getProductVariant($storeId, $productId, $variantId, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$storeId}/products/{$productId}/variants/{$variantId}", $query);
    }


    public function getOrderLines($storeId, $orderId, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$storeId}/orders/{$orderId}/lines", $query);
    }

    public function getOrderLine($storeId, $cartId, $lineId, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$storeId}/orders/{$orderId}/lines/{$lineId}", $query);
    }


    public function getCartLines($storeId, $cartId, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$storeId}/carts/{$cartId}/lines", $query);
    }

    public function getCartLine($storeId, $cartId, $lineId, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$storeId}/carts/{$cartId}/lines/{$lineId}", $query);
    }


    // Update Things
    public function updateStore($storeId, $data=array())
    {
        $availableFields = array("name", "platform","domain", "email_address", "currency_code", "money_format", "primary_locale", "timezone", "phone", "address");

        $d = array();
        foreach ($data as $key => $value) {
            if (in_array($key, $availableFields)) {
                $d[$key] = $value;
            } else {
                return new \Exception( "{$key} is not an available field." );
            }
        }
        return self::execute("PATCH", "ecommerce/stores/{$storeId}", $d);
    }

    /**
     *  Instantiate Ecommerce subresources
    **/

    public function customers()
    {
        return new Customers;
    }

    public function products()
    {
        return new Products;
    }

}

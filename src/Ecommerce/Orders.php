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

    /**
     * Add a new order to a store.
     *
     * @param string $store_id
     * @param string $order_id
     * @param string $currency_code
     * @param number $order_total
     * @param array $customer See addCustomer method in Customer class
     * @param array $lines See addOrderLine method below
     * @param array $optional_settings
     * @return object
     */
    public function addOrder($store_id, $order_id, $currency_code, $order_total, array $customer = [], array $lines = [], array $optional_settings = null)
    {
        $optional_fields = ["campaign_id", "financial_status", "tax_total", "shipping_total", "tracking_code", "processed_at_foreign", "updated_at_foreign", "cancelled_at_foreign", "shipping_address", "billing_address"];
        $data = [
            "id" => $order_id,
            "customer" => $customer,
            "currency_code" => $currency_code,
            "order_total" => $order_total,
            "lines" => $lines
        ];

        // If the optional fields are passed, process them against the list of optional fields.
        if (isset($optional_settings)) {
            $data = array_merge($data, self::optionalFields($optional_fields, $optional_settings));
        }
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

    public function getOrderLine($store_id, $order_id, $line_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/orders/{$order_id}/lines/{$line_id}", $query);
    }

    /**
     * Add a new line item to an existing order
     *
     * @param string $store_id
     * @param string $order_id
     * @param string $line_id
     * @param string $product_id
     * @param string $product_variant_id
     * @param int $quantity
     * @param number price
     * @return object
     */
    public function addOrderLine($store_id, $order_id, $line_id, $product_id, $product_variant_id, $quantity, $price)
    {
        $data = [
            "id" => $line_id,
            "product_id" => $product_id,
            "product_variant_id" => $product_variant_id,
            "quantity" => $quantity,
            "price" => $price
        ];
        return self::execute("POST", "ecommerce/stores/{$store_id}/orders/{$order_id}/lines/", $data);
    }
    /**
     * Update a line item to an existing order
     *
     * @param string $store_id
     * @param string $order_id
     * @param string $line_id
     * @param array $data
     * @return object
     */
    public function updateOrderLine($store_id, $order_id, $line_id, array $data = [])
    {
        return self::execute("PATCH", "ecommerce/stores/{$store_id}/orders/{$order_id}/lines/{$line_id}", $data);
    }

    /**
     * Delete a line item to an existing order
     *
     * @param string $store_id
     * @param string $order_id
     * @param string $line_id
     */
    public function deleteOrderLine($store_id, $order_id, $line_id)
    {
        return self::execute("DELETE", "ecommerce/stores/{$store_id}/orders/{$order_id}/lines/{$line_id}");
    }

    /**
     * Delete an existing order
     *
     * @param string $store_id
     * @param string $order_id
     */
    public function deleteOrder($store_id, $order_id)
    {
        return self::execute("DELETE", "ecommerce/stores/{$store_id}/orders/{$order_id}");
    }

}

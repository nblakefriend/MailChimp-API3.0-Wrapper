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
        $data = [
            "id" => $order_id,
            "customer" => $customer,
            "currency_code" => $currency_code,
            "order_total" => $order_total,
            "lines" => $lines
        ];

        if (isset($optional_settings)) {
            foreach ($optional_settings as $key => $value) {
                switch (strtolower($key))
                {
                    case "campaign_id":
                        $data["campaign_id"] = $value;
                        break;
                    case "financial_status":
                        $data["financial_status"] = $value;
                        break;
                    case "tax_total":
                        $data["tax_total"] = $value;
                        break;
                    case "shipping_total":
                        $data["shipping_total"] = $value;
                        break;
                    case "tracking_code":
                        $data["tracking_code"] = $value;
                        break;
                    case "processed_at_foreign":
                        $data["processed_at_foreign"] = $value;
                        break;
                    case "cancelled_at_foreign":
                        $data["cancelled_at_foreign"] = $value;
                        break;
                    case "updated_at_foreign":
                        $data["updated_at_foreign"] = $value;
                        break;
                    case "shipping_address":
                        $data["shipping_address"] = $value;
                        break;
                    case "billing_address":
                        $data["billing_address"] = $value;
                        break;
                    default:
                        break;
                }
            }
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

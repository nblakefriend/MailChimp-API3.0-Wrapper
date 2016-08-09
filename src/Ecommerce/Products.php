<?php
namespace MailChimp\Ecommerce;

class Products extends Ecommerce
{

    /**
     * Get information about a store’s customers.
     *
     * @param string $store_id
     * @param  array (optional) $query
     * @return object
     */
    public function getProducts($store_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/products", $query);
    }

    /**
     * Get information about a store’s customers.
     *
     * @param string $store_id
     * @param string $product_id
     * @param  array (optional) $query
     * @return object
     */
    public function getProduct($store_id, $product_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/products/{$product_id}", $query);
    }

    /**
     * Add a new product to a store
     *
     * @param string $store_id
     * @param string $product_id
     * @param string $title
     * @param array $variants
     * @param  array (optional) $optional_settings
     * @return object
     */
    public function addProduct($store_id, $product_id, $title, array $variants = [], array $optional_settings = null)
    {
        $data = [
            "id" => $product_id,
            "title" => $title,
            "variants" => $variants
        ];

        if (isset($optional_settings)) {
            foreach ($optional_settings as $key => $value) {
                switch (strtolower($key))
                {
                    case "handle":
                        $data["handle"] = $value;
                        break;
                    case "url":
                        $data["url"] = $value;
                        break;
                    case "description":
                        $data["description"] = $value;
                        break;
                    case "type":
                        $data["type"] = $value;
                        break;
                    case "vendor":
                        $data["vendor"] = $value;
                        break;
                    case "image_url":
                        $data["image_url"] = $value;
                        break;
                    case "published_at_foreign":
                        $data["published_at_foreign"] = $value;
                        break;
                    default:
                        break;
                }
            }
        }
        return self::execute("POST", "ecommerce/stores/{$store_id}/products", $data);
    }

    /**
     * Get information about a product’s variants.
     *
     * @param string $store_id
     * @param string $product_id
     * @param  array (optional) $query
     * @return object
     */
    public function getVariants($store_id, $product_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/products/{$product_id}/variants", $query);
    }

    /**
     * Get information about a specific product variant.
     *
     * @param string $store_id
     * @param string $product_id
     * @param string $variant_id
     * @param  array (optional) $query
     * @return object
     */
    public function getVariant($store_id, $product_id, $variant_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/products/{$product_id}/variants/{$variant_id}", $query);
    }

    /**
     * Add a new variant to the product.
     *
     * @param string $store_id
     * @param string $product_id
     * @param string $variant_id
     * @param string title.
     * @param array (optional) $optional_settings
     * @return object
     * TODO: expand comment
     */
    public function addVariant($store_id, $product_id, $variant_id, $title, array $optional_settings = [])
    {
        $data = [
            "id" => $variant_id,
            "title" => $title
        ];

        if (isset($optional_settings)) {
            foreach ($optional_settings as $key => $value) {
                switch (strtolower($key))
                {
                    case "url":
                        $data["url"] = $value;
                        break;
                    case "sku":
                        $data["sku"] = $value;
                        break;
                    case "price":
                        $data["price"] = $value;
                        break;
                    case "inventory_quantity":
                        $data["inventory_quantity"] = $value;
                        break;
                    case "image_url":
                        $data["image_url"] = $value;
                        break;
                    case "backorders":
                        $data["backorders"] = $value;
                        break;
                    case "visibility":
                        $data["visibility"] = $value;
                        break;
                    default:
                        break;
                }
            }
        }
        return self::execute("POST", "ecommerce/stores/{$store_id}/products/{$product_id}/variants", $data);
    }

    /**
     * Update a product variant..
     *
     * @param string $store_id
     * @param string $product_id
     * @param string $variant_id
     * @param array $data
     * @return object
     */
    public function updateVariant($store_id, $product_id, $variant_id, array $data = [])
    {
        return self::execute("PATCH", "ecommerce/stores/{$store_id}/products/{$product_id}/variants/{$variant_id}", $data);
    }

    /**
     * Add or update a product variant.
     *
     * @param string $store_id
     * @param string $product_id
     * @param string $variant_id
     * @param array $data
     * @return object
     */
    public function upsertVariant($store_id, $product_id, $variant_id, array $data = [])
    {
        return self::execute("PUT", "ecommerce/stores/{$store_id}/products/{$product_id}/variants/{$variant_id}", $data);
    }

    /**
     * Delete a product variant.
     *
     * @param string $store_id
     * @param string $product_id
     * @param string variant_id
     */
    public function deleteVariant($store_id, $product_id, $variant_id)
    {
        return self::execute("DELETE", "ecommerce/stores/{$store_id}/products/{$product_id}/variants/{$variant_id}");
    }

    /**
     * Delete a product.
     *
     * @param string $store_id
     * @param string $product_id
     */
    public function deleteProduct($store_id, $product_id)
    {
        return self::execute("DELETE", "ecommerce/stores/{$store_id}/products/{$product_id}");
    }


}

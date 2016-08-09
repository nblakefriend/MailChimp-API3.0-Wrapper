<?php
namespace MailChimp\Ecommerce;

class Products extends Ecommerce
{

    public function getProducts($store_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/products", $query);
    }

    public function getProduct($store_id, $product_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/products/{$product_id}", $query);
    }

    /**
     * Add a new product to a store
     */
    public function addProduct($store_id, $product_id, $title, array $variants = [], array $optional_settings = [])
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


    public function getVariants($store_id, $product_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/products/{$product_id}/variants", $query);
    }

    public function getVariant($store_id, $product_id, $variant_id, array $query = [])
    {
        return self::execute("GET", "ecommerce/stores/{$store_id}/products/{$product_id}/variants/{$variant_id}", $query);
    }

    public function addVariant($store_id, $product_id, array $data = [])
    {
        return self::execute("POST", "ecommerce/stores/{$store_id}/products/{$product_id}/variants", $data);
    }

    public function updateVariant($store_id, $product_id, $variant_id, array $data = [])
    {
        return self::execute("PATCH", "ecommerce/stores/{$store_id}/products/{$product_id}/variants/{$variant_id}", $data);
    }

    public function upsertVariant($store_id, $product_id, $variant_id, array $data = [])
    {
        return self::execute("PUT", "ecommerce/stores/{$store_id}/products/{$product_id}/variants/{$variant_id}", $data);
    }

    public function deleteVariant($store_id, $product_id, $variant_id)
    {
        return self::execute("DELETE", "ecommerce/stores/{$store_id}/products/{$product_id}/variants/{$variant_id}", $data);
    }

}

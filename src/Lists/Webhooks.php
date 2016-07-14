<?php
namespace MailChimp\Lists;

class Webhooks extends Lists
{
    /**
     * Get a list of webhooks
     * @param string $listId
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
    */
    public function getWebhooks($listId, array $query = [])
    {
        return self::execute("GET", "lists/{$listId}/webhooks", $query);
    }

    /**
     * Get a single webhook
     * @param string $listId
     * @param string $webhookId
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
    */
    public function getWebhook($listId, $webhookId, array $query = [])
    {
        return self::execute("GET", "lists/{$listId}/webhooks/{$webhookId}", $query);
    }

    /**
     * Create a new webhook
     * array["data"]
     *      ["url"]             string      A valid URL for the Webhook.
     *      ["events"]          array      The events that can trigger the webhook and whether they are enabled.
     *          "subscribe"     boolean
     *          "unsubscribe"   boolean
     *          "profile"       boolean
     *          "cleaned"       boolean
     *          "upemail"       boolean
     *          "campaign"      boolean
     *      ["sources"]         array      The possible sources of any events that can trigger the webhook and whether they are enabled.
     *          "user"          boolean
     *          "admin"         boolean
     *          "api"           boolean
     *
     * @param string $listId
     * @param array $data
     * @return object
    */
    public function createWebhook($listId, array $data = [])
    {
        return self::execute("POST", "lists/{$listId}/webhooks", $data);
    }

    /**
     * Delete a webhook
     * @param string $listId
     * @param string $webhookId
    */
    public function deleteWebhook($listId, $webhookId)
    {
        return self::execute("DELETE", "lists/{$listId}/webhooks/{$webhookId}");
    }

}

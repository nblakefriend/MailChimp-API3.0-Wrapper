<?php
namespace MailChimp\Lists;

class Members extends Lists
{
    /**
     * Get a list of list members
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
    **/
    public function getListMembers($listId, array $query = [])
    {
        return self::execute("GET", "lists/{$listId}/members", $query);
    }

    /**
     * Get a single list members
     * @param string $listId
     * @param string $email_address
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
    **/
    public function getListMember($listId, $email_address, array $query = [])
    {
        $hash = self::getMemberHash($email_address);
        return self::execute("GET", "lists/{$listId}/members/{$hash}", $query);
    }

    /**
     * Add List Member
     * array["data"]
     *      ["email_address"]       string      required
     *      ["status"]              string      required
     *                                          Possible Values: subscribed,unsubscribed,cleaned,pending
     * @param string list_id
     * @param array subscriber data
     * @return object
    **/
    public function addListMember($listId, array $data = [])
    {
        return self::execute("POST", "lists/{$listId}/members", $data);
    }

    /**
     * Add or Update List Member
     * array["data"]
     *      ["email_address"]       string      required
     *      ["status"]              string      required
     *                                          Possible Values: subscribed,unsubscribed,cleaned,pending
     * @param string list_id
     * @param array subscriber data
     * @return object
    **/
    public function upsertListMember($listId, array $data = [])
    {
        $hash = self::getMemberHash($data["email_address"]);
        return self::execute("PUT", "lists/{$listId}/members/{$hash}", $data);
    }

    /**
     * Update List Member
     * array["data"]
     *      ["email_address"]       string      required
     *      ["status"]              string      required
     *                                          Possible Values: subscribed,unsubscribed,cleaned,pending
     * @param string list_id
     * @param array subscriber data
     * @return object
    **/
    public function updateListMember($listId, $email_address, array $data = [])
    {
        $hash = self::getMemberHash($email_address);
        return self::execute("PATCH", "lists/{$listId}/members/{$hash}", $data);
    }

    /**
     * Delete a subscriber
     * @param string list id
     * @param string email address
    **/
    public function deleteListMember($listId, $email_address)
    {
        $hash = self::getMemberHash($email_address);
        return self::execute("DELETE", "lists/{$listId}/members/{$hash}");
    }

}

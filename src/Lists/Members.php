<?php
namespace MailChimp\Lists;

class Members extends Lists
{
    /**
     * Get a list of list members
     * @param string $listId
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
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
     */
    public function getListMember($listId, $email_address, array $query = [])
    {
        $hash = self::getMemberHash($email_address);
        return self::execute("GET", "lists/{$listId}/members/{$hash}", $query);
    }

    /**
     * Get the last 50 events of a member’s activity on a specific list, including opens, clicks, and unsubscribes.
     * Available query fields:
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     * @param string $listId
     * @param string $email_address
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getMemberActiity($listId, $email_address, array $query = [])
    {
        $hash = self::getMemberHash($email_address);
        return self::execute("GET", "lists/{$listId}/members/{$hash}/activity", $query);
    }

    /**
     * Get the last 50 Goal events for a member on a specific list
     * Available query fields:
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     * @param string $listId
     * @param string $email_address
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getMemberGoals($listId, $email_address, array $query = [])
    {
        $hash = self::getMemberHash($email_address);
        return self::execute("GET", "lists/{$listId}/members/{$hash}/goals", $query);
    }

    /**
     * Get recent notes for a specific list member
     * Available query fields:
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     * array["count"]                   int         number of records to return
     * array["offset"]                  int         number of records from a collection to skip.
     * @param string $listId
     * @param string $email_address
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getMemberNotes($listId, $email_address, array $query = [])
    {
        $hash = self::getMemberHash($email_address);
        return self::execute("GET", "lists/{$listId}/members/{$hash}/notes", $query);
    }

    /**
     * Get a specific note for a specific list member.
     * Available query fields:
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     * @param string $listId
     * @param string $email_address
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getMemberNote($listId, $email_address, $noteId, array $query = [])
    {
        $hash = self::getMemberHash($email_address);
        return self::execute("GET", "lists/{$listId}/members/{$hash}/notes/{$noteId}", $query);
    }


    /**
     * Add List Member
     * array["data"]
     *      ["email_address"]       string      required
     *      ["status"]              string      required
     *                                          Possible Values: subscribed,unsubscribed,cleaned,pending
     * @param string $listId
     * @param array subscriber data
     * @return object
     */
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
     * @param string $listId
     * @param array subscriber data
     * @return object
     */
    public function upsertListMember($listId, $email_address, array $data = [])
    {
        $hash = self::getMemberHash($email_address);
        return self::execute("PUT", "lists/{$listId}/members/{$hash}", $data);
    }

    /**
     * Update List Member
     * array["data"]
     *      ["email_address"]       string      required
     *      ["status"]              string      required
     *                                          Possible Values: subscribed,unsubscribed,cleaned,pending
     * @param string $listId
     * @param array subscriber data
     * @return object
     */
    public function updateListMember($listId, $email_address, array $data = [])
    {
        $hash = self::getMemberHash($email_address);
        return self::execute("PATCH", "lists/{$listId}/members/{$hash}", $data);
    }

    /**
     * Add a new note for a specific subscriber
     * array["data"]
     *      ["note"]       string       The content of the note.
     * @param string $listId
     * @param string $email_address
     * @param array $data (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function addMemberNote($listId, $email_address, array $data = [])
    {
        $hash = self::getMemberHash($email_address);
        return self::execute("POST", "lists/{$listId}/members/{$hash}/notes", $data);
    }

    /**
     * Update a specific note for a specific list member.
     * array["data"]
     *      ["note"]       string       The content of the note.
     * @param string $listId
     * @param string $email_address
     * @param int $noteId
     * @param array $data (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function updateMemberNote($listId, $email_address, $noteId, array $data = [])
    {
        $hash = self::getMemberHash($email_address);
        return self::execute("PATCH", "lists/{$listId}/members/{$hash}/notes/{$noteId}", $data);
    }

    /**
     * Delete a specific note for a specific list member.
     * @param string $listId
     * @param string $email_address
     * @param int $noteId
     */
    public function deleteMemberNote($listId, $email_address, $noteId)
    {
        $hash = self::getMemberHash($email_address);
        return self::execute("DELETE", "lists/{$listId}/members/{$hash}/notes/{$noteId}");
    }

    /**
     * Delete a subscriber
     * @param string $listId
     * @param string email address
     */
    public function deleteListMember($listId, $email_address)
    {
        $hash = self::getMemberHash($email_address);
        return self::execute("DELETE", "lists/{$listId}/members/{$hash}");
    }

}

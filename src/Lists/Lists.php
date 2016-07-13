<?php
namespace MailChimp\Lists;

use MailChimp\MailChimp as MailChimp;
use MailChimp\Lists\Members as Members;


class Lists extends MailChimp
{
    /**
    * Create the member hash
    *
    * @param string email address
    * @return string
    **/
    protected static function getMemberHash($email_address)
    {
        return md5(strtolower($email_address));
    }

    /**
     * Get a list of lists for the account
     * Available query fields:
     * array["fields"]                  array       list of strings of response fields to return
     * array["exclude_fields"]          array       list of strings of response fields to exclude (not to be used with "fields")
     * array["count"]                   int         number of records to return
     * array["offset"]                  int         number of records from a collection to skip.
     * array["before_date_created"]     string      Restrict response to lists created before the set date.
     *                                              ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * array["since_date_created"]      string      Restrict results to lists created after the set date.
     *                                              ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * array["before_campaign_last_sent"] string    Restrict results to lists created before the last campaign send date.
     *                                              ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * array["since_campaign_last_sent"] string     Restrict results to lists created after the last campaign send date.
     *                                              ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * email                            string      Restrict results to lists that include a specific subscriber’s email address.`
     *
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
    **/
    public function getLists(array $query = [])
    {
        return self::execute("GET", "lists", $query);
    }

    /**
     * Get a single campaign
     *
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     *
     * @param string $listId for the list instance
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object list instance
    **/
    public function getList($listId, array $query = [])
    {
        return self::execute("GET", "lists/{$listId}", $query);
    }

    /**
     * Create a list
     * array["data"]
     *      ["name"]                string      required
     *      ["permission_reminder"] string      required
     *      ["contact"]             array       required
     *          ["company"]         string      required
     *          ["address1"]        string      required
     *          ["address2"]        string
     *          ["city"]            string      required
     *          ["state"]           string      required
     *          ["zip"]             string      required
     *          ["country"]         string      required
     *          ["phone"]           string
     *      ["use_archive_bar"]     boolean
     *      ["campaign_defaults"]   array       required
     *          ["from_name"]       string      required
     *          ["from_email"]      string      required
     *          ["subject"]         string      required
     *          ["language"]        string      required
     *      ["notify_on_subscribe"] string      The email address to send subscribe notifications to.
     *      ["notify_on_unsubscribe"] string    The email address to send unsubscribe notifications to.
     *      ["email_type_option"]   boolean
     *      ["visibility"]          string      Whether this list is public or private.
     *                                          Possible Values: pub,prv
     * @param array $data (See Above)
     * @return object created list information
    **/
    public function createList(array $data = [])
    {
        return self::execute("POST", "lists", $data);
    }

    /**
     * Update an existing list
     *
     * @param string $listId list id for list to edit
     * @param array $data fields to update (See structure from createList
     * @return object updated list
    **/
    public function updateList($listId, array $data = [])
    {
        return self::execute("PATCH", "lists/{$listId}", $data);
    }

    /**
     * Delete a list
     *
     * @param string list id
    **/
    public function deleteList($listId)
    {
        return self::execute("DELETE", "lists/{$listId}");
    }


    /**
     *  Instantiate lists subresources
    **/
    public function members()
    {
        return new Members;
    }

}

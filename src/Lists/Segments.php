<?php
namespace MailChimp\Lists;

class Segments extends Lists
{

    /**
     * Get a list of campaigns for the account
     * Available query fields:
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     * array["count"]               int         number of records to return
     * array["offset"]              int         number of records from a collection to skip.
     * array["type"]                string      The campaign type.
     *                                          Possible values: saved,static,fuzzy
     * array["since_created_at"]    string      Restrict the response to campaigns created after the set time.
     *                                          ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * array["before_created_at"]   string      Restrict the response to segments created before the set time.
     *                                          ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * array["since_updated_at"]   string       Restrict the response to segments updated after the set time.
     *                                          ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * array["before_updated_at"]   string      Restrict the response to segments updated after the set time.
     *                                          ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     *
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
    */
    public function getListSegments($listId, array $query = [])
    {
        return self::execute("GET", "lists/{$listId}/segments", $query);
    }

}

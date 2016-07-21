<?php

namespace MailChimp\Templates;

use MailChimp\MailChimp as MailChimp;

class Templates extends MailChimp
{

    /**
     * Get a list of templates for the account
     * Available query fields:
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     * array["count"]               int         number of records to return
     * array["offset"]              int         number of records from a collection to skip.
     * array["folder_id"]           string      Filter results by a specific campaign folder.
     * array["type"]                string      The campaign type.
     *                                          Possible values: regular,plaintext,absplit,rss,variate
     * array["status"]              string      The status of the campaign.
     *                                          Possible Values: save,paused,schedule,sending,sent
     * array["before_send_time"]    string      Restrict the response to campaigns sent before the set time.
     *                                          ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * array["since_send_time"]     string      Restrict the response to campaigns sent after the set time.
     *                                          ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * array["before_create_time"]  string      Restrict the response to campaigns sent after the set time.
     *                                          ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * array["since_create_time"]   string      Restrict the response to campaigns created after the set time.
     *                                          ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     *
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getTemplates(array $query = [])
    {
        return self::execute("GET", "templates", $query);
    }

    /**
     * Get a list of campaigns for the account
     * Available query fields:
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     *
     * @param int template id
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getTemplate($templateId, array $query = [])
    {
        return self::execute("GET", "templates/{$templateId}", $query);
    }

    /**
     * Update an existing template
     * @param int template id
     * @param array data
     * @return object
     */
    public function updateTemplate($templateId, array $data = [])
    {
        return self::execute("PATCH", "templates/{$templateId}", $data);
    }

    /**
     * Update an existing template
     * @param int Template id
     */
    public function deleteTemplate($templateId)
    {
        return self::execute("DELETE", "templates/{$templateId}");
    }

}

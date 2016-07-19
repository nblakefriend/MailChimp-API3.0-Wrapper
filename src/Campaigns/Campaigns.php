<?php
namespace MailChimp\Campaigns;

use MailChimp\MailChimp as MailChimp;

class Campaigns extends MailChimp
{

    /**
     * Get a list of campaigns for the account
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
    public function getCampaigns(array $query = [])
    {
        return self::execute("GET", "campaigns", $query);
    }

    /**
     * Get a single campaign
     *
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     *
     * @param string $campaignId for the campaign instance
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getCampaign($campaignId, array $query = [])
    {
        return self::execute("GET", "campaigns/{$campaignId}", $query);
    }

    /**
     * Review the send checklist for a campaign, and resolve any issues before sending.
     *
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     *
     * @param string $campaignId for the campaign instance
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getCampaignChecklist($campaignId, array $query = [])
    {
        return self::execute("GET", "campaigns/{$campaignId}/send-checklist", $query);
    }

    /**
     * TODO: determine best way to set up complex request body.
     * Create a campaign
     * $type            string      Required Possible Values: regular,plaintext,rss,variate
     * $recipients      array
     *      $recipients["list_id"]      string      Required
     *      $recipients["segment_opts"] array
     * @param array $data
     * @return object
     */
    public function createCampaign($type, array $recipients = [], array $settings = [], array $optionalSettings = [])
    {
        $data = [
            "type" => $type,
            "recipients" => $recipients,
            "settings" => $settings
        ];

        // If optional settings are passed, let's go ahead and lowercase the key values.
        if (isset($optionalSettings)) {
            foreach ($optionalSettings as $key => $value) {
                $opts[strtolower($key)] = $value;
            }
        }

        if (strtolower($type) == "variate") {
            $data["variate_settings"] = $opts["variate_settings"];
        }
        if (strtolower($type) == "rss") {
            $data["rss_opts"] = $opts["rss_opts"];
        }
        if (array_key_exists("tracking", $opts)) {
            $data["tracking"] = $opts["tracking"];
        }
        if (array_key_exists("social_card", $opts)) {
            $data["social_card"] = $opts["social_card"];
        }
        return self::execute("POST", "campaigns", $data);
    }


    /**
     * Pause an RSS-Driven campaign
     * @param string $campaignId for the campaign instance
     */
    public function pauseRSSCampaign($campaignId)
    {
        return self::execute("POST", "campaigns/{$campaignId}/actions/pause");
    }

    /**
     * Resume an RSS-Driven campaign
     * @param string $campaignId for the campaign instance
     */
    public function resumeRSSCampaign($campaignId)
    {
        return self::execute("POST", "campaigns/{$campaignId}/actions/resume");
    }

    /**
     * Replicate a campaign
     * @param string $campaignId for the campaign instance
     */
    public function replicateCampaign($campaignId)
    {
        return self::execute("POST", "campaigns/{$campaignId}/actions/replicate");
    }


    /**
     * Cancel a campaign
     * @param string $campaignId for the campaign instance
     */
    public function cancelCampaign($campaignId)
    {
        return self::execute("POST", "campaigns/{$campaignId}/actions/cancel-send");
    }

    /**
     * Schedule a campaign
     * @param string $campaignId for the campaign instance
     */
    public function scheduleCampaign($campaignId)
    {
        return self::execute("POST", "campaigns/{$campaignId}/actions/schedule");
    }

    /**
     * Unschedule a campaign
     * @param string $campaignId for the campaign instance
     */
    public function unscheduleCampaign($campaignId)
    {
        return self::execute("POST", "campaigns/{$campaignId}/actions/unschedule");
    }

    /**
     * Send a test email
     * @param string $campaignId for the campaign instance
     */
    public function sendCampaignTest($campaignId)
    {
        return self::execute("POST", "campaigns/{$campaignId}/actions/test");
    }

    /**
     * Send a campaign
     * @param string $campaignId for the campaign instance
     */
    public function sendCampaign($campaignId)
    {
        return self::execute("POST", "campaigns/{$campaignId}/actions/send");
    }

    /**
     * Delete a campaign
     * @param string $campaignId for the campaign instance
     */
    public function deleteCampaign($campaignId)
    {
        return self::execute("DELETE", "campaigns/{$campaignId}/");
    }


}

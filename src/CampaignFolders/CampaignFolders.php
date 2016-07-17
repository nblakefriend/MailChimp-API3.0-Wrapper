<?php
namespace MailChimp\CampaignFolders;

use MailChimp\MailChimp as MailChimp;

class CampaignFolders extends MailChimp
{

    /**
     * Get all folders used to organize campaigns.
     * Available query fields:
     * array["fields"]                  array       list of strings of response fields to return
     * array["exclude_fields"]          array       list of strings of response fields to exclude (not to be used with "fields")
     * array["count"]                   int         number of records to return
     * array["offset"]                  int         number of records from a collection to skip.
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getCampaignFolders(array $query = [])
    {
        return self::execute("GET", "campaign-folders", $query);
    }

    /**
     * Get information about a specific folder used to organize campaigns.
     * Available query fields:
     * array["fields"]                  array       list of strings of response fields to return
     * array["exclude_fields"]          array       list of strings of response fields to exclude (not to be used with "fields")
     * @param string $folderId
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getCampaignFolder($folderId, array $query = [])
    {
        return self::execute("GET", "campaign-folders/{$folderId}", $query);
    }

    /**
     * Create a new campaign folder.
     * array["data"]
     *      ["name"]    string      required
     * @param array $data (See Above)
     * @return object
     */
    public function createCampaignFolder(array $data = [])
    {
        return self::execute("POST", "campaign-folders", $data);
    }

    /**
     * Update a specific folder used to organize campaigns.
     * array["data"]
     *      ["name"]    string
     * @param array $data (See Above)
     * @return object
     */
    public function updateCampaignFolder($folderId, array $data = [])
    {
        return self::execute("PATCH", "campaign-folders/{$folderId}", $data);
    }

    /**
     * Delete a specific campaign folder, and mark all the campaigns in the folder as ‘unfiled’.
     * @param string $folderId
     */
    public function deleteCampaignFolder($folderId, array $query = [])
    {
        return self::execute("DELETE", "campaign-folders/{$folderId}");
    }

}

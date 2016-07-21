<?php
namespace MailChimp\TemplateFolders;

use MailChimp\MailChimp as MailChimp;

class TemplateFolders extends MailChimp
{

    /**
     * Get all folders used to organize Templates.
     * Available query fields:
     * array["fields"]                  array       list of strings of response fields to return
     * array["exclude_fields"]          array       list of strings of response fields to exclude (not to be used with "fields")
     * array["count"]                   int         number of records to return
     * array["offset"]                  int         number of records from a collection to skip.
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getTemplateFolders(array $query = [])
    {
        return self::execute("GET", "template-folders", $query);
    }

    /**
     * Get information about a specific folder used to organize Templates.
     * Available query fields:
     * array["fields"]                  array       list of strings of response fields to return
     * array["exclude_fields"]          array       list of strings of response fields to exclude (not to be used with "fields")
     * @param string $folderId
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getTemplateFolder($folderId, array $query = [])
    {
        return self::execute("GET", "template-folders/{$folderId}", $query);
    }

    /**
     * Create a new Template folder.
     * @param string Folder Name
     * @return object
     */
    public function createTemplateFolder($folderName)
    {
        $data = ["name" => $folderName];
        return self::execute("POST", "template-folders", $data);
    }

    /**
     * Update a specific folder used to organize Templates.
     * @param string Folder Name
     * @return object
     */
    public function updateTemplateFolder($folderId, $folderName)
    {
        $data = ["name" => $folderName];
        return self::execute("PATCH", "template-folders/{$folderId}", $data);
    }

    /**
     * Delete a specific Template folder, and mark all the Templates in the folder as ‘unfiled’.
     * @param string $folderId
     */
    public function deleteTemplateFolder($folderId)
    {
        return self::execute("DELETE", "template-folders/{$folderId}");
    }

}

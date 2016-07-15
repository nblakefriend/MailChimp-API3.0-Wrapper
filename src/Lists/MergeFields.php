<?php
namespace MailChimp\Lists;

class MergeFields extends Lists
{

    /**
     * Get a list of all merge fields (formerly merge vars) for a list.
     * Available query fields:
     * array["fields"]                  array       list of strings of response fields to return
     * array["exclude_fields"]          array       list of strings of response fields to exclude (not to be used with "fields")
     * array["count"]                   int         number of records to return
     * array["offset"]                  int         number of records from a collection to skip.
     * array["type"]                    string      The merge field type.
     * array["required"]                boolean     The boolean value if the merge field is required.
     * @param string $listId
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getMergeFields($listId, array $query = [])
    {
        return self::execute("GET", "lists/{$listId}/merge-fields", $query);
    }

    /**
     * Get information about a specific merge field in a list.
     * Available query fields:
     * array["fields"]                  array       list of strings of response fields to return
     * array["exclude_fields"]          array       list of strings of response fields to exclude (not to be used with "fields")
     * @param string $listId
     * @param int $mergeId
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getMergeField($listId, $mergeId, array $query = [])
    {
        return self::execute("GET", "lists/{$listId}/merge-fields/{$mergeId}", $query);
    }

    /**
     * Delete a specific merge field in a list.
     * @param string $listId
     * @param int $mergeId
     */
    public function deleteMergeField($listId, $mergeId)
    {
        return self::execute("DELETE", "lists/{$listId}/merge-fields/{$mergeId}");
    }

}

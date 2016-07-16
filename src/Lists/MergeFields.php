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
     * Create a new merge field for a specific list
     * array["data"]
     *      ["tag"]                     string       The tag used in MailChimp campaigns and for the /members endpoint.
     *      ["name"]                    string       Required. The name of the merge field
     *      ["type"]                    string       Required. The type for the merge field
     *      ["required"]                boolean      The boolaen value if the merge field is required
     *      ["default_value"]           string       The type for the merge field
     *      ["public"]                  boolean      Whether the merge field is displayed on the signup form.
     *      ["display_order"]           int          The order the merge field displays on the signup form.
     *      ["options"]                 array        Extra option for some merge field tidy_parse_string
     *             ["default_country"]  int          In an address field, the default country code if none supplied
     *             ["phone_format"]     string       In a phone field, the phone number tupe: US or International
     *             ["date_format"]      string       In a date or birthday field, the format of the date
     *             ["choices"]          array        In a radio or dropdown non-group field, the available options.
     *             ["size"]             int          In a text field, the default length fo the text field
     *      ["help_text"]               string        Extra text to help the subscrber fill out the form
     * @param string $listId
     * @param array $data
     * @return object
     */
     public function createMergeField($listId, array $data = [])
     {
        return self::execute("POST", "lists/{$listId}/merge-fields", $data);
     }

    /**
     * Update a specific merge field in a list
     * @param string $listId
     * @param string $mergeId
     * @param array $data (See createMergeField() for structure)
     * @return object
     */
     public function updateMergeField($listId, $mergeId, array $data = [])
     {
        return self::execute("PATCH", "lists/{$listId}/merge-fields/{$mergeId}", $data);
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

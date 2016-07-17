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
     * @param string $listId
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getListSegments($listId, array $query = [])
    {
        return self::execute("GET", "lists/{$listId}/segments", $query);
    }

    /**
     * Get information about a specific segment.
     * Available query fields:
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     * @param string $listId
     * @param string $segmentId
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
     public function getListSegment($listId, $segmentId, array $query = [])
     {
         return self::execute("GET", "lists/{$listId}/segments/{$segmentId}", $query);
     }

     /**
      * Get information about members in a saved segment.
      * Available query fields:
      * array["fields"]              array       list of strings of response fields to return
      * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
      * array["count"]               int         number of records to return
      * array["offset"]              int         number of records from a collection to skip.
      * @param string $listId
      * @param string $segmentId
      * @param array $query (See Above) OPTIONAL associative array of query parameters.
      * @return object
      */
      public function getListSegmentMember($listId, $segmentId, array $query = [])
      {
          return self::execute("GET", "lists/{$listId}/segments/{$segmentId}/members", $query);
      }


     /**
      * Create a new segment in a specific list.
      * array["data"]
      *      ["name"]               string     required
      *      ["static_segment"]     array       An array of emails to be used for a static segment.
      *                                         Any emails provided that are not present on the list will be ignored.
      *                                         Passing an empty array will create a static segment without any subscribers.
      *                                         This field cannot be provided with the options field.
      *     ["options"]             array       The conditions of the segment. Static and fuzzy segments don’t have conditions.
      *         ["match"]           string      Match Type Possible Values: any, all
      *         ["conditions"]      array       An array of segment conditions.
      *               Structure depends on segment http://developer.mailchimp.com/documentation/mailchimp/reference/lists/segments/#
      * @param string $listId
      * @param array $data
      * @return object
      */
     public function createListSegment($listId, array $data =[])
     {
         return self::execute("POST", "lists/{$listId}/segments", $data);
     }

     /**
      * Update a specific segment in a list.
      * Structure depends on segment http://developer.mailchimp.com/documentation/mailchimp/reference/lists/segments/#
      * @param string $listId
      * @param array $data
      * @return object
      */
     public function updateListSegment($listId, $segmentId, array $data =[])
     {
         return self::execute("PATCH", "lists/{$listId}/segments/{$segmentId}", $data);
     }

     /**
     * Add a member to a static segment.
     * array["data"]
     *      ["email_address"]      string     required
      * @param string $listId
      * @param array $data
      * @return object
      */
     public function addListSegmentMember($listId, $segmentId, $email_address, array $data =[])
     {
         return self::execute("POST", "lists/{$listId}/segments/{$segmentId}/members", $data);
     }


     /**
      * Remove a member from the specified static segment.
      * @param string $listId
      * @param string $segmentId
      * @param string $email_address
      */
      public function removeListSegmentMember($listId, $segmentId, $email_address)
      {
          $hash = self::getMemberHash($email_address);
          return self::execute("DELETE", "lists/{$listId}/segments/{$segmentId}/members/{$hash}");
      }

     /**
      * Delete a specific segment in a list.
      * @param string $listId
      * @param string $segmentId
      */
      public function deleteListSegment($listId, $segmentId)
      {
          return self::execute("DELETE", "lists/{$listId}/segments/{$segmentId}");
      }

}

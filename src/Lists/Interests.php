<?php
namespace MailChimp\Lists;

class Interests extends Lists
{

    /**
     * Get information about a list’s interest categories.
     * Available query fields:
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     * array["count"]               int         number of records to return
     * array["offset"]              int         number of records from a collection to skip.
     * array["type"]                string      Restrict results a type of interest group
     * @param string $listId
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getInterestCategories($listId, array $query = [])
    {
        return self::execute("GET", "lists/{$listId}/interest-categories", $query);
    }

    /**
     * Get information about a specific interest category.
     * Available query fields:
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     * @param string $listId
     * @param string $interestCategoryId
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getInterestCategory($listId, $interestCategoryId, array $query = [])
    {
        return self::execute("GET", "lists/{$listId}/interest-categories/{$interestCategoryId}", $query);
    }

    /**
     * Create a new interest category
     *
     * array["data"]
     *      ["title"]           string      The text description of this category.
     *      ["display_order"]   int         The order that the categories are displayed in the list. Lower numbers display first.
     *      ["type"]            string      Determines how this category’s interests are displayed on signup forms.
     *                                      Possible Values: checkboxes,dropdown,radio,hidden
     * @param string $listId
     * @param array $data
     * @return object
     */
     public function createInterestCategory($listId, array $data = [])
     {
        return self::execute("POST", "lists/{$listId}/interest-categories", $data);
     }

     /**
      * Update a specific interest category.
      *
      * array["data"]
      *      ["title"]           string      The text description of this category.
      *      ["display_order"]   int         The order that the categories are displayed in the list. Lower numbers display first.
      *      ["type"]            string      Determines how this category’s interests are displayed on signup forms.
      *                                      Possible Values: checkboxes,dropdown,radio,hidden
      * @param string $listId
      * @param string $interestCategoryId
      * @param array $data
      * @return object
      */
      public function updateInterestCategory($listId, $interestCategoryId, array $data = [])
      {
         return self::execute("PATCH", "lists/{$listId}/interest-categories/{$interestCategoryId}", $data);
      }

    /**
     * Delete a specific interest category.
     * @param string $listId
     * @param string $interestCategoryId
     */
    public function deleteInterestCategory($listId, $interestCategoryId)
    {
        return self::execute("DELETE", "lists/{$listId}/interest-categories/{$interestCategoryId}");
    }

    /**
     * Get a list of this category’s interests.
     * Available query fields:
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     * array["count"]               int         number of records to return
     * array["offset"]              int         number of records from a collection to skip.
     * @param string $listId
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getInterests($listId, $interestCategoryId, array $query = [])
    {
        return self::execute("GET", "lists/{$listId}/interest-categories/{$interestCategoryId}/interests", $query);
    }

    /**
     * Get interests or ‘group names’ for a specific category.
     * Available query fields:
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     * @param string $listId
     * @param string $interestCategoryId
     * @param string $interestId
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getInterest($listId, $interestCategoryId, $interestId, array $query = [])
    {
        return self::execute("GET", "lists/{$listId}/interest-categories/{$interestCategoryId}/interests/{$interestId}", $query);
    }

    /**
     * Create a new interest or ‘group name’ for a specific category.
     * array["data"]
     *      ["name"]           string       The name of the interest.
     * @param string $listId
     * @param string $interestCategoryId
     * @param array $data (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function createInterest($listId, $interestCategoryId, array $data = [])
    {
        return self::execute("POST", "lists/{$listId}/interest-categories/{$interestCategoryId}/interests/", $data);
    }

    /**
     * Update interests or ‘group names’ for a specific category.
     * array["data"]
     *      ["name"]           string       The name of the interest.
     * @param string $listId
     * @param string $interestCategoryId
     * @param string $interestId
     * @param array $data (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function updateInterest($listId, $interestCategoryId, $interestId, array $data = [])
    {
        return self::execute("PATCH", "lists/{$listId}/interest-categories/{$interestCategoryId}/interests/{$interestId}", $data);
    }


    /**
     * Delete interests or group names in a specific category.
     * @param string $listId
     * @param string $interestCategoryId
     * @param string $interestId
     * @return object
     */
    public function deleteInterest($listId, $interestCategoryId, $interestId)
    {
        return self::execute("DELETE", "lists/{$listId}/interest-categories/{$interestCategoryId}/interests/{$interestId}");
    }


}

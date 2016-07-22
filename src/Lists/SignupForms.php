<?php
namespace MailChimp\Lists;

class SignupForms extends Lists
{

    /**
     * Get a list of signup form values
     * @param string $listId
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
    */
    public function getSignupForms($listId, array $query = [])
    {
        return self::execute("GET", "lists/{$listId}/signup-forms", $query);
    }

    /**
     * customize a lists signup form values
     * @param string $listId
     * @param array $data (See Above) OPTIONAL associative array of query parameters.
     * @return object
    */
    public function editSignupForm($listId, array $data = [])
    {
        return self::execute("POST", "lists/{$listId}/signup-forms", $data);
    }

}

<?php
namespace MailChimp\AuthorizedApps;

use MailChimp\MailChimp as MailChimp;

class AuthorizedApps extends MailChimp
{
    
    /**
    * Get a list of Authorized Apps for the account
    * Available query fields:
    * array["fields"]              array       list of strings of response fields to return
    * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
    * array["count"]               int         number of records to return
    * array["offset"]              int         number of records from a collection to skip.
    **/
    public function getApps(array $query = [])
    {
        return self::execute("GET", "authorized-apps", $query);
    }

    /**
    * Get a list of Authorized Apps for the account
    * Available query fields:
    * array["fields"]              array       list of strings of response fields to return
    * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
    **/
    public function getApp($appId, array $query = [])
    {
        return self::execute("GET", "authorized-apps/{$appId}", $query);
    }

    /**
    * Retrieve OAuth2-based credentials to associate API calls with your application.
    * @param array $data
    * @return object with access_token and viewer_token
    **/
    public function manageApp(array $data = [])
    {
        return self::execute("POST", "authorized-apps", $data);
    }



}

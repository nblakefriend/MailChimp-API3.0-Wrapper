<?php
namespace MailChimp\Automations;

use MailChimp\MailChimp as MailChimp;

class Automations extends MailChimp
{

    /**
     * Get a summary of an account’s Automations.
     *
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     *
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getAutomations(array $query = [])
    {
        return self::execute("GET", "automations/", $query);
    }

    /**
     * Get a summary of an individual Automation workflow’s settings and content.
     *
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     * @param string $workflowId
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getAutomation($workflowId, array $query = [])
    {
        return self::execute("GET", "automations/{$workflowId}", $query);
    }

    /**
     * Start all emails in an Automation workflow.
     * @param string $workflowId
     */
    public function startAutomation($workflowId)
    {
        return self::execute("POST", "automations/{$workflowId}/actions/start-all-emails");
    }

    /**
     * Pause all emails in an Automation workflow.
     * @param string $workflowId
     */
    public function pauseAutomation($workflowId)
    {
        return self::execute("POST", "automations/{$workflowId}/actions/pause-all-emails");
    }

    /**
     * Get a list of automated emails in a workflow
     *
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     * @param string $workflowId
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getWorkflowEmails($workflowId, array $query = [])
    {
        return self::execute("GET", "automations/{$workflowId}/emails", $query);
    }

    /**
     * Get information about a specific workflow email
     *
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     * @param string $workflowId
     * @param string $workflowEmailId
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getWorkflowEmail($workflowId, $workflowEmailId, array $query = [])
    {
        return self::execute("GET", "automations/{$workflowId}/emails/{$workflowEmailId}", $query);
    }

    /**
     * Start an automated email
     * @param string $workflowId
     * @param string $workflowEmailId
     */
    public function startWorkflowEmail($workflowId,$workflowEmailId)
    {
        return self::execute("POST", "automations/{$workflowId}/emails/{$workflowEmailId}/actions/start-all-emails");
    }

    /**
     * Pause an automated email
     * @param string $workflowId
     * @param string $workflowEmailId
     */
    public function pauseWorkflowEmail($workflowId,$workflowEmailId)
    {
        return self::execute("POST", "automations/{$workflowId}/emails/{$workflowEmailId}/actions/pause-all-emails");
    }

    /**
     * View queued subscribers for an automated email
     *
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     * @param string $workflowId
     * @param string $workflowEmailId
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getWorkflowEmailQueue($workflowId, $workflowEmailId, array $query = [])
    {
        return self::execute("GET", "automations/{$workflowId}/emails/{$workflowIdEmailId}/queue", $query);
    }

    /**
     * View specific subscriber in email queue
     *
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     * @param string $workflowId
     * @param string $workflowEmailId
     * @param string $emailAddress
     * @param array $query (See Above) OPTIONAL associative array of query parameters.
     * @return object
     */
    public function getWorkflowEmailSubscriber($workflowId, $workflowEmailId, $emailAddress, array $query = [])
    {
        $hash = self::getMemberHash($emailAddress);
        return self::execute("GET", "automations/{$workflowId}/emails/{$workflowIdEmailId}/queue/{$hash}", $query);
    }

    /**
     * Add a subscriber to a workflow email
     * @param string $workflowId
     * @param string $workflowEmailId
     * @param string $emailAddress
     */
    public function addWorkflowEmailSubscriber($workflowId, $workflowEmailId, $emailAddress)
    {
        $data = ["email_address"] = $emailAddress];
        return self::execute("POST", "automations/{$workflowId}/email/{$workflowEmailId}/queue" $data);
    }

    /**
     * View all subscribers removed from a workflow
     *
     * array["fields"]              array       list of strings of response fields to return
     * array["exclude_fields"]      array       list of strings of response fields to exclude (not to be used with "fields")
     * @param string $workflowId
     */
    public function getRemovedWorkflowSubscribers($workflowId, array $query = [])
    {
        return self::execute("GET", "automations/{$workflowId}/removed-subscribers" $query);
    }

    /**
     * Remove subscriber from a workflow
     * @param string $workflowId
     * @param string $workflowEmailId
     * @param string $emailAddress
     */
    public function removeWorkflowSubscriber($workflowId, $emailAddress)
    {
        $data = ["email_address"] = $emailAddress];
        return self::execute("POST", "automations/{$workflowId}/removed-subscribers" $data);
    }

}

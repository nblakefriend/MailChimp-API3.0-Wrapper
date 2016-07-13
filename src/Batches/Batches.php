<?php
namespace MailChimp\Batches;

use MailChimp\MailChimp as MailChimp;

class Batches extends MailChimp
{
    public function getBatches ()
    {
        return self::execute("GET", "batches");
    }

    public function getBatch ($batchId)
    {
        return self::execute("GET", "batches/{$batchId}");
    }

    public function createBatch ($operations)
    {
        $data = array("operations" => $operations);
        return self::execute("POST", "batches", $data);
    }

}

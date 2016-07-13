<?php

namespace MailChimp\Templates;

use MailChimp\MailChimp as MailChimp;

class Templates extends MailChimp
{

    // Get Things
    public function getTemplates()
    {
        return self::execute("GET", "/templates/");
    }

}

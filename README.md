# MailChimp API v3.0 PHP Wrapper

PHP wrapper for the MailChimp API v 3.0.

### Dependencies
- GuzzleHttp
- PHP > 5.4

*Project still in the works. More documentation to come*

### Getting Started
1. In MailChimp/src create `config.ini` file with structure:

```
[apikeys]
key1[apikey] = "yourmcapikey-usx"
key1[active] = true
```

Multiple accounts can be configured in this config file.

```
[apikeys]
key1[apikey] = "yourmcapikey-usx"
key1[active] = true

key2[apikey] = "yourmcapikey-usx"
key2[active] = false
```

Whichever key[active] is true will be used.

***config.ini is excluded in the .gitignore file. Make sure this is not changed!***

2. Navigate to the MailChimp folder and run `composer update` to download Dependencies.
3. Call `require_once 'MailChimp/vendor/autoload.php'` in your file.
4. Instantiate with `$mc = new MailChimp\MailChimp`;
5. `print_r($mc->getAccountInfo());` should return the MailChimp API Root call.

### Using collections
Each MailChimp collections **(lists, campaigns, e-commerce etc.)** is accessed using a method found at the bottom of the `MailChimp.php` file.

*For example:*
If your MailChimp instance is stored in the `$mc` variable

#### Lists
`$mc->lists()->getLists();`
This would return the response from calling /lists
http://developer.mailchimp.com/documentation/mailchimp/reference/lists/#read-get_lists

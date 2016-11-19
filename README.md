# MailChimp API v3.0 PHP Wrapper

PHP wrapper for the MailChimp API v 3.0.

### Dependencies
- GuzzleHttp
- PHP > 5.4

*Project still in the works. More documentation to come*

### Getting Started
1. In MailChimp/src create `config.ini` file with structure:

```
[api_keys]
key1[api_keys] = "yourmcapikey-usx"
key1[active] = true
```

Multiple accounts can be configured in this config file.

```
[api_keys]
key1[api_keys] = "yourmcapikey-usx"
key1[active] = true

key2[api_keys] = "yourmcapikey-usx"
key2[active] = false
```

Whichever key[active] is true will be used.

***config.ini is excluded in the .gitignore file. Make sure this is not changed!***

2. Navigate to the MailChimp folder and run `composer update` to download Dependencies.
3. Call `require_once 'MailChimp/vendor/autoload.php'` in your file.
4. Instantiate with `$mc = new MailChimp\MailChimp`;
5. `print_r($mc->getAccountInfo());` should return the MailChimp API Root call.

### Using collections
Each MailChimp collections *(lists, campaigns, e-commerce etc.)* is accessed using a method found at the bottom of the `MailChimp.php` file.

**For example:**
*Assuming your MailChimp instance is stored in the `$mc` variable*

#### Lists
`$mc->lists()->getLists();`
This would return the response from calling /lists
http://developer.mailchimp.com/documentation/mailchimp/reference/lists/#read-get_lists

#### E-commerce
Adding a new store customer
`$mc->ecommerce()->customers()->addCustomer("STORE123", "CUST123", "freddie@freddiesjokes.com", true);`
This would create a new customer to the store with id `STORE123` with the customer id `CUST123` and the email address `freddie@freddiesjokes.com` and an opt-in status of true which subscribes the customer to the list.

**[See complete list of available methods and classes here](https://nblakefriend.github.io/MailChimp-API3.0-Wrapper/index.html)**

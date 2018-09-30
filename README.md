# currency_converter

Task description:
---
Write an application (Not necessarily UI) which would fulfil these requirements.  

1) Use our provided csv  (you can find it in attached files) with exchange rates  (name, exchangeRate < multiplier if exchanged to EUR>)
2) According to information provided by the user  (amount,  starting currency, final currency) it should show the output to the specified currency
3) The output must be accurate, up to 18 decimal places (after the decimal point)
4) Should have some automated tests - amount of tests is up to you


#### Required setup/environment:
* PHP 7.2
* phpunit (https://phpunit.de/getting-started/phpunit-7.html)
* [Composer](https://getcomposer.org/) is used for managing dependencies.


# Project Setup
* git clone https://github.com/sitetester/currency_converter.git
* cd currency_converter
* composer install
* php bin/console server:start

#### To access in browser
Open a browser with address & port where web server started in terminal window by running ```php bin/console server:start```

#### Unit tests
Application functionality is tested using unit & functional tests.
To run all the tests, simply run `phpunit` at root of the project

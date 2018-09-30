# currency_converter

Task description:
---
Write an application (Not necessarily UI) which would fulfil these requirements.  

1) Use our provided csv  (you can find it in attached files) with exchange rates  (name, exchangeRate < multiplier if exchanged to EUR>)
2) According to information provided by the user  (amount,  starting currency, final currency) it should show the output to the specified currency
3) The output must be accurate, up to 18 decimal places (after the decimal point)
4) Should have some automated tests - amount of tests is up to you


# Project Setup

#### Required setup/environment:
* PHP 7.2
* Symfony 4.1

#### Project dependencies
[Composer](https://getcomposer.org/) is used for managing dependencies.

Open a terminal window & run ```composer install``` command at root of the project.
It will install all required dependencies of the project which are specified in ```composer.json``` file.
It will also create ```vendor``` directory on file system.

#### Web server:
If you don't have apache/nginx already configured, you can use php built-in web server as well.
Open a terminal window & run ```php bin/console server:start``` at root of the project to start the server. Then open a browser with address & port where web
server started in terminal window.

#### Unit tests
Application functionality is tested using unit & functional tests
To run all the tests, simply run `phpunit` at root of the project

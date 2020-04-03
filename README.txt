PHP/ HTML Web Application with MySQL database
Running local with XAMPP v3.2.4 with PHP 7.4.3
PHPunit v9.0.2 used for Testing
**************************************
Easy steps to run:
Extract GasQuote.zip to xampp/htdocs

Start Apache and MySQL services through XAMPP control panel
visit: http://localhost/phpmyadmin in any browser to import .sql data

Go to: http://localhost/GasQuote/profile to access WebApp

Register your username and password, then input details at Profile Management to access QuoteRequest and QuoteHistory pages.


*************************************
For testing install PHPunit to v 7 or higher
I found this link helpful: https://stackoverflow.com/questions/43188374/update-phpunit-xampp
Place test folders and any included model files into the /xampp/php/pear/PHPUnit directory

Open Xampp shell and navigate to xampp/php
enter:
#  phpunit /PHPUnit/mytestfile.php

<?php 

define('DB_USER', 'Summer2021');
define('DB_PASSWORD', 'summer2021');
define('DB_HOST', 'localhost');
define('DB_NAME', 'Bookstore');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );

mysqli_set_charset($dbc, 'utf8');

?>
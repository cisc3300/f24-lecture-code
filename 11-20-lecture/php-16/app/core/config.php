<?php

use \app\core\AuthHelper;

if($_SERVER['SERVER_NAME'] == 'localhost')
{
	/** database config **/
	define('DBNAME', $env['DBNAME']);
	define('DBHOST', $env['DBHOST']);
	define('DBUSER', $env['DBUSER']);
	define('DBPASS', $env['DBPASS']);
	define('DBDRIVER', '');
	
	define('ROOT', 'http://localhost:8888/');

}else
{
	/** database config **/
	define('DBNAME', 'my_db');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', '');

	define('ROOT', 'https://www.yourwebsite.com');

}
$session = AuthHelper::checkSession();
define('APP_NAME', "My Webiste");
define('APP_DESC', "Best website on the planet");

/** true means show errors **/
define('DEBUG', true);

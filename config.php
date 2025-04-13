<?php
require 'environment.php';

global $config;
global $db;

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/protsa/");
	$config['dbname'] = 'bd_name';
	$config['host'] = 'localhost';//em geral o servidor é localhost
	$config['dbuser'] = 'user';//em geral o usuário é root
	$config['dbpass'] = 'pass';
} else {
	define("BASE_URL", "");
	$config['dbname'] = 'bd_online';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'user_online';
	$config['dbpass'] = 'pass_online';
}
	/*Informações de e-mail*/
	$config['hostmail'] = 'servidor_email';
	$config['Usermail'] = 'email';
	$config['Username'] = 'username';
	$config['Password'] = 'password_email';

try {
    $db = new PDO("mysql:charset=utf8;host=" . $config['host'] . ";dbname=" . $config['dbname'], $config['dbuser'], $config['dbpass']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Entre em contato com o suporte";
    error_log("Error " . $e->getMessage(), 3, "error_bd.log");
}



?>
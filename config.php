<?php
require 'environment.php';

global $config;
global $db;

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/protsa/");
	$config['dbname'] = 'republ85_protsa_teste';
	$config['host'] = 'br968.hostgator.com.br';//em geral o servidor é localhost
	$config['dbuser'] = 'republ85_admin';//em geral o usuário é root
	$config['dbpass'] = 'vemcaver_23_info';//em geral a senha é vazia
} else {
	define("BASE_URL", "https://protsa.infocept.com.br/");
	$config['dbname'] = 'republ85_protsa';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'republ85_admin ';
	$config['dbpass'] = '';
}


try {
    $db = new PDO("mysql:charset=utf8;host=" . $config['host'] . ";dbname=" . $config['dbname'], $config['dbuser'], $config['dbpass']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Entre em contato com o suporte";
    error_log("Error " . $e->getMessage(), 3, "error_bd.log");
}



?>
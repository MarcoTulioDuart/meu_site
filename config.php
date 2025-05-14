<?php
// Desabilitar a exibição de erros na tela
error_reporting(0);
ini_set('display_errors', 0);

// Incluir o arquivo de ambiente com as configurações
require 'environment.php';

global $config;
global $db;

$config = array();
if (ENVIRONMENT == 'development') {
    define("BASE_URL", "http://localhost/protsa/");
    $config['dbname'] = 'bd_name';
    $config['host'] = 'localhost'; // Em geral o servidor é localhost
    $config['dbuser'] = 'root'; // Em geral o usuário é root
    $config['dbpass'] = '';
} else {
    define("BASE_URL", "");
    $config['dbname'] = 'bd_online';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'user_online';
    $config['dbpass'] = 'pass_online';
}

// Informações de e-mail
$config['hostmail'] = 'smtp.gmail.com';
$config['Usermail'] = 'marcotulioferreiraduarte@hotmail.com';
$config['Username'] = 'Marco Túlio';
$config['Password'] = 'Tulio.1410';

try {
    // Tentativa de conexão com o banco de dados
    $db = new PDO("mysql:charset=utf8;host=" . $config['host'] . ";dbname=" . $config['dbname'], $config['dbuser'], $config['dbpass']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Mensagem genérica para o usuário
    echo "Houve um erro ao processar sua solicitação. Por favor, tente novamente mais tarde.";

    // Registra o erro detalhado no arquivo de log
    error_log("Erro na conexão com o banco de dados: " . $e->getMessage(), 3, "error_bd.log");
}
?>

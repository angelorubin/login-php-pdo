<?php
// Inicia a sessão
session_start();

// Variável que verifica se o usuário está logado
if ( ! isset( $_SESSION['logado'] ) ) {
    $_SESSION['logado'] = false;
}

// Erro do login
$_SESSION['login_erro'] = false;

// Variáveis da conexão
$db_name        = 'mytestdb2';
$db_username    = 'angelorubin';
$db_password    = 'master77';
$db_host        = 'db4free.net';
$db_charset     = 'UTF8';
$pdo_connection = null;

// Concatenação das variáveis para detalhes da classe PDO
$pdo  = 'mysql:host=' . $db_host . ';';
$pdo .= 'dbname='. $db_name . ';';
$pdo .= 'charset=' . $db_charset . ';';

// Tenta conectar
try {
    // Cria a conexão PDO com a base de dados
    $pdo_connection = new PDO($pdo, $db_username, $db_password);
} catch (PDOException $e) {
    // Se der algo errado, mostra o erro PDO
    print "Erro: " . $e->getMessage() . "<br/>";
   
    // Mata o script
    die();
}

?>
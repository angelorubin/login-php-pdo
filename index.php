<?php

include('login.css');

// Inclui o arquivo de configuração
include('./login/config.php');

// Inclui o arquivo de verificação de login
include('./login/verifica_login.php');

// Se não for permitido acesso nenhum ao arquivo
// Inclua o trecho abaixo, ele redireciona o usuário para 
// o formulário de login
include('./login/redirect.php');
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./login/login.css" type="text/css">
  <title>Login</title>
</head>
<body>
  
<span class="welcome">Olá</span>
<b class="firstname"><?php echo $_SESSION['firstname']?></b>
<span class="welcome">, seja bem vindo !</span>

<br/><br/>

<a href="./login/sair.php">
  <button>sair</button>
</a> 

</body>
</html>




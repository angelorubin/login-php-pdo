<?php
// Verifica se estamos conectados ao BD
if ( ! isset( $pdo_connection ) || ! is_object( $pdo_connection ) ) {
	exit('Erro na conexão com o banco de dados.');
}

// Une $_SESSION e $POST para verificação
if ( isset( $_POST ) && ! empty( $_POST ) ) {
	$dados_usuario = $_POST;
} else {
	$dados_usuario = $_SESSION;
}

// Verifica se os campos de usuário e senha existem
// E se não estão em branco
if ( 
    isset ( $dados_usuario['email'] ) && 
    isset ( $dados_usuario['password']   ) &&
  ! empty ( $dados_usuario['email'] ) &&
  ! empty ( $dados_usuario['password']   ) 
) {
	// Faz a consulta do email do usuário na base de dados
	$pdo_checa_user = $pdo_connection->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
	$verifica_pdo = $pdo_checa_user->execute( array( $dados_usuario['email'] ) );
	
	// Verifica se a consulta foi realizada com sucesso
	if ( ! $verifica_pdo ) {
		$erro = $pdo_checa_user->errorInfo();
		exit( $erro[2] );
	}
	
	// Busca os dados da linha encontrada
	$fetch_usuario = $pdo_checa_user->fetch();

	// Verifica se a senha do usuário está correta
	// Utilizando crypt do PHP para encryptação da senha (que já dever estar registrada encriptada no banco)
	if ( crypt( $dados_usuario['password'], $fetch_usuario['password'] ) === $fetch_usuario['password'] ) {
		// O usuário está logado
		$_SESSION['logado']       = true;
		$_SESSION['firstname'] = $fetch_usuario['firstname'];
		$_SESSION['email'] = $fetch_usuario['email'];
		$_SESSION['password']      = $fetch_usuario['password'];
		$_SESSION['id']      = $fetch_usuario['id'];
	} else {
		// Continua não logado
		$_SESSION['logado']     = false;
		
		// Preenche o erro para o usuário
		$_SESSION['login_erro'] = 'Email ou senha inválidos';
	}
}

?>
<?php
// Inicia a sessão
session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		
		<title>Login</title>
	</head>
	<body>
		<form action="index.php" method="post">
			<table>
				<tr>
					<td>Email</td>
				</tr>
				<tr>
					<td><input type="text" name="email" required></td>
				</tr>
				<tr>
					<td>Senha</td>
				</tr>
				<tr>
					<td><input type="password" name="password" required></td>
				</tr>
				
				<tr>
					<td><a href="#">Criar usuário</a></td>
				</tr>
				
				<?php if ( ! empty( $_SESSION['login_erro'] ) ) :?>
					<tr>
						<td style="color: red;"><?php echo $_SESSION['login_erro'];?></td>
						<?php $_SESSION['login_erro'] = ''; ?>
					</tr>
				<?php endif; ?>
				
				<tr>
					<td><input type="submit" value="Entrar"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
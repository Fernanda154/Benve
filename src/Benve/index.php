<!DOCTYPE html>
<html>
<head>
	<title>Benve</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container">
		<div class="ilustraIndex">
			<img src="imgs/ilustraindex.png">
		</div>
		<div class="portaLogin">
			<div class="boxLogin">
				<h1>Benve</h1>
				<form action="login.php" method="POST" onSubmit="return verificaCampo();">
					<input type="text" name="user" id="usuario" placeholder="Email" class="textUser">
					<input type="password" name="senha" id="senha" placeholder="Senha" class="pasSenha">
					<input type="submit" name="enviar" id="enviar" value="Entrar">
					<a href="interno/recuperacaoSenha.php">Esqueceu a senha?</a>
					<a href="interno/cadastrarUsuario.html" class="soPraFastar">Ainda não tem conta???</a>
				</form>
			</div>
		</div>
	</div>
</body>

</html>

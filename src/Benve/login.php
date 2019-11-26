<?php
	require_once('conexao/conexao.php');

	$usuario=$_POST['user'];
	$senha=$_POST['senha'];
	$consulta = "SELECT * FROM revendedor WHERE senha = '$senha' AND  email = '$usuario';";
	$conecta = mysqli_query($conexao, $consulta) or die(mysqli_error($conexao));
	$logado = mysqli_fetch_assoc($conecta);
  	$loginFoundUser = mysqli_num_rows($conecta);

  	if (!isset($_SESSION)) {
  		session_start();
	}
	$_SESSION['nomeRevendedor'] = $logado['nome'];
	$_SESSION['idRevendedor'] = $logado['idRevendedor'];
  	if ($logado != null) {
  		 header('Location:interno/painel.php');
  	}else{
  		header('Location:index.php');
  		echo "<p>Senha ou usuário incorrento</p>";
  	}
?>

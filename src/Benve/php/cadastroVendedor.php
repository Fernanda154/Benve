<?php 
	require_once('../conexao/conexao.php');
	$nome = $_POST['user'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$senha = $_POST['senha'];

	$insercaoDeRevendedor = "INSERT INTO revendedor (nome, email, telefone, senha) VALUES ('$nome', '$email', '$telefone', '$senha');";
	$conecta = mysqli_query($conexao, $insercaoDeRevendedor) or die(mysqli_error($conexao));
	header("Location: ../index.php");
?>
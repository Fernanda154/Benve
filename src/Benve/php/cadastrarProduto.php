<?php
if (!isset($_SESSION)) {
		session_start();
}
	$idRevendedor = $_SESSION['idRevendedor'];
	require_once('../conexao/conexao.php');

	$descricao = $_POST['descricao'];
	$preco = $_POST['preco'];
	$estoque = $_POST['estoque'];
	$dataValidade =  date('Y-m-d', strtotime($_POST["validade"]));
	$dataFabricacao = date('Y-m-d', strtotime($_POST["fabricacao"]));

	$insercaoDeProduto = "INSERT INTO `benve`.`produto`(`descricao`, `preco`, `estoque`, `dataValidade`,`dataFabricacao`, `chaveRevendedor`) VALUES ('$descricao', $preco, $estoque, '$dataValidade', '$dataFabricacao', $idRevendedor);";
	$conecta = mysqli_query($conexao, $insercaoDeProduto) or die(mysqli_error($conexao));
		header("Location: ../interno/painel.php");
?>

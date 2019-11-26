<?php
	if (!isset($_SESSION)) {
  		session_start();
	}
	$revendedor = $_SESSION['nomeRevendedor'];
	require_once('../conexao/conexao.php');
	$idUser = $_SESSION['idRevendedor'];
	//BUSCANDO O MAIS VENDIDO--------------------------------------------------------------------
	function maisVendido ($conexao, $idUser){
		$procuraTodos = "SELECT max(descricao) FROM produto INNER JOIN venda ON venda.idProduto = produto.idProduto where idRevendedor = $idUser;";
		$conecta = mysqli_query($conexao, $procuraTodos) or die(mysqli_error($conexao));
		$row_rsProdutos = mysqli_fetch_assoc($conecta);
		$maisVendido = $row_rsProdutos['max(descricao)'];
		return $maisVendido;
	}


	//BUSCANDO CLIENTE FIEL---------------------------------------------------------------------------
	function clienteFiel($conexao, $idUser){
		$procuraTodosCli = "SELECT max(nome) FROM cliente INNER JOIN venda ON venda.idCliente = cliente.idCliente where idRevendedor = $idUser;";
		$conecta = mysqli_query($conexao, $procuraTodosCli) or die(mysqli_error($conexao));
		$row_rsCliente = mysqli_fetch_assoc($conecta);
	  $total_client = mysqli_num_rows($conecta);
		$clienteFiel = $row_rsCliente['max(nome)'];
		return $clienteFiel;
	}


	//BUSCA DE PRODUTOS NÃO PAGOS----------------------------------------------------------------------
		$codRevendedor = $_SESSION['idRevendedor'];
		$procuraContas = "SELECT * FROM venda INNER JOIN cliente ON cliente.idCliente = venda.idCliente INNER JOIN produto ON produto.idProduto = venda.idProduto WHERE idRevendedor = $codRevendedor and pagou = false;";
		$dados = mysqli_query($conexao, $procuraContas) or die(mysqli_error($conexao));
		$row_rsVendas = mysqli_fetch_assoc($dados);
		$totalVendas = mysqli_num_rows($dados);
	$cont = 0;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel Benve</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/painel.css">
</head>
<body>
	<header>
		<nav>
			<h1 class="logo">Benve</h1>
			<div class="boxUser">
				<img src="../img/user.png" class="iconUser">
				<h1><?php echo $revendedor; ?></h1>
			</div>
		</nav>
	</header>
	<div class="conteudo">
		<div class="maisVendido">
			<h1>O mais vendido</h1>
			<p><?php echo utf8_encode(maisVendido($conexao, $idUser)); ?></p>
			<a href="registrarVenda.php">Registrar nova venda</a>
		</div>
		<div class="produtos">
			<h1>Produtos</h1><br>
			<a href="cadastrarProduto.html">Novo produto</a>
			<a href="listarProdutos.php">Listar produto</a>
		</div>
		<div class="clientes">
			<h1>Cliente fiel</h1>
			<p><?php echo utf8_encode(clienteFiel($conexao, $idUser)); ?></p>
			<a href="cadastrarCliente.html">Novo cliente</a>
			<a href="listarClientes.php">Listar clientes</a>
		</div>
		<div class="pedencias">
			<h1>Pendencias</h1>
				<?php
				while ($totalVendas != $cont) {
					//echo "<p>" . $row_rsVendas['descricao'] . "Cliente: ". $row_rsVendas['nome'] ."<button>Registrar pagamento</button></p>";
					echo utf8_encode("<div style='margin: 5px; border: solid 1px #FFF'>
									<p> Produto: ". $row_rsVendas['descricao'] . "</p>
									<p> Cliente: ". $row_rsVendas['nome'] ."</p>
									<button>Pagou</button>
									</div>");
					$cont = $cont + 1;
				}
				?>
		</div>
		<div class="metas">
			<h1>Meta</h1>
			<a href=""><p>Estabelecer meta </p></a>
			<div>
				<p>X vendas para alcance da meta</p>

			</div>
		</div>
	</div>


</body>
</html>

<?php
  if (!isset($_SESSION)) {
      session_start();
  }
  $revendedor = $_SESSION['nomeRevendedor'];
  require_once('../conexao/conexao.php');

  $idRevendedor = $_SESSION['idRevendedor'];

  $procuraClientes= "SELECT * FROM venda INNER JOIN cliente ON cliente.idCliente = venda.idCliente INNER JOIN produto ON produto.idProduto = venda.idProduto WHERE idRevendedor = 6;";
  $dadosCliente = mysqli_query($conexao, $procuraClientes) or die(mysqli_error($conexao));
  $row_rsClientes = mysqli_fetch_assoc($dadosCliente);
  $totalClientes = mysqli_num_rows($dadosCliente);

  $procuraProdutos = "SELECT * FROM produto WHERE chaveRevendedor = $idRevendedor;";
  $dados = mysqli_query($conexao, $procuraProdutos) or die(mysqli_error($conexao));
  $row_rsProdutos = mysqli_fetch_assoc($dados);
  $totalProdutos = mysqli_num_rows($dados);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Benve - Novo cliente</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/cadastrarUsuario.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container">
		<div class="ilustraIndex">
			<img src="imgs/ilustraindex.png">
		</div>
		<div class="portaLogin">
			<div class="boxLogin">
				<h1>Nova Venda</h1>
				<form action="../php/cadastrarProduto.php" method="POST" >
					<label for='selectProdutos'>Produto: </label>
          <br>
					<select class="selectProdutos" name="selctProdutos">
            <option value="">Selecione um produto</option>
            <?php
              while ($row_rsProdutos = mysqli_fetch_assoc($dados)) {
                  echo "<option value='".$row_rsProdutos['descricao']."'>".$row_rsProdutos['descricao']."</option>";
              }
            ?>
          </select>
          <br>
					<label for="selectCliente">Cliente</label>
          <select class="selectCliente" name="selctCliente" style="margin-top: 5%;">
            <option value="">Selecione um cliente</option>
            <?php
              while ($row_rsClientes = mysqli_fetch_assoc($dadosCliente)) {
                  echo "<option value='".$row_rsClientes['nome']."'>".$row_rsClientes['nome']."</option>";
              }
            ?>
          </select>
					<label for="fabri">Data de fabricação: </label>
					<input type="date" id="fabri" placeholder="DD/MM/AAAA" name="fabricacao">
					<input type="submit" name="Cadastrar">
				</form>
				<a href="painel.php">Voltar</a>
			</div>
		</div>
	</div>
</body>

</html>

<?php

  include('../conexao/conexao.php');

  if (!isset($_SESSION)) {
  		session_start();
  }
//  include('menu.php');
  $idRevendedor = $_SESSION['idRevendedor'];
  $revendedor = $_SESSION['nomeRevendedor'];
  //----------------- TRAZ TODOS OS PRODUTOS PRODUTOS CADASTRADOS -----------
  $procuraProdutos = "SELECT * FROM produto WHERE chaveRevendedor = $idRevendedor;";
  $dados = mysqli_query($conexao, $procuraProdutos) or die(mysqli_error($conexao));
  $row_rsProdutos = mysqli_fetch_assoc($dados);
  $totalProdutos = mysqli_num_rows($dados);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Benve - Produtos</title>
    <link rel="stylesheet" href="../css/painel.css">
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
    <table>
      <tr>
        <td>DESCRIÇÃO</td>
        <td>VALOR</td>
        <td>ESTOQUE</td>
        <td>VALIDADE</td>
      </tr>
    <?php
        while ($row_rsProdutos = mysqli_fetch_assoc($dados)) {
            echo utf8_encode("<tr>
                    <td>".$row_rsProdutos['descricao']."</td>
                    <td>".$row_rsProdutos['preco']."</td>
                    <td>".$row_rsProdutos['estoque']."</td>
                    <td>".$row_rsProdutos['dataValidade']."</td>
                  </tr>");
        }
    ?>
    </table>
  </body>
</html>

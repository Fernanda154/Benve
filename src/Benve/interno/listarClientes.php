<?php

  include('../conexao/conexao.php');
  if (!isset($_SESSION)) {
      session_start();
  }
//  include('menu.php');
  $idRevendedor = $_SESSION['idRevendedor'];
  $revendedor = $_SESSION['nomeRevendedor'];
  //----------------- TRAZ TODOS OS PRODUTOS PRODUTOS CADASTRADOS -----------
  $procuraClientes= "SELECT * FROM venda INNER JOIN cliente ON cliente.idCliente = venda.idCliente INNER JOIN produto ON produto.idProduto = venda.idProduto WHERE idRevendedor = $idRevendedor;";
  $dados = mysqli_query($conexao, $procuraClientes) or die(mysqli_error($conexao));
  $row_rsClientes = mysqli_fetch_assoc($dados);
  $totalClientes = mysqli_num_rows($dados);
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
        <td>NOME</td>
        <td>EMAIL</td>
        <td>TELEFONE</td>
      </tr>
    <?php
        $cont = 0;
        while ($row_rsClientes = mysqli_fetch_assoc($dados)) {
            echo utf8_encode("<tr>
                    <td>".$row_rsClientes['nome']."</td>
                    <td>".$row_rsClientes['email']."</td>
                    <td>".$row_rsClientes['telefone']."</td>
                  </tr>");
            $cont = $cont + 1;
        }
    ?>
    </table>
  </body>
</html>

<?php
	if (!isset($_SESSION)) {
  		session_start();
	}
	$revendedor = $_SESSION['nomeRevendedor'];
	echo "<p>$revendedor</p>";
?>
<link rel="stylesheet" href="../css/painel.css">
<nav>
	<h1>Benve</h1>
	<p>$revendedor</p>
</nav>

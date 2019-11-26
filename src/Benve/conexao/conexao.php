<?php
$host="127.0.0.1";
$port=3300;
$socket="";
$user="root";
$password="cabeloloco154";
$dbname="benve";

$conexao = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();

?>


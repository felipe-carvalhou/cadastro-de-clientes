<?php 
$host = "sql313.infinityfree.com";
$user = "if0_39560659";
$senha = "mohz0123";
$banco = "if0_39560659_clientes";

$conn = new mysqli($host, $user, $senha, $banco);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);

}
?>
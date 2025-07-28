<?php
session_start();
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login.php");
    exit;
}

include "conexao.php";


header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=clientes.xls");
header("Pragma: no-cache");
header("Expires: 0");


echo "Nome\tTelefone\tEmail\n";

$sql = "SELECT * FROM clientes ORDER BY id DESC";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "{$row['nome']}\t{$row['telefone']}\t{$row['email']}\n";
}
?>

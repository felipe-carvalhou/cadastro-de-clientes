<?php
session_start();
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login.php");
    exit;
}

include "conexao.php";


header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=clientes.doc");

echo "<html><meta charset='UTF-8'><body>";
echo "<h1>Clientes Cadastrados</h1>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Nome</th><th>Telefone</th><th>Email</th></tr>";

$sql = "SELECT * FROM clientes ORDER BY id DESC";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['nome']}</td>
        <td>{$row['telefone']}</td>
        <td>{$row['email']}</td>
    </tr>";
}
echo "</table>";
echo "</body></html>";
?>

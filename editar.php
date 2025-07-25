<?php
include "conexao.php";

$id = $_GET['id'];
$sql = "SELECT * FROM clientes WHERE id = $id";
$result = $conn->query($sql);
$cliente = $result->fetch_assoc();
?>

<form method="POST" action="atualizar.php">
    <input type="hidden" name="id" value="<?= $cliente['id'] ?>">
    <input type="text" name="nome" value="<?= $cliente['nome'] ?>" required><br>
    <input type="text" name="telefone" value="<?= $cliente['telefone'] ?>"><br>
    <input type="email" name="email" value="<?= $cliente['email'] ?>"><br>
    <button type="submit">Salvar Alterações</button>
</form>

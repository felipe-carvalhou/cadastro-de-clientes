<?php
include "conexao.php";

$id = $_GET['id'];
$sql = "SELECT * FROM clientes WHERE id = $id";
$result = $conn->query($sql);
$cliente = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="style.css"> <!-- Seu CSS externo -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <h1>Editar Cliente</h1>

    <form method="POST" action="atualizar.php">
        <input type="hidden" name="id" value="<?= $cliente['id'] ?>">

        <input type="text" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" placeholder="Nome" required>

        <input type="text" name="telefone" value="<?= htmlspecialchars($cliente['telefone']) ?>" placeholder="Telefone">

        <input type="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" placeholder="Email">

        <button type="submit"><i class="fas fa-save"></i> Salvar Alterações</button>
    </form>

</body>
</html>

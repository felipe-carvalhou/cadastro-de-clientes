<?php
session_start();
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login.php");
    exit;
}
include "conexao.php";
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro de clientes</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


</head>
<body>
    <a href="logout.php" class="logout">Sair</a>

    <h1> Cadastros de Clientes</h1>
        <form action="salvar.php" method="POST">
            <input type="text" name="nome" placeholder="Nome completo" required><br>
        <input type="text" name="telefone" placeholder="Telefone"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <button type="submit">Cadastrar</button>
    </form>
     <h2>Clientes cadastrados</h2>
    <ul>
    <?php
    $sql = "SELECT * FROM clientes ORDER BY id DESC";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
       echo "<li>
    <strong>Nome:</strong> {$row['nome']} - 
    <strong>Telefone:</strong> {$row['telefone']} - 
    <strong>Email:</strong> {$row['email']}
    <a href='editar.php?id={$row['id']}' class='btn editar'>✏️ Editar</a>
    <a href='deletar.php?id={$row['id']}' class='btn deletar' onclick='return confirm(\"Tem certeza que deseja deletar?\")'>🗑️ Deletar</a>
</li>";

        echo "<a class='btn editar' href='editar.php?id={$row['id']}' title='Editar'><i class='fas fa-edit'></i></a> ";
        echo "<a class='btn deletar' href='deletar.php?id={$row['id']}' title='Deletar' onclick='return confirm(\"Tem certeza que deseja deletar?\")'><i class='fas fa-trash-alt'></i></a>";

        echo "</li>";
    }
    ?>
</ul>

</body>
</html>
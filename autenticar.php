<?php
session_start();
include 'conexao.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $dados = $result->fetch_assoc();
    if (password_verify($senha, $dados['senha'])) {
        $_SESSION['logado'] = true;
        $_SESSION['usuario'] = $dados['usuario'];
        header("Location: index.php");
        exit;
    }
}

echo "Usuário ou senha inválidos!";
?>

<?php
session_start();
include "conexao.php";

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
  $user = $result->fetch_assoc();

  if (password_verify($senha, $user['senha'])) {
    $_SESSION['logado'] = true;
    $_SESSION['usuario'] = $user['usuario'];
    header("Location: painel.php");
  } else {
    echo "Senha incorreta.";
  }
} else {
  echo "Usuário não encontrado.";
}
?>

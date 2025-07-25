<?php
session_start();
if (!isset($_SESSION['logado'])) {
  header("Location: login.php");
  exit;
}
?>

<h2>Olá, <?= $_SESSION['usuario'] ?>! Seja bem-vindo.</h2>

<a href="logout.php">Sair</a>

<?php include "clientes.php"; ?>

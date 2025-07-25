<?php
include 'conexao.php';

$usuario = 'admin';
$senha = password_hash('123456', PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (usuario, senha) VALUES ('$usuario', '$senha')";
$conn->query($sql);

echo "Usuário criado com sucesso!";
?>

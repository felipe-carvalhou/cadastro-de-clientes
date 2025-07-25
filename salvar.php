<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "conexao.php"; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];

   
    $sql = "INSERT INTO clientes (nome, telefone, email) VALUES ('$nome', '$telefone', '$email')";

    if ($conn->query($sql) === TRUE) {
        
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }
} else {
    echo "Requisição inválida.";
}
?>

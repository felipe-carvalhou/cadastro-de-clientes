    <?php
    include "conexao.php";

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $sql = "UPDATE clientes SET nome='$nome', telefone='$telefone', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
    ?>

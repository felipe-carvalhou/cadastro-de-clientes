 <?php
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login.php");
    exit;
}
?>
 <!DOCTYPE html>
  <html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- intl-tel-input CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

    <!-- intl-tel-input JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  </head>
  <body>
    <a href="logout.php" class="logout">Sair</a>

    <h1>Cadastro de Clientes</h1>

    <form action="salvar.php" method="POST">
      <input type="text" name="nome" placeholder="Nome completo" required><br>

      <input type="email" name="email" placeholder="Email"><br>

      
      <label for="telefone"></label><br>
      <input type="tel" id="telefone" name="telefone" required><br>
  <button type="submit">Cadastrar</button>
  
    </form>

    <h2>Clientes cadastrados</h2>
    <div style="margin-bottom: 20px;">
  <a href="clientes_excel.php" class="btn" style="padding: 10px; background: green; color: white; text-decoration: none;">📊 Exportar para Excel</a>
  <a href="clientes_doc.php" class="btn" style="padding: 10px; background: blue; color: white; text-decoration: none;">📄 Exportar para Word</a>
</div>

    <ul>
      <?php
      include "conexao.php";
      $sql = "SELECT * FROM clientes ORDER BY id DESC";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()) {
          echo "<li>
          <strong>Nome:</strong> {$row['nome']} - 
          <strong>Telefone:</strong> {$row['telefone']} - 
          <strong>Email:</strong> {$row['email']}
          <a class='btn editar' href='editar.php?id={$row['id']}' title='Editar'><i class='fas fa-edit'></i></a>
          <a class='btn deletar' href='deletar.php?id={$row['id']}' title='Deletar' onclick='return confirm(\"Tem certeza que deseja deletar?\")'><i class='fas fa-trash-alt'></i></a>
          </li>";
      }
      ?>
    </ul>

    <!-- Inicialização do intl-tel-input -->
    <script>
      const input = document.querySelector("#telefone");
      window.intlTelInput(input, {
        initialCountry: "br",
        preferredCountries: ["br", "us", "pt"],
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
      });
    </script>
  </body>
  </html>

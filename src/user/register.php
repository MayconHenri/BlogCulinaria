<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Estabelece conexão com o banco de dados
    include ("../config/database.php");

    // Obtém os dados do formulário
    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Consulta SQL para verificar se o usuário já existe
    $query_check_user = "SELECT * FROM tb_login WHERE usuario = :username";

    // Consulta SQL para inserir um novo usuário
    $query_insert_user = "INSERT INTO tb_login (nome, usuario, senha) VALUES (:name, :username, :password)";

    try {
        // Verifica se o usuário já existe
        $stmt_check_user = $conexao->prepare($query_check_user);
        $stmt_check_user->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt_check_user->execute();
        $user_exists = $stmt_check_user->fetch(PDO::FETCH_ASSOC);

        if ($user_exists) {
            // Se o usuário já existir, exibe uma mensagem de erro
            echo '<div class="alert alert-danger">
                      <strong>Erro ao cadastrar!</strong> O usuário já existe.
                </div>';
        } else {
            // Se o usuário não existir, executa a consulta para inserir o novo usuário
            $stmt_insert_user = $conexao->prepare($query_insert_user);
            $stmt_insert_user->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt_insert_user->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt_insert_user->bindParam(':password', $password, PDO::PARAM_STR);

            if ($stmt_insert_user->execute()) {
                header("Location: login.php");  
                exit;
            } else {
                echo '<div class="alert alert-danger">
                          <strong>Erro ao cadastrar!</strong> Por favor, tente novamente.
                    </div>';
            }
        }
    } catch (PDOException $e) {
        // Se ocorrer uma exceção durante a execução da consulta, exibe uma mensagem de erro
        echo "Erro: " . $e->getMessage();
    }
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<meta name="viewport"
  content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../../public/css/estilo.css">

<!-- NAV BAR -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../../public/index.php" style="font-family: 'Kaushan Script', cursive;" id="nav-logo">Cozinha
      Prática</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <div class="nav-links">
          <div class="nav-link">
            <a class="nav-item active" aria-current="page" href="../../public/index.php" id="nav-txt">
              <span class="material-icons align-middle">home</span> HOME
            </a>
          </div>
          <div class="nav-link">
          <a class="nav-item active" aria-current="page" href="login.php" id="nav-txt">
              <span class="material-icons align-middle">
                arrow_back
              </span> VOLTAR
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/adm-estilo.css">
</head>

<body>

    <div class="register-container">
        <h1>Cadastro</h1>
        <form action="#" method="post">
            <input type="text" name="name" placeholder="Nome" required>
            <input type="text" name="username" placeholder="Usuário" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit">Cadastrar</button>
        </form>
    </div>

</body>

</html>
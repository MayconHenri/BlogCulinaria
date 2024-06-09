
<?php
session_start();
if (isset($_SESSION['usuariowva']) && isset($_SESSION['senhawva'])) {
    header("Location: ../index.php");
    exit;
}
include("../config/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM tb_login WHERE usuario = :username AND senha = :password";

    try {
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();

        if ($count == 1) {
            $_SESSION['usuariowva'] = $username;
            $_SESSION['senhawva'] = $password;
            header("Location: ../admin.php");
            exit;
        } else {
            echo '<div class="alert alert-danger">
                      <strong>Erro ao logar!</strong> Usuário ou senha incorretos.
                  </div>';
        }
    } catch (PDOException $e) {
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
    <a class="navbar-brand" href="../../index.php" style="font-family: 'Kaushan Script', cursive;" id="nav-logo">Cozinha
      Prática</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <div class="nav-links">
          <div class="nav-link">
            <a class="nav-item active" aria-current="page" href="../../index.php" id="nav-txt">
              <span class="material-icons align-middle">home</span> HOME
            </a>
          </div>
          <div class="nav-link">
          <a class="nav-item active" aria-current="page" href="../../index.php" id="nav-txt">
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
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PRACTICAL KITCHEN</title>
    <link rel="stylesheet" href="../../public/css/adm-estilo.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="username" placeholder="Usuário" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
        <div class="register-link">
            <a href="register.php">Cadastrar-se</a>
        </div>
    </div>
</body>

</html>

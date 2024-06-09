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
    <a class="navbar-brand" href="../admin.php" style="font-family: 'Kaushan Script', cursive;" id="nav-logo">Cozinha
      Prática</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <div class="nav-links">
          <div class="nav-link">
            <a class="nav-item active" aria-current="page" href="../admin.php" id="nav-txt">
              <span class="material-icons align-middle">home</span> HOME
            </a>
          </div>
          <div class="nav-link">
            <a class="nav-item active" aria-current="page" href="../admin.php" id="nav-txt">
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
<?php
include("../config/database.php");

// Verifica se foi passado um parâmetro "id" na URL
if(isset($_GET['id'])) {
  // Consulta SQL para obter os detalhes da postagem pelo ID
  $query = "SELECT * FROM tb_postagens WHERE id = :id";

  try {
    // Prepara a consulta
    $stmt = $conexao->prepare($query);
    // Bind do parâmetro
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    // Executa a consulta
    $stmt->execute();
    // Obtém os detalhes da postagem
    $postagem = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se a postagem existe
    if($postagem) {
      // Preenche os campos do formulário com os detalhes da postagem
      $titulo = $postagem['titulo'];
      $imagem = $postagem['imagem'];
      $descricao = $postagem['descricao'];
      $ingredientes = $postagem['ingredientes'];
      $modo_preparo = $postagem['modo_preparo'];
      $autor = $postagem['autor'];
    } else {
      // Se a postagem não existir, exibe uma mensagem de erro
      echo '<div class="alert alert-danger">Postagem não encontrada!</div>';
      exit; // Encerra o script
    }
  } catch (PDOException $e) {
    // Se ocorrer uma exceção durante a execução da consulta, exibe uma mensagem de erro
    echo "Erro: " . $e->getMessage();
  }
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtém os dados do formulário
  $id = $_POST['id'];
  $titulo = $_POST['Título'];
  $imagem = $_POST['imagem'];
  $descricao = $_POST['Descrição'];
  $ingredientes = $_POST['Ingredientes'];
  $modo_preparo = $_POST['Modo_de_Preparo'];
  $autor = $_POST['Autor'];

  // Consulta SQL para atualizar os dados na tabela de postagens
  $query = "UPDATE tb_postagens SET titulo = :titulo, imagem = :imagem, descricao = :descricao, ingredientes = :ingredientes, modo_preparo = :modo_preparo, autor = :autor WHERE id = :id";

  try {
    // Prepara a consulta
    $stmt = $conexao->prepare($query);

    // Bind dos parâmetros
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
    $stmt->bindParam(':imagem', $imagem, PDO::PARAM_STR);
    $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
    $stmt->bindParam(':ingredientes', $ingredientes, PDO::PARAM_STR);
    $stmt->bindParam(':modo_preparo', $modo_preparo, PDO::PARAM_STR);
    $stmt->bindParam(':autor', $autor, PDO::PARAM_STR);

    if ($stmt->execute()) {
      // Se a atualização for bem-sucedida, exibe uma mensagem de sucesso e redireciona para a página de edição
      echo '<div class="alert alert-success">Postagem atualizada com sucesso!</div>';
      header("refresh:2; url=../admin.php"); // Redireciona para a página de edição após 2 segundos
      exit;
    } else {
      // Se ocorrer um erro na execução da consulta, exibe uma mensagem de erro
      echo '<div class="alert alert-danger">Erro ao atualizar a postagem!</div>';
    }
  } catch (PDOException $e) {
    // Se ocorrer uma exceção durante a execução da consulta, exibe uma mensagem de erro
    echo "Erro: " . $e->getMessage();
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Postagem</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../public/css/adm-estilo.css">
  <style>
  .same-size-input {
    height: 90px; 
    width: 100%;
    margin-bottom: 20px;
  }
  .same-size-inputt {
    height: 130px; 
    width: 100%;
    margin-bottom: 20px;
  }
</style>

</head>

<body>
  <div class="register-container">
    <h1>Editar Postagem</h1>
    <form action="#" method="post">
      <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
      <input type="text" name="Título" placeholder="Título" value="<?php echo $titulo; ?>" required>
      <input type="text" name="imagem" placeholder="Imagem" value="<?php echo $imagem; ?>" required>
      <textarea name="Descrição" placeholder="Descrição" class="same-size-inputt" "required><?php echo $descricao; ?></textarea>
      <textarea name="Ingredientes" placeholder="Ingredientes" class="same-size-input" "required><?php echo $ingredientes; ?></textarea>
      <textarea name="Modo_de_Preparo" placeholder="Modo de Preparo" class="same-size-input" "required><?php echo $modo_preparo; ?></textarea>
      <input type="text" name="Autor" placeholder="Autor" value="<?php echo $autor; ?>" required>
      <button type="submit">Atualizar</button>
    </form>
  </div>
</body>

</html>

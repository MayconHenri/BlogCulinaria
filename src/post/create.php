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
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Estabelece conexão com o banco de dados
  include ("../config/database.php");

  // Obtém os dados do formulário
  $titulo = $_POST['Título'];
  $imagem = $_POST['imagem'];
  $descricao = $_POST['Descrição'];
  $ingredientes = $_POST['Ingredientes'];
  $modo_preparo = $_POST['Modo_de_Preparo'];
  $autor = $_POST['Autor'];
  
  // Mapeamento dos valores numéricos para as opções de refeição
  $categoria = 0; // Valor padrão
  if (isset($_POST['Refeição'])) {
    switch ($_POST['Refeição']) {
      case 'Café da Manhã':
        $categoria = 1;
        break;
      case 'Almoço':
        $categoria = 2;
        break;
      case 'Sobremesa':
        $categoria = 3;
        break;
      case 'Janta':
        $categoria = 4;
        break;
    }
  }

  // Consulta SQL para inserir os dados na tabela de receitas
  $query = "INSERT INTO tb_postagens (titulo, imagem, descricao, ingredientes, modo_preparo, autor, categoria) VALUES (:titulo, :imagem, :descricao, :ingredientes, :modo_preparo, :autor, :categoria)";

  try {
    // Prepara a consulta
    $stmt = $conexao->prepare($query);

    // Bind dos parâmetros
    $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
    $stmt->bindParam(':imagem', $imagem, PDO::PARAM_STR);
    $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
    $stmt->bindParam(':ingredientes', $ingredientes, PDO::PARAM_STR);
    $stmt->bindParam(':modo_preparo', $modo_preparo, PDO::PARAM_STR);
    $stmt->bindParam(':autor', $autor, PDO::PARAM_STR);
    $stmt->bindParam(':categoria', $categoria, PDO::PARAM_INT); // Bind da opção de refeição como valor inteiro

    if ($stmt->execute()) {
      // Se a inserção for bem-sucedida, exibe uma mensagem de sucesso e redireciona para create.php após alguns segundos
      echo '<div class="alert alert-success">Receita criada com sucesso!</div>';
      header("refresh:2; url=../admin.php"); // Redireciona para create.php após 5 segundos
      exit;
    } else {
      // Se ocorrer um erro na execução da consulta, exibe uma mensagem de erro
      echo '<div class="alert alert-danger">
                    <strong>Erro ao cadastrar!</strong> Por favor, tente novamente.
                </div>';
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
  <title>Cadastro</title>
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
    .category{
      gap: 5px;
      margin-left: 23px;
    }
  </style>
</head>

<body>
  <div class="register-container">
    <h1>Nova receita</h1>
    <form action="#" method="post">
      <input type="text" name="Título" placeholder="Título" required>
      <input type="text" name="imagem" placeholder="Imagem" required>
      <textarea name="Descrição" placeholder="Descrição" class="same-size-inputt" required></textarea>
      <textarea name="Ingredientes" placeholder="Ingredientes" class="same-size-input" required></textarea>
      <textarea name="Modo_de_Preparo" placeholder="Modo de Preparo" class="same-size-input" required></textarea>
      <div class="category">
        <label for="cafe_da_manha">Café</label>
        <input type="radio" id="cafe_da_manha" name="Refeição" value="Café da Manhã">

        <label for="almoco">Almoço</label>
        <input type="radio" id="almoco" name="Refeição" value="Almoço">

        <label for="sobremesa">Sobremesa</label>
        <input type="radio" id="sobremesa" name="Refeição" value="Sobremesa">

        <label for="janta">Jantar</label>
        <input type="radio" id="janta" name="Refeição" value="Janta">
      </div>
      <input type="text" name="Autor" placeholder="Autor" required> 
      
      <button type="submit">Cadastrar</button>
    </form>
  </div>
</body>

</html>


<?php include ("../../public/pages/footer.php"); ?>
<?php
require_once ("config/database.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "SELECT * FROM tb_postagens WHERE id = :id";

  try {
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $receita = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$receita) {
      header("Location: error.php");
      exit;
    }
  } catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
  }
} else {
  header("Location: error.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalhes da Receita</title>
  <link rel="stylesheet" href="../public/css/estilo.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="post/not-delet.js"></script>
  <style>
    .recipe-content {
      border: 1px solid orange;
      border-radius: 5px;
      padding: 15px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      text-align: center;
      height: 600px;
    }

    #recipe-image {
      max-width: 500px;
      height: auto;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <main>
    <nav>
      <?php include ("pages-adm/navbar-adm.php"); ?>
    </nav>
    <div class="container mt-2 recipe-details">
      <div class="row">
        <div class="col-md-6">
          <img src="../public/images/cards/<?php echo $receita['imagem']; ?>" class="img-fluid"
            alt="<?php echo $receita['titulo']; ?>" id="recipe-image">
        </div>
        <div class="col-md-6">
          <div class="recipe-content">
            <h1><?php echo $receita['titulo']; ?></h1>
            <p><?php echo $receita['descricao']; ?></p>
            <h2 class="ingredientes">Ingredientes</h2>
            <?php echo $receita['ingredientes']; ?>
            <h2>Modo de Preparo</h2>
            <?php echo $receita['modo_preparo']; ?>
            <div style="display: flex; justify-content: center">
              <div style="margin-top: 30px;">
                <a href="post/edit.php?id=<?php echo $id; ?>"><button id="btn">
                    <span class="material-icons align-middle">edit</span> Editar
                  </button></a>
              </div>
              <div style="margin-top: 30px;">
                <a href="#" onclick="confirmarExclusao(<?php echo $id; ?>)"><button id="btn">
                    <span class="material-icons align-middle">delete</span> Excluir
                  </button></a>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer>
    <?php include ("../public/pages/footer.php"); ?>
  </footer>
</body>

</html>
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
// Verifica se o ID da postagem foi enviado via GET
if (isset($_GET['id'])) {
    // Obtém o ID da postagem a ser excluída
    $id = $_GET['id'];

    // Inclui o arquivo de configuração do banco de dados
    require_once("../config/database.php");

    // Consulta SQL para excluir a postagem com o ID fornecido
    $query = "DELETE FROM tb_postagens WHERE id = :id";

    try {
        // Prepara a consulta
        $stmt = $conexao->prepare($query);

        // Bind do parâmetro
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Executa a consulta
        if ($stmt->execute()) {
            // Se a exclusão for bem-sucedida, redireciona para uma página de sucesso
            echo '<div class="alert alert-success">Postagem excluida com sucesso!</div>';
            header("refresh:2; url=../admin.php");
            exit;
        } else {
          
            // Se ocorrer um erro na execução da consulta, exibe uma mensagem de erro
            echo "Erro ao excluir a postagem.";
        }
    } catch (PDOException $e) {
        // Se ocorrer uma exceção durante a execução da consulta, exibe uma mensagem de erro
        echo "Erro: " . $e->getMessage();
    }
} else {
    // Se o ID da postagem não foi fornecido, exibe uma mensagem de erro
    echo "ID da postagem não fornecido.";
}
?>

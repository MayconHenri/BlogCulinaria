<div class="main-posts" id="posts">
    <div class="card-group">
        <?php
        // Verifica se o parâmetro 'category' está presente na URL
        $category = isset($_GET['category']) ? $_GET['category'] : null;

        // Define a consulta SQL com ou sem filtro de categoria
        if ($category != NULL) {
            $sql = "SELECT * FROM tb_postagens WHERE categoria = :categoria";
        } else {
            $sql = "SELECT * FROM tb_postagens";
        }

        try {
            $result = $conexao->prepare($sql);
            if ($category) {
                $result->bindParam(':categoria', $category, PDO::PARAM_INT);
            }

            $result->execute();
            $totalRegistros = $result->rowCount();
            $counter = 0; // Inicializa o contador
            
            if ($totalRegistros > 0) {
                while ($exibe = $result->fetch(PDO::FETCH_OBJ)) {
                    // Verifica se o contador é par
                    if ($counter % 2 == 0) {
                        // Se for par, abre uma nova linha
                        echo '<div class="row">';
                    }
        ?>
        <div class="col-md-6"> <!-- Dividindo em 2 colunas para ter no máximo 2 cards por linha -->
            <div class="card">
                <a href="public/pages/recipe.php?id=<?php echo $exibe->id; ?>">
                    <img src="public/images/cards/<?php echo $exibe->imagem; ?>" class="card-img-top" alt="<?php echo $exibe->titulo; ?>" title="<?php echo $exibe->titulo; ?>">
                </a>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $exibe->titulo; ?></h5>
                    <p class="card-text"><?php echo $exibe->descricao; ?></p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Autor: <?php echo $exibe->autor; ?></small>
                </div>
            </div>
        </div>
        <?php
                    // Verifica se o contador é ímpar ou se é a última iteração
                    if ($counter % 2 != 0 || $counter == $totalRegistros - 1) {
                        // Se for ímpar ou se for a última iteração, fecha a linha
                        echo '</div>';
                    }
                    // Incrementa o contador
                    $counter++;
                }
            } else {
                echo '<h1>Error</h1>';
            }
        } catch(PDOException $erro) {
            echo $erro;
        }
        ?>
    </div>
</div>

<?php
require_once ("src/config/database.php");
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="public/css/estilo.css">
  <title>PRACTICAL KITCHEN</title>
</head>
<main>
  <nav>
    <?php include ("public/pages/navbar.php"); ?>
  </nav>

  <body>
    <?php include ("public/pages/body.php"); ?>
    <?php include ("public/pages/posts.php"); ?>
  </body>
  <footer>
    <?php include ("public/pages/footer.php"); ?>
  </footer>
</main>

</html>
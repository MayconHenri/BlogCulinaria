<?php
session_start();
if (!isset($_SESSION['usuariowva']) || !isset($_SESSION['senhawva'])) {
    header("Location: ./user/login.php");
    exit;
}
include("config/database.php");
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="../public/css/estilo.css">
  <title>PRACTICAL KITCHEN</title>
</head>
<main>
  <nav>
    <?php include ("pages-adm/navbar-adm.php"); ?>
  </nav>

  <body>
    <?php include ("pages-adm/body-adm.php"); ?>
    <?php include ("pages-adm/posts-adm.php"); ?>
  </body>
  <footer>
    <?php include ("../public/pages/footer.php"); ?>
  </footer>
</main>

</html>
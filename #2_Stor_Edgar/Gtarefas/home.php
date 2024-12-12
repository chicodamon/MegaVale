<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Cover Template · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="bootstrap.min.css" rel="stylesheet">

    <link href="cover.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-bg-dark">

    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column ">



<?php
  //* efetuar carregamento dp header.inc.php
    include_once("header.inc.php");

  //* incluimos o ficheiro com as funçoes
  include_once("functions.php");
?>

  <main class="position-absolute top-50 start-50 translate-middle">
    <h1>Olá, <?=$_SESSION["username"]?></h1>
    <p class="lead">Hoje é <?php echo hoje() ?></p>
    <p class="lead">
      <a href="#" class="btn btn-lg btn-light fw-bold border-white bg-white">Learn more</a>
    </p>
  </main>
  <?php
  //* Carregar o footer.inc.php
    include_once("footer.inc.php");
?>
</div>
<script src="bootstrap.bundle.min.js"></script>




</body>
</html>

  

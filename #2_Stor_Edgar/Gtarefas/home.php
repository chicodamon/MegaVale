<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>G-Tarefas</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="bootstrap.min.css" rel="stylesheet">

    <link href="cover.css" rel="stylesheet">
  </head>
  <body class="d-flex text-center h-100 text-bg-dark">

    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column ">


<?php

/* --------------------------------- header --------------------------------- */

  //* efetuar carregamento dp header.inc.php
    include_once("header.inc.php");

/* --------------------------------- funções -------------------------------- */ 

  //* incluimos o ficheiro com as funçoes
  include_once("functions.php");
  include_once("check_session.php");
  /* ---------------------------------- html ---------------------------------- */
?>


  <main class="position-absolute top-50 start-50 translate-middle">
    <h1>Olá, <?php if(isset($_SESSION["username"])) { echo $_SESSION["username"]; }  ?></h1>                    <!-- se a see -->
    <p class="lead">Hoje é <?php echo hoje() ?></p>
    <p class="lead">
      <a href="#" class="btn btn-lg btn-light fw-bold border-white bg-white">Learn more</a>
    </p>
  </main>
  
  
  <?php
  /* --------------------------------- footer --------------------------------- */ 


  //* Carregar o footer.inc.php
    include_once("footer.inc.php");
?>
</div>
<script src="bootstrap.bundle.min.js"></script>




</body>
</html>

  

<?php
//* incluimos o check_session.php
include_once("check_session.php");
/* ----------------------- header incrementado no php ----------------------- */
?>

<!doctype html>
<html lang="pt" class="h-100" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>G-Tarefas</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="cover.css" rel="stylesheet">
</head>

<main>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="home.php"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <span class="fs-4 text-light">G_Tarefas</span>
            </a>
            <ul class="nav nav-pills ">
                <li class="nav-item"><a href="home.php" class="nav-link text-light" aria-current="page">Home</a></li>
                <li class="nav-item dropdown">
                    <button class="btn text-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Tarefas
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="tarefa.php">Lista</a></li>
                        <li><a class="dropdown-item" href="#">Nova</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="logout.php" class="nav-link Secundary text-light">Terminar Sessão </a>
                </li>
            </ul>
        </header>
    </div>
</main>
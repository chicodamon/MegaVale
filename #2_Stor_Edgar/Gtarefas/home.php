<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

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

<body class="d-flex flex-column min-vh-100 text-bg-dark flex-grow-1">

    <div class="container d-flex flex-column flex-grow-1 cover-container w-100 p-3 mx-auto">

        <?php
        /* --------------------------------- header --------------------------------- */
        include_once("header.inc.php");
        include_once("functions.php");
        include_once("check_session.php");
        ?>


        <main class="flex-grow-1 d-flex justify-content-center align-items-center text-center">
            <div>
                <h1>Olá, <?php if (isset($_SESSION["username"])) {
                  echo $_SESSION["username"];
                } ?></h1>
                <p class="lead">Hoje é <?php echo hoje(); ?></p>
                <p class="lead">
                    <a href="tarefa.php?id=1" class="btn btn-lg btn-light fw-bold border-white bg-white">Ver Tarefas</a>
                </p>
            </div>
        </main>


        <?php
        /* --------------------------------- footer --------------------------------- */
        include_once("footer.inc.php");
        ?>
    </div>

    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>
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

</head>

<body class="d-flex text-center h-100 text-bg-dark">


    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">


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


        <main class="container">
            <!-- Tarefa -->
            <div class="row mb-3">
                <div class="col-12 col-md-8 mx-auto">
                    <label for="tarefaInput" class="form-label">Tarefa</label>
                    <div class="input-group">
                        <span class="input-group-text" id="tarefa">Tarefa</span>
                        <input id="tarefaInput" placeholder="Designação da Tarefa" type="text" class="form-control"
                            aria-label="Sizing example input" aria-describedby="tarefaLabel">
                    </div>
                </div>
            </div>
            <!-- Descrição -->
            <div class="row mb-3">
                <div class="col-12 col-md-8 mx-auto">
                    <label for="descricaoTarefa" class="form-label">Descrição</label>
                    <div class="input-group">
                        <span class="input-group-text" id="DescricaoTarefa">Descrição</span>
                        <input id="DescricaoTarefa" placeholder="Descrição da Tarefa" type="text" class="form-control"
                            aria-label="Sizing example input" aria-describedby="descricaoTarefa">
                    </div>
                </div>
            </div>
            <!-- Prazo -->
            <div class="row mb-3">
                <div class="col-12 col-md-8 mx-auto">
                    <label for="prazoTarefa" class="form-label">Prazo</label>
                    <div class="input-group">
                        <span class="input-group-text" placeholder="dd/mm/yyyy" id="prazoTarefa">Prazo</span>
                        <input id="prazoTarefa" type="date" class="form-control">
                    </div>
                </div>
            </div>
            <!-- Propriedade -->
            <div class="row mb-3">
                <div class="col-12 col-md-8 mx-auto">
                    <label for="prioridadeTarefa" class="form-label">Prioridade</label>
                    <select name="prioridadeTarefa" id="prioridadeTarefa" class="form-select">
                        <option value="">Selecione a prioridade</option>
                        <option value="1">Alta</option>
                        <option value="2">Média</option>
                        <option value="3">Baixa</option>
                    </select>
                </div>
            </div>
            <!-- Concluida -->
            <div class="row mb-3">
                <div class="col-12 col-md-8 mx-auto">
                    <label for="prioridadeTarefa" class="form-label">Prioridade</label>
                    <select name="ConcluidaTarefa" id="ConcluidaTarefa" class="form-select">
                        <option value="">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
            </div>
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
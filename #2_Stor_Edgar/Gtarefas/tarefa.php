<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <title>G-Tarefas</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100 text-center h-100 text-bg-dark">

    <!-- Container principal -->
    <div class="cover-container d-flex w-100 p-3 mx-auto flex-column flex-grow-1">

        <?php
        /* --------------------------------- Header --------------------------------- */
        include_once("header.inc.php");

        /* --------------------------------- Funções -------------------------------- */
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
                include_once("db.php");

                $idTarefa = $_GET["id"];
                $query = "SELECT * FROM tarefas WHERE idTarefa=$idTarefa";
                $resultado = mysqli_query($conexao, $query);
                $registros = mysqli_num_rows($resultado);
                $tarefa = mysqli_fetch_row($resultado);

                $designacaoTarefa = $tarefa[1];
                $descricaoTarefa = $tarefa[2];
                $prazoTarefa = $tarefa[3];
                $prioridadeTarefa = $tarefa[4];
                $concluidaTarefa = $tarefa[5];
            } else {
                $idTarefa = "";
                $designacaoTarefa = "";
                $descricaoTarefa = "";
                $prazoTarefa = "";
                $prioridadeTarefa = "";
                $concluidaTarefa = "";
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include_once("db.php");

            $designacaoTarefa = (!empty($_POST["designacaoTarefa"])) ? $_POST["designacaoTarefa"] : "";
            $idTarefa = (!empty($_POST["idTarefa"])) ? $_POST["idTarefa"] : "";
            $descricaoTarefa = (!empty($_POST["descricaoTarefa"])) ? $_POST["descricaoTarefa"] : "";
            $prazoTarefa = (!empty($_POST["prazoTarefa"])) ? $_POST["prazoTarefa"] : "";
            $prioridadeTarefa = (!empty($_POST["prioridadeTarefa"])) ? $_POST["prioridadeTarefa"] : "";
            $concluidaTarefa = (!empty($_POST["concluidaTarefa"])) ? $_POST["concluidaTarefa"] : 0;

            if (empty($idTarefa)) {
                $query = "INSERT INTO tarefas (tarefas, descricao, prazo, prioridade, concluida) VALUES ('$designacaoTarefa', '$descricaoTarefa', '$prazoTarefa', '$prioridadeTarefa', '$concluidaTarefa')";
                $resultado = mysqli_query($conexao, $query);

                if ($resultado) {
                    header("location: tarefas.php?msg=1");
                }
            }
        }

        include_once("functions.php");
        include_once("check_session.php");
        ?>

        <!-- Conteúdo Principal -->
        <main class="container flex-grow-1" >
            <form action="tarefa.php" method="POST">
                <!-- Tarefa -->
                <div class="row mb-3">
                    <div class="col-12 col-md-8 mx-auto">
                        <label for="tarefaInput" class="form-label">Tarefa</label>
                        <div class="input-group">
                            <span class="input-group-text">Tarefa</span>
                            <input value="<?= $designacaoTarefa ?>" name="designacaoTarefa" id="tarefaInput"
                                placeholder="Designação da Tarefa" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Descrição -->
                <div class="row mb-3">
                    <div class="col-12 col-md-8 mx-auto">
                        <label for="descricaoTarefa" class="form-label">Descrição</label>
                        <div class="input-group">
                            <span class="input-group-text">Descrição</span>
                            <input value="<?= $descricaoTarefa ?>" name="descricaoTarefa" id="descricaoTarefa"
                                placeholder="Descrição da Tarefa" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Prazo -->
                <div class="row mb-3">
                    <div class="col-12 col-md-8 mx-auto">
                        <label for="prazoTarefa" class="form-label">Prazo</label>
                        <div class="input-group">
                            <span class="input-group-text">Prazo</span>
                            <input value="<?= $prazoTarefa ?>" name="prazoTarefa" id="prazoTarefa" type="date"
                                class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Prioridade -->
                <div class="row mb-3">
                    <div class="col-12 col-md-8 mx-auto">
                        <label for="prioridadeTarefa" class="form-label">Prioridade</label>
                        <select name="prioridadeTarefa" id="prioridadeTarefa" class="form-select">
                            <option value="">Selecione a prioridade</option>
                            <option value="1" <?php if ($prioridadeTarefa == "1") echo "Selected" ?>>Alta</option>
                            <option value="2" <?php if ($prioridadeTarefa == "2") echo "Selected" ?>>Média</option>
                            <option value="3" <?php if ($prioridadeTarefa == "3") echo "Selected" ?>>Baixa</option>
                        </select>
                    </div>
                </div>
                <!-- Concluída -->
                <div class="row mb-3">
                    <div class="col-12 col-md-8 mx-auto">
                        <label for="concluidaTarefa" class="form-label">Concluída</label>
                        <select name="concluidaTarefa" id="concluidaTarefa" class="form-select">
                            <option value="0" <?php if ($concluidaTarefa == "0") echo "Selected" ?>>Não</option>
                            <option value="1" <?php if ($concluidaTarefa == "1") echo "Selected" ?>>Sim</option>
                        </select>
                    </div>
                </div>
                <!-- Botões -->
                <div class="col">
                    <input type="hidden" name="idTarefa" value="<?= $idTarefa ?>">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="tarefas.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </main>

        <!-- Footer -->
        <?php include_once("footer.inc.php"); ?>

    </div>

    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>
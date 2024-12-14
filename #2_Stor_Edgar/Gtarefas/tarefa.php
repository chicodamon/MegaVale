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

    <div class="cover-container d-flex w-100 p-3 mx-auto flex-column flex-grow-1">

        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        

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
                $prazoTarefa = $tarefa[4];
                $prioridadeTarefa = $tarefa[5];
                $concluidaTarefa = $tarefa[6];
            } else {
                $idTarefa = "";
                $designacaoTarefa = "";
                $descricaoTarefa = "";
                $prazoTarefa = "";
                $prioridadeTarefa = "";
                $concluidaTarefa = "";
            }
        }

        //*Vereficar se existe um POST

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include_once("db.php");

            //*Verificar se os campos estao preenchidos
            if(!empty($_POST["designacaoTarefa"])) {
                $designacaoTarefa = $_POST["designacaoTarefa"];
            } else {
                $designacaoTarefa = "";
            }
            
            // de outra forma com if ternario
            $idTarefa = (!empty($_POST["idTarefa"])) ? $_POST["idTarefa"] : "";
            $descricaoTarefa = (!empty($_POST["descricaoTarefa"])) ? $_POST["descricaoTarefa"] : "";
            $prazoTarefa = (!empty($_POST["prazoTarefa"])) ? $_POST["prazoTarefa"] : "";
            $prioridadeTarefa = (!empty($_POST["prioridadeTarefa"])) ? $_POST["prioridadeTarefa"] : "";
            $concluidaTarefa = (!empty($_POST["concluidaTarefa"])) ? $_POST["concluidaTarefa"] : 0;

            //*inserir uma nova tarefa ou editar uma existente
            //*se tiver um ID estamos a editar, caso contrario estamos a adicionar uma nova

            if (empty($idTarefa)) {
                $query = "INSERT INTO `tarefas`(`tarefa`, `descricao`, `prazo`, `prioridade`, `concluida`) VALUES ('$designacaoTarefa','$descricaoTarefa','$prazoTarefa','$prioridadeTarefa','$concluidaTarefa')";
                //*executamos a consulta
                $resultado = mysqli_query($conexao, $query);
                if(!$resultado){
                    die("Eroo ao executar a query: " . mysqli_error($conexao));
                }
                //* se o resultado der um true emcaminhamos para a pagina tarefas com msg=1
                if ($resultado) {
                    header("location: tarefas.php?msg=1");
                }
            } else{
                //* query para editar uma tarefa existente
                $query = "update tarefas set tarefa='$designacaoTarefa', descricao='$descricaoTarefa', prazo='$prazoTarefa', prioridade='$prioridadeTarefa', concluida='$concluidaTarefa' where idTarefa = $idTarefa";
                //*executamos a consulta
                $resultado = mysqli_query($conexao, $query);
                //*se o resultado retomar verdadeiro/true encaminhamos para tarefas.php com msg=2
                if(!$resultado){
                    header("location: tarefas.php?msg=2");
                }
            }
        }

        include_once("functions.php");
        include_once("check_session.php");
        ?>

        <!-- Conteúdo Principal -->
        <main class="container flex-grow-1">
            <form action="tarefa.php" method="POST">
                <!-- Tarefa -->
                <div class="row mb-3">
                    <div class="col-12 col-md-8 mx-auto">
                        <label for="tarefaInput" class="form-label">Tarefa</label>
                        <div class="input-group">
                            <span class="input-group-text">Tarefa</span>
                            <input value="<?= $designacaoTarefa ?>" name="designacaoTarefa" id="tarefaInput"
                                placeholder="Designação da Tarefa" type="text" class="form-control shadow-none">
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
                                placeholder="Descrição da Tarefa" type="text" class="form-control shadow-none">
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
                                class="form-control shadow-none">
                        </div>
                    </div>
                </div>
                <!-- Prioridade -->
                <div class="row mb-3">
                    <div class="col-12 col-md-8 mx-auto">
                        <label for="prioridadeTarefa" class="form-label">Prioridade</label>
                        <select name="prioridadeTarefa" id="prioridadeTarefa" class="form-select shadow-none">
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
                        <select name="concluidaTarefa" id="concluidaTarefa" class="form-select shadow-none">
                            <option value="0" <?php if ($concluidaTarefa == "0") echo "Selected" ?>>Não</option>
                            <option value="1" <?php if ($concluidaTarefa == "1") echo "Selected" ?>>Sim</option>
                        </select>
                    </div>
                </div>
                <!-- Botões -->
                <div class="col">
                    <input type="hidden" name="idTarefa" value="<?= $idTarefa ?>">
                    <button type="submit" name="enviar" class="btn btn-success">Guardar</button>
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
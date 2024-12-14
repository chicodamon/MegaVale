<?php
//* Iniciar uma sessão
session_start();

/* ---------------------- verificaçao do login efetuado --------------------- */
//* verifica se o utilizador está com o login efetuado, se sim encaminhar para o home.php
if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
  header("location: home.php");
  exit;
}

//* Carregar ficheiro db.php responsável pelo acesso à db
include_once("db.php");

//* Verificar se há um POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //* Verificar os campos username e password
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        //* Redirecionar para a página index.php com o código de erro = 1
        header("location: index.php?erro=1");
        exit;
    } else {
        //* Definir as variáveis
        $username = mysqli_real_escape_string($conexao, $_POST["username"]);
        $password = $_POST["password"];

        //* Consulta à BD
        $query = "SELECT * FROM utilizadores WHERE username='$username'";

        //* Executar a consulta
        $resultado = mysqli_query($conexao, $query);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $utilizador = mysqli_fetch_assoc($resultado);
            $idUtilizador = $utilizador['id'];
            $usernameUtilizador = $utilizador['username'];
            $passwordUtilizador = $utilizador['password'];

            //* Verificar a password
            if (password_verify($password, $passwordUtilizador)) {
                //* Se a password estiver correta, iniciar uma sessão
                $_SESSION["login"] = true;
                $_SESSION["id"] = $idUtilizador;
                $_SESSION["username"] = $usernameUtilizador;

                //* Redirecionar para a página home.php
                header("location: home.php");
                exit;
            } else {
                //* No caso de password inválida, redirecionar para o index.php com erro 2
                header("location: index.php?erro=2");
                exit;
            }
        } else {
            //* Se o utilizador não for encontrado, redirecionar com erro 2
            header("location: index.php?erro=2");
            exit;
        }

        //* Fechar a ligação ao MySQL
        mysqli_close($conexao);
    }
}
?>

<!doctype html>
<html lang="pt" data-bs-theme="auto">

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LogIn G-Tarefas</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="sign-in.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4 bg-dark">
    <main class="form-signin w-100 m-auto">
        <form action="" method="POST">
            <h1 class="h3 mb-3 fw-normal text-bg-dark">Bem-Vindo à área reservada</h1>
            <p class="text-bg-dark" >Introduza os seus dados de login</p>
            <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control shadow-none " id="floatingInput" placeholder="exemplo123"
                    required>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control shadow-none " id="floatingPassword" placeholder="Password"
                    required>
                <label for="floatingPassword">Password</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
        </form>

        <?php
  //* Tratar mensagens de erro
  if (!empty($_GET["erro"])) {
    $erro = (int)$_GET["erro"];
    $erro_descricao = "";

    //* Definir mensagens de erro
    switch ($erro) {
      case 1:
        $erro_descricao = "Username e/ou password vazio/inválido!";
        break;
      case 2:
        $erro_descricao = "Username e/ou password incorreto!";
        break;
    }

    //* Apresentar mensagens de erro
    if (!empty($erro_descricao)) {
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
      echo htmlspecialchars($erro_descricao);
      echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
      echo "</div>";
    }
  }
  ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
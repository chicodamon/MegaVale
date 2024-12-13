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
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.122.0">
  <title>LogIn / SingIN</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .btn-bd-primary {
      --bd-violet-bg: #712cf9;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #6528e0;
      --bs-btn-hover-border-color: #6528e0;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #5a23c8;
      --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }
  </style>

  <!-- Custom styles for this template -->
  <link href="sign-in.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
<main class="form-signin w-100 m-auto">
  <form action="" method="POST">
    <h1 class="h3 mb-3 fw-normal">Bem-Vindo à área reservada</h1>
    <p>Introduza os seus dados de login</p>
    <div class="form-floating mb-3">
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder="exemplo123" required>
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
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

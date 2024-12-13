<?php
    //* incluimos o check_session.php
  include_once("check_session.php");
?>


<main>
  <div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4 text-light">G_Tarefas</span>
      </a>

      <ul class="nav nav-pills ">
        <li class="nav-item"><a href="home.php" class="nav-link text-light" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link Secundary text-light">Tarefas</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link Secundary text-light">Terminar Sessão </a></li>
      </ul>
    </header>
  </div>
</main>
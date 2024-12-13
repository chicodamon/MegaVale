<?php
    /* --------------------- ficheiro para efetuar o logout --------------------- */

    //* iniciamos sessao
    session_start();

    //* efetuamos um unset de todas as variaveis de sessao existentes
    $_SESSION = array();

    //* acabamos/destruimos a sessao
    session_destroy();

    //* encaminhamos para a pagina de login (index.php)
    header("location: index.php");
    exit();
?>
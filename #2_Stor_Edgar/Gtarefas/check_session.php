<?php
    //* Verificas se existe um login efetuado, se nao encaminhamos para a pagina de login

//iniciamos a sessao
session_start();

//* ---- verificamos o login, se nao for verdadeiro manda para o index.php

if ($_SESSION["login"] != true) {
    header("location: index.php");  //* Header em php "Manda info em html"!!
}
?>
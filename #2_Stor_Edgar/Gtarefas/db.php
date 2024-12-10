<?php

// ligação ao servidor de mysql

// definicao de dados de acesso atraves de constantes

define("DBSERVER", "localhost");
define("DBUSER","root");
define("DBPWD","root");
define("DBNAME","gtarefas");

$conexao = mysqli_connect(DBSERVER, DBUSER, DBPASS, DBNAME);

//verificar a ligaçao

if($conexao == false) {
    die("Eroo: ", mysqli_connect_error());
} else {
    echo "Ligação estabelecida com sucesso";
    echo mysql_get_host_info($conexao);
}


?>
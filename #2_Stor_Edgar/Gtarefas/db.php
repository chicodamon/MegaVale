<?php

//* Ligação ao servidor de MySQL

//* Definição de dados de acesso através de constantes
define("DBSERVER", "localhost");
define("DBUSER", "root");
define("DBPWD", "root"); //* Corrigido para manter consistência com o nome usado

define("DBNAME", "gtarefas");

$conexao = mysqli_connect(DBSERVER, DBUSER, DBPWD, DBNAME);

//* Verificar a ligação
if ($conexao == false) {
    die("Erro: " . mysqli_connect_error()); //* Corrigido o uso da função
} else {
    //* echo "Ligação estabelecida com sucesso<br>";
    //* echo mysqli_get_host_info($conexao); //* Corrigido para usar 'mysqli_get_host_info'
}

?>

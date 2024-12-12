<?php
    //* ficheiro com funçoes reutilizáveis

    function hoje() {
        $data = date("D");
        $dia = date("d");
        $mes = date("M");
        $ano = date("Y");

        echo $data . "<br>" . $dia ."<br>". $mes ."<br>". $ano;
    }
    $hoje();
?>
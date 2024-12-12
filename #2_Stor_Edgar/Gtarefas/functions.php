<?php
// Ficheiro com funções reutilizáveis

function hoje() {

    $data = date("D");
    $dia = date("d");
    $mes = date("M");
    $ano = date("Y");

    // echo $data . "<br>" . $dia . "<br>" . $mes . "<br>" . $ano;

    $diaSemana = array(
        "Sun" => "domingo",
        "Mon" => "Segunda-feira",
        "Tue" => "Terça-feira",
        "Wed" => "Quarta-feira",
        "Thu" => "Quinta-feira",
        "Fri" => "Seixa-feira",
        "Sat" => "Sábado"
    );

    $mesExtenso = array(
        "Jan" => "Janeiro",
        "Feb" => "Fevereiro",
        "Mar" => "Março",
        "Apr" => "Abril",
        "May" => "Maio",
        "Jun" => "Junho",
        "Jul" => "Julho",
        "Aug" => "Agosto",
        "Sep" => "Setembro",
        "Oct" => "Outubro",
        "Dec" => "Dezembro"
    );

    return $diaSemana[$data] . ", $dia de " . $mesExtenso[$mes] . "de $ano";

}

?>

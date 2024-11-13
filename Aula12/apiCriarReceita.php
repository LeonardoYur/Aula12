<?php
include("conexao.php");

$codigoSQL = "INSERT INTO tblReceitas (id, nomePaciente, nomeMedicamento, dataAdmin, horaAdmin, dose, nomeMedico) VALUES (NULL, :pa, :med, :dt, :hr, :ds, :me)";

try {
    $comando = $conexao->prepare($codigoSQL);
    $resultado = $comando->execute(array('pa' => $_GET['pa'], 'med' => $_GET['med'], 'dt' => $_GET['dt'], 'hr' => $_GET['hr'], 'ds' => $_GET['ds'], 'me' => $_GET['me'] ));

    $resposta = array('resposta' => $resultado);
    echo json_encode($resposta);
} catch (Exception $e) {
    $resposta = array('resposta' => $e);
    echo json_encode($resposta);
}

$conexao = null;
?>
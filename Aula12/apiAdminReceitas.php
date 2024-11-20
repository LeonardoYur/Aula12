<?php
session_start();
include("conexao.php");


$codigoSQL = "INSERT INTO tblAdmin (id, nomePaciente, nomeMedicamento, dataAdmin, horaAdmin, dose) VALUES (NULL, :pa, :med, :dt, :hr, :ds)";
$excluir = "DELETE FROM tblReceitas WHERE tblReceitas.id = :id";

try {
    $comando = $conexao->prepare($codigoSQL);
    $apagar = $conexao->prepare($excluir);
    $result = $comando->execute(array('pa' => $_GET['pa'], 'med' => $_GET['med'], 'dt' => $_GET['dt'], 'hr' => $_GET['hr'], 'ds' => $_GET['ds']));
    var_dump($_SESSION['id']);
    $resultado = $apagar->execute(array('id' => $_SESSION['id']));

    $resposta = array('resposta' => $resultado);
    echo json_encode($resposta);
} catch (Exception $e) {
    $resposta = array('resposta' => $e);
    echo json_encode($resposta);
}

$conexao = null;
?>
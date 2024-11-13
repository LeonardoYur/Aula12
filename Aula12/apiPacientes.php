<?php
include("conexao.php");

$codigoSQL = "INSERT INTO tblPacientes (id, nome, leito) VALUES (NULL, :nm, :le)";

try {
    $comando = $conexao->prepare($codigoSQL);
    $resultado = $comando->execute(array('nm' => $_GET['nome'], 'le' => $_GET['le']));

    $resposta = array('resposta' => $resultado);
    echo json_encode($resposta);
} catch (Exception $e) {
    $resposta = array('resposta' => $e);
    echo json_encode($resposta);
}

$conexao = null;

?>
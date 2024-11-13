<?php
include("conexao.php");

$codigoSQL = "INSERT INTO tblEnfermeiros (id, nome, COREN, usuario, senha) VALUES (NULL, :nm, :crm, :us, :se)";

try {
    $comando = $conexao->prepare($codigoSQL);
    $resultado = $comando->execute(array('nm' => $_GET['nome'], 'crm' => $_GET['crm'], 'us' => $_GET['usu'], 'se' => $_GET['se'] ));

    $resposta = array('resposta' => $resultado);
    echo json_encode($resposta);
} catch (Exception $e) {
    $resposta = array('resposta' => $e);
    echo json_encode($resposta);
}

$conexao = null;
?>
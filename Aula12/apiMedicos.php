<?php
include("conexao.php");

$codigoSQL = "INSERT INTO tblMedicos (id, nome, especialidade, CRM, usuario, senha) VALUES (NULL, :nm, :es, :crm, :us, :se)";

try {
    $comando = $conexao->prepare($codigoSQL);
    $resultado = $comando->execute(array('nm' => $_GET['nome'], 'es' => $_GET['esp'], 'crm' => $_GET['crm'], 'us' => $_GET['usu'], 'se' => $_GET['se']));

    $resposta = array('resposta' => $resultado);
    echo json_encode($resposta);
} catch (Exception $e) {
    $resposta = array('resposta' => $e);
    echo json_encode($resposta);
}

$conexao = null;
?>
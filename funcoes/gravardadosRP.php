<?php
    $id_aluno = $_POST['id_aluno'];
    date_default_timezone_set("America/Sao_Paulo");
    $horaocorrencia = date("H:i");
    $nomedocumento = $_POST['nomedocumento'];
    $nomeestagiario  = $_POST['nomeestagiario'];
    $ra = $_POST['ra'];
    $nomerepresentante  = $_POST['nomerepresentante'];
    $nomeempresa  = $_POST['nomeempresa'];
    $datainicio  = $_POST['datainicio'];
    $datatermino  = $_POST['datatermino'];

    $sql = "INSERT INTO dadosformrp VALUES (
            null,$id_aluno,'$horaocorrencia', '$nomedocumento', 
            '$nomeestagiario','$ra','$nomerepresentante',
            '$nomeempresa','$datainicio','$datatermino'
            );";

include '../classes/Conexao.php';
$conexao->exec($sql);
header("Location:formRP.php");

?>
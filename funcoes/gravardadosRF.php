<?php
    $id_aluno = $_POST['id_aluno'];
    date_default_timezone_set("America/Sao_Paulo");
    $horaocorrencia = date("H:i");
    $nomedocumento = $_POST['nomedocumento'];
    $nomeestagiario =$_POST['nomeestagiario'];
    $ra =$_POST['ra'];
    $nomeempresa =$_POST['nomeempresa'];
    $nomerepresentante =$_POST['nomerepresentante'];
    $datainicio =$_POST['datainicio'];
    $datatermino =$_POST['datatermino'];
    $diaatual =$_POST['diaatual'];
    $mesatual =$_POST['mesatual'];
    $anoatual =$_POST['anoatual'];

    $sql = "INSERT INTO dadosformrf VALUES (
            null,$id_aluno,'$horaocorrencia','$nomedocumento',
            '$nomeestagiario','$ra','$nomeempresa','$nomerepresentante',
            '$datainicio','$datatermino', '$diaatual', '$mesatual','$anoatual'
            );";
    
    include '../classes/Conexao.php';
    
    $conexao->exec($sql);
    header("Location:formRF.php");
?>
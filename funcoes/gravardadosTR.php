<?php
    $id_aluno = $_POST['id_aluno'];
    date_default_timezone_set("America/Sao_Paulo");
    $horaocorrencia = date("H:i");
    $nomedocumento = $_POST['nomedocumento'];
    $diaatual = $_POST['diaatual'];
    $mesatual = $_POST['mesatual'];
    $anoatual = $_POST['anoatual'];
    $datarescisao = $_POST['datarescisao'];
    $datatermino = $_POST['datatermino'];
    $nomeempresa = $_POST['nomeempresa'];
    $nomeestagiario = $_POST['nomeestagiario'];
    $nomecurso = $_POST['nomecurso'];
    $motivo = $_POST['motivo'];

    $sql = "INSERT INTO dadosformtr VALUES (
            null, $id_aluno, '$horaocorrencia', '$nomedocumento', '$diaatual',
            '$mesatual', '$anoatual', '$datarescisao', '$datatermino','$nomeempresa',
            '$nomeestagiario', '$nomecurso', '$motivo'
            );";

    include "../classes/Conexao.php";
    $conexao->exec($sql);
    header("Location:formTR.php");
?>
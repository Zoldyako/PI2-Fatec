<?php
session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header('../../index.php');
} else {

    $sql = "SELECT * FROM tb_usuarios WHERE
            username = '{$_SESSION['usuario_logado']}'";

    $resultado = $conexao->query($sql);
    $linha = $resultado->fetch();

    // Direciona baseado no tipo
    if ($linha['tipo'] == 'aluno') {
        header("Location:aluno.php?id={$linha['id_aluno']}");
    } else if ($linha['tipo'] == 'professor') {
        header("Location:professor.php?id={$linha['id_professor']}");
    }
}
?>
<?php
    include "../../classes/Conexao.php";

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $erro = '';
    
    $sql = "SELECT * FROM tb_usuarios WHERE
            username = '{$usuario}'";

    
    $resultado = $conexao->query($sql);
    $linha = $resultado->fetch();
    
    //Verifica se o SQL retornou algum valor
    if ($linha == null) {
        header("Location:../../index.php?erro=Erro Login");
    } 
    //Verifica se a senha e valida
    else if ($senha == $linha['senha']) {
        $usuario_logado = $linha['id'];
        session_start();
        $_SESSION['usuario_logado'] = $usuario_logado;

        // Direciona baseado no tipo
        if($linha['tipo'] == 'aluno'){
            header("Location:../../aluno.php?id={$linha['id']}");

        } else if ($linha['tipo'] == 'professor'){
            header("Location:../../professor.php?id={$linha['id']}");
        }
      //caso a senha não seja valida    
    } else {header("Location:usuario-erro.php");}

?>
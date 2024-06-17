<?php
   include "../../classes/Conexao.php";
   session_start();
   
   $id = $_SESSION['id'];
   $sql = "SELECT * 
            FROM tb_professores 
            WHERE usuario_id = '{$id}'";
   
   $resultado = $conexao->query($sql);
   $linha = $resultado->fetch();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../estilo/fonts.css">
    <link rel="stylesheet" href="../../estilo/professor/professor.css">
    <link rel="stylesheet" href="../../estilo/style.css">
    <link rel="stylesheet" href="../../estilo/side-bar.css">
    <title>Página do Professor <?php echo $linha['nome']?></title>
</head> 
<body>
    <header>
        <div class="logo">
            <h1>Fatec</h1>
            <h2>Itapira</h2>
        </div>
    </header>

    <main>
        <div class="sidebar-container">
            <div class="sidebar">
                <ul>
                    <a href="#" class="sidebar-opt"><li>Perfil do Professor</li></a>
                    <a href="professor-pendente.php" class="sidebar-opt"><li>Documentos Pendentes</li></a>
                    <a href="professor-avaliados.php" class="sidebar-opt"><li>Documentos Avaliados</li></a>
                    <a href="professor-pendente-assinado.php" class="sidebar-opt"><li>Assinados Pendentes</li></a>
                    <a href="professor-analisado-assinado.php" class="sidebar-opt"><li>Assinados avaliados</li></a>
                </ul>
            </div>
            <div>           
                <ul>
                    <a href="../usuarios/usuario-logout.php"><li>Sair</li></a>
                </ul>
            </div>
        </div>
        <div class="container-content">
            <div class="content">
                <h2>Bem vindo <?=$linha['nome']?></h2>
                <?php
                    $sql = "SELECT COUNT(*) AS qtdependentes 
                            FROM tb_documentos 
                            WHERE status = 'pendente'";
                    
                    $resultado = $conexao->query($sql);
                    $lista = $resultado->fetch();
                    $quantidadependentes = $lista['qtdependentes'];
                ?>
                    <h1><?php echo "Nome:  ".$linha['nome'];""?></h1>
                    <div class="infos">
                        <h3><?php echo "Disciplina: ".$linha['email'];""?></h3>
                        <h3><?php echo "R.M.: ".$linha['rm'];""?></h3>
                        <h3><?php echo "Curso: ".$linha['cursoorientador'].""?></h3>
                    </div>
                    <h2><?php echo "Quantidade de documentos pendentes: ".$quantidadependentes; ?></h2>
            </div>
        </div>
    </main>
</body>
</html>







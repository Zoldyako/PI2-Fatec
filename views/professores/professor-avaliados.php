<?php
   include "../../classes/Conexao.php";
   session_start();
   
   $id = $_SESSION['id'];
   $sql = "SELECT * FROM tb_professores WHERE usuario_id = '{$id}'";
   
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
    <link rel="stylesheet" href="../../estilo/professor/professor-avaliados.css">
    <link rel="stylesheet" href="../../estilo/style.css">
    <link rel="stylesheet" href="../../estilo/side-bar.css">
    <link rel="stylesheet" href="../../estilo/nav-bar.css">
    <title>Página Professor</title>
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
                    <a href="professor.php" class="sidebar-opt"><li>Perfil do Professor</li></a>
                    <a href="professor-pendente.php" class="sidebar-opt"><li>Documentos Pendentes</li></a>
                    <a href="#" class="sidebar-opt"><li>Documentos Avaliados</li></a>
                    <a href="professor-pendente-assinado.php" class="sidebar-opt"><li>Documentos Assinados</li></a>
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
                <h2>Documentos pendentes</h2>
                <?php 
                if (!isset($_POST['filtro'])) {
                    echo '         <form action="professoravaliados.php" method="post">';
                    echo '         <label for="filtro">Filtrar por:</label>';
                    echo '         <select name="filtro" id="filtro">';
                    echo '         <option value="null" selected>Selecione uma opção</option>';
                    echo '         <option value="termocompromisso.pdf">Termo de compromisso</option>';
                    echo '         <option value="relatoriofinal.pdf">Relatório final</option>';
                    echo '         <option value="relatorioparcial.pdf">Relatório parcial</option>';
                    echo '         <option value="termorescisão.pdf">Termo de rescisão</option>';
                    echo '         <option value="sem">Retirar filtro</option>';
                    echo ' </select>   ';
                    echo ' <label for="nomefiltro">Filtrar por nome:</label>';
                    echo ' <input type="text" name="nomefiltro" id="nomefiltro">';
                    echo ' <input type="submit" value="Filtrar">';
                    echo '     </form>';

                } elseif ($_POST['filtro'] == 'null') {
                    echo '         <form action="professoravaliados.php" method="post">';
                    echo '         <label for="filtro">Filtrar por:</label>';
                    echo '         <select name="filtro" id="filtro">';
                    echo '         <option value="null" selected>Selecione uma opção</option>';
                    echo '         <option value="termocompromisso.pdf">Termo de compromisso</option>';
                    echo '         <option value="relatoriofinal.pdf">Relatório final</option>';
                    echo '         <option value="relatorioparcial.pdf">Relatório parcial</option>';
                    echo '         <option value="termorescisão.pdf">Termo de rescisão</option>';
                    echo '         <option value="sem">Retirar filtro</option>';
                    echo ' </select>   ';
                    echo ' <label for="nomefiltro">Filtrar por nome:</label>';
                    echo ' <input type="text" name="nomefiltro" id="nomefiltro">';
                    echo ' <input type="submit" value="Filtrar">';
                    echo '     </form>';

                } elseif ($_POST['filtro'] == 'termocompromisso.pdf') {
                    echo '         <form action="professoravaliados.php" method="post">';
                    echo '         <label for="filtro">Filtrar por:</label>';
                    echo '         <select name="filtro" id="filtro">';
                    echo '         <option value="null" >Selecione uma opção</option>';
                    echo '         <option value="termocompromisso.pdf" selected>Termo de compromisso</option>';
                    echo '         <option value="relatoriofinal.pdf">Relatório final</option>';
                    echo '         <option value="relatorioparcial.pdf">Relatório parcial</option>';
                    echo '         <option value="termorescisão.pdf">Termo de rescisão</option>';
                    echo '         <option value="sem">Retirar filtro</option>';
                    echo ' </select>   ';
                    echo ' <label for="nomefiltro">Filtrar por nome:</label>';
                    echo ' <input type="text" name="nomefiltro" id="nomefiltro">';
                    echo ' <input type="submit" value="Filtrar">';
                    echo '     </form>';

                } elseif ($_POST['filtro'] == 'relatoriofinal.pdf') {
                    echo '         <form action="professoravaliados.php" method="post">';
                    echo '         <label for="filtro">Filtrar por:</label>';
                    echo '         <select name="filtro" id="filtro">';
                    echo '         <option value="null" >Selecione uma opção</option>';
                    echo '         <option value="termocompromisso.pdf">Termo de compromisso</option>';
                    echo '         <option value="relatoriofinal.pdf" selected >Relatório final</option>';
                    echo '         <option value="relatorioparcial.pdf">Relatório parcial</option>';
                    echo '         <option value="termorescisão.pdf">Termo de rescisão</option>';
                    echo '         <option value="sem">Retirar filtro</option>';
                    echo ' </select>   ';
                    echo ' <label for="nomefiltro">Filtrar por nome:</label>';
                    echo ' <input type="text" name="nomefiltro" id="nomefiltro">';
                    echo ' <input type="submit" value="Filtrar">';
                    echo '     </form>';

                } elseif ($_POST['filtro'] == 'relatorioparcial.pdf') {
                    echo '         <form action="professoravaliados.php" method="post">';
                    echo '         <label for="filtro">Filtrar por:</label>';
                    echo '         <select name="filtro" id="filtro">';
                    echo '         <option value="null" >Selecione uma opção</option>';
                    echo '         <option value="termocompromisso.pdf">Termo de compromisso</option>';
                    echo '         <option value="relatoriofinal.pdf">Relatório final</option>';
                    echo '         <option value="relatorioparcial.pdf" selected>Relatório parcial</option>';
                    echo '         <option value="termorescisão.pdf">Termo de rescisão</option>';
                    echo '         <option value="sem">Retirar filtro</option>';
                    echo ' </select>   ';
                    echo ' <label for="nomefiltro">Filtrar por nome:</label>';
                    echo ' <input type="text" name="nomefiltro" id="nomefiltro">';
                    echo ' <input type="submit" value="Filtrar">';
                    echo '     </form>';

                } elseif ($_POST['filtro'] == 'termorescisão.pdf') {
                    echo '         <form action="professoravaliados.php" method="post">';
                    echo '         <label for="filtro">Filtrar por:</label>';
                    echo '         <select name="filtro" id="filtro">';
                    echo '         <option value="null">Selecione uma opção</option>';
                    echo '         <option value="termocompromisso.pdf">Termo de compromisso</option>';
                    echo '         <option value="relatoriofinal.pdf">Relatório final</option>';
                    echo '         <option value="relatorioparcial.pdf">Relatório parcial</option>';
                    echo '         <option value="termorescisão.pdf" selected>Termo de rescisão</option>';
                    echo '         <option value="sem">Retirar filtro</option>';
                    echo ' </select>   ';
                    echo ' <label for="nomefiltro">Filtrar por nome:</label>';
                    echo ' <input type="text" name="nomefiltro" id="nomefiltro">';
                    echo ' <input type="submit" value="Filtrar">';
                    echo '     </form>';

                } elseif ($_POST['filtro'] == 'sem') {
                    echo '         <form action="professoravaliados.php" method="post">';
                    echo '         <label for="filtro">Filtrar por:</label>';
                    echo '         <select name="filtro" id="filtro">';
                    echo '         <option value="null" >Selecione uma opção</option>';
                    echo '         <option value="termocompromisso.pdf">Termo de compromisso</option>';
                    echo '         <option value="relatoriofinal.pdf">Relatório final</option>';
                    echo '         <option value="relatorioparcial.pdf">Relatório parcial</option>';
                    echo '         <option value="termorescisão.pdf">Termo de rescisão</option>';
                    echo '         <option value="sem" selected>Retirar filtro</option>';
                    echo ' </select>   ';
                    echo ' <label for="nomefiltro">Filtrar por nome:</label>';
                    echo ' <input type="text" name="nomefiltro" id="nomefiltro">';
                    echo ' <input type="submit" value="Filtrar">';
                    echo '     </form>';
                } ?>
                <?php 
                if (isset($_POST['nomefiltro']) && $_POST['nomefiltro']!= '') {
                    $novosql = "SELECT id 
                                FROM tb_alunos 
                                WHERE nome = '".$_POST['nomefiltro']."';";
                    
                    $resultado = $conexao->query($novosql);
                    $resultado1 = $resultado->fetch();
                    $idaluno = $resultado1['id'];
                    
                    if ($_POST['filtro'] == 'termocompromisso.pdf') {
                        $sql = "SELECT * 
                                FROM `tb_documentos` 
                                WHERE aluno_id = $idaluno 
                                and nome = 'termocompromisso.pdf' 
                                and status != 'pendente' ";
                    
                    } elseif ($_POST['filtro'] == 'relatoriofinal.pdf') {
                        $sql = "SELECT * 
                                FROM `tb_documentos` 
                                WHERE aluno_id = $idaluno 
                                and nome = 'relatoriofinal.pdf' 
                                and status != 'pendente'";
                    
                    } elseif ($_POST['filtro'] == 'relatorioparcial.pdf') {
                        $sql = "SELECT * 
                                FROM `tb_documentos` 
                                WHERE aluno_id = $idaluno 
                                and nome = 'relatorioparcial.pdf' 
                                and status != 'pendente'";
                    
                    } elseif ($_POST['filtro'] == 'termorescisão.pdf') {
                        $sql = "SELECT * 
                                FROM `tb_documentos` 
                                WHERE aluno_id = $idaluno 
                                and nome = 'termorescisão.pdf' 
                                and status != 'pendente'";
                    
                    } elseif ($_POST['filtro'] == 'null' || $_POST['filtro'] == 'sem' ) {
                        $sql = "SELECT * 
                                FROM tb_documentos 
                                WHERE status != 'pendente' 
                                and aluno_id = $idaluno;";
                    }
                
                } elseif (isset($_POST['filtro'])){ if ($_POST['filtro'] == 'termocompromisso.pdf') {
                    $sql = "SELECT * 
                            FROM `tb_documentos` 
                            WHERE nome = 'termocompromisso.pdf' 
                            and status != 'pendente' ";
                        
                    } elseif ($_POST['filtro'] == 'relatoriofinal.pdf') {
                        $sql = "SELECT * 
                                FROM `tb_documentos` 
                                WHERE nome = 'relatoriofinal.pdf' 
                                and status != 'pendente'";
                    
                    } elseif ($_POST['filtro'] == 'relatorioparcial.pdf') {
                        $sql = "SELECT * 
                                FROM `tb_documentos` 
                                WHERE nome = 'relatorioparcial.pdf' 
                                and status != 'pendente'";
                    
                    } elseif ($_POST['filtro'] == 'termorescisão.pdf') {
                        $sql = "SELECT * 
                                FROM `tb_documentos` 
                                WHERE nome = 'termorescisão.pdf' 
                                and status != 'pendente'";
                    
                    } elseif ($_POST['filtro'] == 'null' || $_POST['filtro'] == 'sem' ) {
                        $sql = "SELECT * 
                                FROM tb_documentos 
                                WHERE status != 'pendente';";
                    }
                        
                } else {
                    $sql = "SELECT * 
                            FROM tb_documentos 
                            WHERE status != 'pendente';";
                }

                $resultado = $conexao->query($sql);
                $lista = $resultado->fetchAll();
                
                foreach ($lista as $linha) {
                    $alunoid = $linha['aluno_id'];
                    $sql1 = "SELECT nome 
                            FROM tb_alunos 
                            WHERE usuario_id = $alunoid";

                    $resultado = $conexao->query($sql1);
                    $resultado1 = $resultado->fetch();
                    $nomealuno = $resultado1['nome'];
                ?>
                    <div class="documento">
                        <p><?php echo $nomealuno; ?></p>
                        <p><?php echo $linha['nome']; ?></p>
                        <p><?php echo $linha['status']?> </p>
                        
                        <form action="mostrarpdf.php" method="post" target="_blank">
                            <input type="hidden" name="id_documento" value="<?php echo $linha['id']?>">
                            <input type="submit" value="documento">
                        </form>
                    </div> 
                <?php
                } ?>
            </div>
        </div>
    </main>
</body>
</html>






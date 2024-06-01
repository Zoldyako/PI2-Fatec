<?php
   include "classes/Conexao.php";
   //Pega o id enviado pelo header
   $id = $_GET['id'];
   $sql = "SELECT * FROM tb_professores WHERE
            usuario_id = '{$id}'";
   $resultado = $conexao->query($sql);
   $linha = $resultado->fetch();






   
try {
    
    // Consulta SQL para selecionar todos os alunos
    $stmt = $conexao->query("SELECT *
    FROM tb_alunos
    WHERE id IN (SELECT aluno_id FROM tb_documentos);");

} catch(PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}

// Fecha a conexão
$conexao = null;
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pagina Professor</h1>
       <p><?php
 if($id == null){
    echo"Sem id de professor";
}else{
 echo $id;
 echo "<h3>Nome: ".$linha['nome']."</h3>";
 echo "<h3>Email: ".$linha['email']."</h3>";
}

?></p>

<a href="views/usuarios/usuario-logout.php"><button> logout </button></a>



<?php    if ($stmt->rowCount() > 0) {
        echo "<h2>Lista de Alunos</h2>";
        echo "<table border='1'>";
        echo "
        <tr>
        <th>Nome</th>
        <th>RA</th>
        <th>Curso</th>
        <th>Documentos</th>
        </tr>";

        // Itera sobre os resultados da consulta e exibe cada aluno em uma linha da tabela
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            echo "<tr>";
            echo "<td>".$row['nome']."</td>";
            echo "<td>".$row['ra']."</td>";
            echo "<td>".$row['curso']."</td>";
            echo "<td><a href='documentos_visualizar.php?id=$id'>Documentos</a></td>";

            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Nenhum aluno encontrado.</p>";
    }
?>






</body>
</html>







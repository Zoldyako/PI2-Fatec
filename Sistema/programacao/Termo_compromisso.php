<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos download</title>
</head>
<body>
<form action="#" method="get">
<select name="tipo" id="tipo">
<option value="">Selecione uma opção de estágio</option>
    <?php
    
    $sql = "SELECT tipo FROM termosdownload"; 
    include "Conexao.php";
    $resultado = $conexao->query($sql);
    $lista = $resultado->fetchAll();
    foreach($lista as $linha):
        ?>
        <option value='<?php echo $linha['tipo'];?>'><?php echo $linha['tipo']; ?></option> 
    <?php endforeach; ?> 
</select>
<input type="submit" value="escolha e clique aqui antes de baixar">
</form>
<?php
$tipo = $_GET['tipo'];

$sql = "SELECT caminho FROM termosdownload WHERE tipo = '$tipo'";
include "Conexao.php";
$link = $conexao->query($sql);
$link = $link->fetchColumn();
echo "<p><a href=$link download>baixe documentos aqui</a></p>";


?>


</body>
</html>
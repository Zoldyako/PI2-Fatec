<?php

include("classes/Conexao.php");
include("views/usuarios/usuario-verifica.php");

if(isset($_GET['erro'])){
  $erro = $_GET['erro'];  
} else{
  $erro = null;
}


?>



<!DOCTYPE html>
<html lang="pt-br">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="estilo/login.css">
    <style>
        h3 {
            margin: 0 auto;
        }
    </style>
    <title>Sistema estágio</title>

</head>

<body>

    <header>
        <img src="img/fatec_logo.png" alt="Logo Fatec">
    </header>

    <section>
        <form action="views/usuarios/usuario-login.php" method="POST">
            <div>
                <h3>Bem vindo</h3>
            </div>

            <div>
                <label for="usuario">Login: </label>
                <input type="text" name="usuario" id="usuario" placeholder="Digite seu usuario" required>
            </div>

            <div>
                <label for="usuario">Senha: </label>
                <input type="password" name="senha" placeholder="Digite sua senha" required>
            </div>
            <span style="color:red;"><?php echo $erro; ?></span>

            <div>
                <input type="submit" value="Entrar">
            </div>

        </form>
    </section>
</body>

</html>
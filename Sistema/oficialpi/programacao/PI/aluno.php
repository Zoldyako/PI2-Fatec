<?php
   include "classes/Conexao.php";
   //Pega o id enviado pelo header
   $id = $_GET['id'];
   $sql = "SELECT * FROM tb_alunos WHERE
            usuario_id = '{$id}'";
   $resultado = $conexao->query($sql);
   $linha = $resultado->fetch();
   
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Aluno</title>
    <style> 
    *{margin:0;}       
    .modal {
	background-color: rgba(0, 0, 0, 0.8);
	width: 100%;
	height: 100%;
    margin:0;
	position: absolute;

	top: 0;
	display: none;
	justify-content: center;
	align-items: center;
    
}
.close {margin-left: 275px;
    margin-top: -10px;
	position:fixed;
    z-index:20;
    width: fit-content;
    height: fit-content;
    
	font-size: 42px;
	color: #333;
	transform: rotate(45deg);
	cursor: pointer;
	&:hover {
		color: #666;
	}
}
.conteudo{width: 300px;height: 100px;display: flex;flex-direction: column;background-color: white;}
.conteudo label{font-size:20px;text-align: center;}
.conteudo select{font-size: 17px;width: fit-content;margin:auto;margin-top: 10px}
.conteudo button{width: fit-content;height: 2em;margin:auto;font-size:14px;border-radius: 10px;}
select{border-radius: 20px;padding:20px,0,20px,0;}
    </style>
</head>
<body>

  <h1>Página Aluno</h1>
    <p><?php
 if($id == null){
    echo"Sem id de aluno";
}else{
 echo $id;
 echo "<h3>Nome: ".$linha['nome']."</h3>";
 echo "<h3>Disciplina: ".$linha['curso']."</h3>";
 echo "<h3>RA: ".$linha['ra']."</h3>";
}

?></p>
<a href="views/usuarios/usuario-logout.php"><button> logout </button></a>
<br>
<h2>Upload de Documento</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        Selecione um arquivo PDF:
        <input type="file" name="documento" accept="application/pdf" required>
        <br><br>
        <input type="submit" value="Enviar Documento">
    </form>
    <button id="mostrar">Novo documento</button>
    <div class="modal">
<div class="conteudo" >
    <div class="close">+</div>

    <label for="estagio111" >Selecione tipo do documento</label>
    <select name="estagio111" id="estagio111">
        <option value="" selected>Selecione uma opção</option>
        <option value="OR">Obrigatório Remunerado</option>
        <option value="ONR">Obrigatório Não Remunerado</option>
        <option value="RP">Relatório Parcial</option>
        <option value="RF">Relatório Final</option>
        <option value="TR">Termo de rescisão</option>
    </select>
    <button onclick="obterValorSelect()"> Exibir formulário</button>
   </div> 
    </div>
    <script>
        document.getElementById("mostrar").addEventListener("click",function(){document.querySelector('.modal').style.display = "flex";})

        document.querySelector('.close').addEventListener("click", function() {
	document.querySelector('.modal').style.display = "none";
});


        function obterValorSelect()
        {
            var select=document.getElementById("estagio111").value
            if (select=="ONR"){
                window.location.href = "formONR.html"
                
                
            } else if (select == "OR"){
                window.location.href = "formOR.html"
            }
            else if (select == "RP"){
                window.location.href = "formRP.html"
            }
            else if (select == "RF"){
                window.location.href = "formRF.html"
            }
            else if(select == "TR"){
                window.location.href = "formTR.html"
            }
            
            
            
            else{
                alert("Selecione uma opção válida")
            }
            
        }
    </script>

</body>
</html>
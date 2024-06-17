<?php
    session_start();
    $iddocumento = $_POST['anteriordocs'];
    $idaluno = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório Parcial</title>
</head>
<body>
    <?php include "../../classes/Conexao.php";
        $sql = "SELECT * 
                FROM dadosformrf 
                WHERE idrequisicao = $iddocumento";

        $resultado = $conexao->query($sql);
        $lista = $resultado->fetch();
    ?>
    <form action="../../funcoes/gravar-dadosRF.php" method="post">
        <input type="hidden" name="nomedocumento" value="Relatório final">
        <input type="hidden" name="id_aluno" value="<?php echo $idaluno?>">
            <label for="nomeestagiario">Nome do estagiário:</label>
            <input type="text" name="nomeestagiario" id="nomeestagiario" value="<?php echo $lista['nomeestagiario'];?>">
            
            <label for="ra">R.A.:</label>
            <input type="text" name="ra" id="ra" value="<?php echo $lista['ra'];?>">
            
            <label for="nomeempresa">Nome da empresa:</label>
            <input type="text" name="nomeempresa" id="nomeempresa" value="<?php echo $lista['nomeempresa'];?>">
            
            <label for="nomerepresentante">Nome do responsável pelo estágio:</label>
            <input type="text" name="nomerepresentante" id="nomerepresentante" value="<?php echo $lista['nomerepresentante'];?>">
            
            <label for="datainicio">Data do inicio do estágio:</label>
            <input type="date" name="datainicio" id="datainicio" value="<?php echo $lista['datainicio'];?>">
            
            <label for="datatermino">Data do final do estágio:</label>
            <input type="date" name="datatermino" id="datatermino" value="<?php echo $lista['datatermino'];?>">
            
            <label for="diaatual">Dia atual do documento:</label>
            <input type="text" name="diaatual" id="diaatual" style="width: 40px;" value="<?php echo $lista['diaatual'];?>">
            
            <label for="mesatual">Nome do mês atual do documento:</label>
            <input type="text" name="mesatual" id="mesatual" value="<?php echo $lista['mesatual'];?>">
            
            <label for="anoatual">Ano atual do documento:</label>
            <input type="text" name="anoatual" id="anoatual" style="width: 60px;" value="<?php echo $lista['anoatual'];?>">
            
            <input type="submit" value="Gerar relatório" onclick="pegarValores()">
    </form>
    <div class="seletor">
        <a href="../form/formRF.php">Limpar preenchimento</a>
    </div>
    <script>
        function pegarValores(){
            let nomeestagiario = document.getElementById("nomeestagiario").value
            let diaatual = document.getElementById("diaatual").value
            let mesatual = document.getElementById("mesatual").value
            let anoatual = document.getElementById("anoatual").value
            let ra = document.getElementById("ra").value
            let nomeempresa = document.getElementById("nomeempresa").value
            let nomerepresentante = document.getElementById("nomerepresentante").value
            let datainicio = document.getElementById("datainicio").value
            let datatermino = document.getElementById("datatermino").value

            let formatacao = String(datainicio).split("-")
            datainicio = formatacao[2]+"/"+formatacao[1]+"/"+formatacao[0]
            formatacao = String(datatermino).split("-")
            datatermino = formatacao[2]+"/"+formatacao[1]+"/"+formatacao[0]

            let html=`<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                    <style>
                        *{margin:0;padding:0;box-sizing: border-box;}
                        body{width: 100vw;height: fit-content;display: flex;justify-content: center;align-items:center;flex-direction: column;}
                        .dados{width: 80%;height: fit-content;border:2px solid black;padding:15px; word-wrap:break-word;}
                        table{width: 80%;}
                        p{margin:3px 0 3px 0;}
                        table,th,td{border:2px solid black;border-collapse: collapse;text-align: center;padding:5px;word-wrap: break-word;font-size:1.3em;}
                        html{font-size:10px;}
                        .dados h1{text-align: center;}
                        h1{font-size: 2.5em;}
                        h2{font-size: 2em;}
                        p{font-size:2em;}
                        
                    </style>
                </head>
                <body >
                <div class="dados">
                    <h1>RELATÓRIO PARCIAL ESTÁGIO SUPERVISIONADO</h1>
                    <h2>1.Dados do(a) aluno(a):</h2>
                    <p>Nome: ${nomeestagiario}</p>
                    <p>R.A.: ${ra}</p>
                    <p>Curso: CST em Desenvolvimento de Software Multiplataforma</p>
                    <h2>2.Dados do local do estágio:</h2>
                    <p>Nome da empresa: ${nomeempresa}</p>
                    <p>Nome do responsável pelo estágio: ${nomerepresentante}</p>
                    <p>Data do início do estágio: ${datainicio}</p>
                    <p>Data do final do estágio: ${datatermino}</p>
                </div>
                <h2>3.Avaliação parcial do estágio:</h2>
                <table>
                    <tr>
                        <th rowspan="3">Habilidades</th>
                        <th colspan="10">Níveis de Desempenho</th>

                    </tr>
                    <tr>
                        <th colspan="2">Média Superior</th>
                        <th colspan="3">Média Superior</th>
                        <th colspan="3">Média Inferior</th>
                        <th colspan="2">Inferior</th>
                    </tr>
                    <tr>
                
                        <td>10</td>
                        <td>9</td>
                        <td>8</td>
                        <td>7</td>
                        <td>6</td>
                        <td>5</td>
                        <td>4</td>
                        <td>3</td>
                        <td>2</td>
                        <td>1</td>

                    </tr>
                    <tr>
                        <td>1.<strong>Planejamento</strong>: o estagiário planeja as atividades desenvolvidas, procurando estabelecer prioridades e metas.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2.<strong>Qualidade do Trabalho</strong>: o estagiário executa as atividades com qualidade, tendo em vista as condições de trabalho oferecidas.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3.<strong>Pontualidade e Assiduidade</strong>: o estagiário cumpre com os horários, não atrasando e faltando.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4.<strong>Disciplina</strong>: o estagiário cumpre as normas vigentes na empresa, bem como as normas de segurança e o uso de EPI quando necessário.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>5.<strong>Iniciativa e Participação</strong>: o estagiário é participativo, procura apresentar ideia para a melhoria dos processos, atividades e do ambiente de trabalho.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>6.<strong>Relacionamento em Grupo</strong>: o estagiário procura manter bom relacionamento com todos, sendo prestativo e participativo.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>7.<strong>Senso de Responsabilidade</strong>: o estagiário sabe o que deve ser feito e como, não necessita de orientações constantes, respondendo por suas atividades e prazos estabelecidos para cada tarefa realizada.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>8.<strong>Organização</strong>: o estagiário mantém o local de trabalho organizado, consegue administrar o tempo com facilidade, e localiza facilmente as atividades realizadas ou as entregas feitas.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>9.<strong>Comunicação</strong>: o estagiário se expressa bem, com clareza, desenvoltura e segurança, escreve bem dentro das normas gramaticais.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>


                </table>   
                <h2>4.Comentários adicionais:</h2>
                <h2 style="margin-bottom: 150px;">4.1 Cite 3 pontos fortes do estagiário(a)</h2>
                <h2 style="margin-bottom: 150px;">4.2 Cite 3 pontos de melhoria do estagiário(a)</h2>

                <h2>5.Assinaturas:</h2>
                <p>Itapira, ${diaatual} de ${mesatual} de ${anoatual}</p>
                <table style="border:0;">
                    <tr style="display:flex;border:0px;">
                        <td style="height: 100px;">Assinatura do(a) estagiário(a)</td>
                        <td style="height: 100px;">Assinatura do responsável pelo estágio</td>
                        <td style="height: 100px;">Coordenador(a) do curso</td>
                    </tr>
                </table>

                
                </body>
            </html>`

            var novaJanela = window.open();
            novaJanela.document.write(html);

            var imagem1 = document.createElement('img');
            var imagem2 = document.createElement('img');

            var totalImagens = 2;
            var imagensCarregadas = 0;

            function verificarCarregamento() {
                imagensCarregadas++;
                if (imagensCarregadas === totalImagens) {
                    novaJanela.print();
                }
            }
            imagem1.onload = verificarCarregamento;
            imagem2.onload = verificarCarregamento;

            // Defina os src após atribuir onload handlers
            imagem1.src = "../marcadagua1.png";
            imagem2.src = "../marcadagua2.png";

            // Adicione as imagens ao documento da nova janela
            novaJanela.document.body.appendChild(imagem1);
            novaJanela.document.body.appendChild(imagem2);

            document.getElementById("formulario").submit();
        }
    </script>
</body>
</html>
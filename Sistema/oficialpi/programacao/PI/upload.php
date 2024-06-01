<?php
include "classes/Conexao.php";

try {
    // Configuração para lançar exceções em caso de erro
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["documento"])) {
        $documento = $_FILES["documento"]["tmp_name"];
        $status = "pendente"; // Defina o status inicial como pendente

        // Lê o conteúdo do arquivo
        $documentoConteudo = file_get_contents($documento);

        // Prepara a instrução SQL para inserir o documento na tabela tb_documentos
        $stmt = $conexao->prepare("INSERT INTO tb_documentos (documento, status) VALUES (:documento, :status)");
        // Associa os parâmetros
        $stmt->bindParam(':documento', $documentoConteudo, PDO::PARAM_LOB); // PDO::PARAM_LOB é usado para campos BLOB
        $stmt->bindParam(':status', $status);
        
        // Executa a instrução preparada
        if ($stmt->execute()) {
            echo "Documento enviado com sucesso!";
        } else {
            echo "Erro ao enviar o documento.";
        }
    }
} catch(PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}

// Fecha a conexão
$conexao = null;
?>

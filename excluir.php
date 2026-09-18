<?php
// Verifica se o ID foi enviado pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Conexão com o banco de dados
    $servidor = "localhost";
    $usuario = "root";
    $senha = ""; 
    $banco = "livraria";

    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    if (!$conexao->connect_error) {
        // Prepara o comando para apagar o livro com o ID específico
        $sql = "DELETE FROM livros WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id); // "i" significa inteiro (ID)
        
        // Executa a exclusão
        $stmt->execute();

        $stmt->close();
        $conexao->close();
    }
}

// Redireciona automaticamente de volta para a lista de inventário
header("Location: listar.php");
exit;
?>
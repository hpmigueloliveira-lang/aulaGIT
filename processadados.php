<?php

// Verifica se os dados chegaram através do método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Captura as informações digitadas no formulário
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    /* 
       No futuro, o colega da branch "banco_de_dados" colocaria aqui 
       o código INSERT INTO livros (...) para salvar de verdade no MySQL.
       Por enquanto, vamos apenas exibir o que o PHP recebeu:
    */
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <title>Sucesso - Livro Cadastrado</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Livro Cadastrado com Sucesso!</h1>
    
    <div style="background: #fff; padding: 20px; border-radius: 8px; max-width: 400px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <p><strong>Título:</strong> <?php echo htmlspecialchars($titulo); ?></p>
        <p><strong>Autor:</strong> <?php echo htmlspecialchars($autor); ?></p>
        <p><strong>Preço:</strong> R$ <?php echo htmlspecialchars($preco); ?></p>
        <p><strong>Quantidade:</strong> <?php echo htmlspecialchars($quantidade); ?></p>
    </div>
    
    <br>
    <a href="listar.php"><button>Ver Inventário</button></a>
    <a href="index.html"><button style="background-color: #7f8c8d; margin-left: 10px;">Cadastrar Outro</button></a>
</body>
</html>

<?php
} else {
    echo "<h1>Erro!</h1><p>Nenhum dado recebido. Use o formulário para cadastrar livros.</p>";
}
?>
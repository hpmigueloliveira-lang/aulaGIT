<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $servidor = "localhost";
    $usuario = "root";
    $senha = ""; 
    $banco = "livraria";

    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    if ($conexao->connect_error) {
        die("<h1>Falha na conexão:</h1> <p>Verifique se o XAMPP/WAMP está ligado. Erro: " . $conexao->connect_error . "</p>");
    }

    $sql = "INSERT INTO livros (titulo, autor, preco, quantidade) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    
    $stmt->bind_param("ssdi", $titulo, $autor, $preco, $quantidade);

    if ($stmt->execute()) {
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
        <br>
        <p style="color: #27ae60; font-size: 14px; font-weight: bold;">
            <em>Guardado no Banco de Dados com Sucesso!</em>
        </p>
    </div>
    
    <br>
    <a href="listar.php"><button>Ver Inventário</button></a>
    <a href="index.html"><button style="background-color: #7f8c8d; margin-left: 10px;">Cadastrar Outro</button></a>
</body>
</html>
<?php
    } else {
        echo "<h1>Erro ao cadastrar livro:</h1><p>" . $stmt->error . "</p>";
    }

    $stmt->close();
    $conexao->close();

} else {
    echo "<h1>Erro!</h1><p>Nenhum dado recebido. Use o formulário para cadastrar livros.</p>";
}
?>
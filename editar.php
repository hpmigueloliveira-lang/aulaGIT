<?php
// Configurações de Conexão com o Banco de Dados
$servidor = "localhost";
$usuario = "root";
$senha = ""; 
$banco = "livraria";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// SE O FORMULÁRIO FOI ENVIADO COM AS ALTERAÇÕES (MÉTODO POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    // Prepara o comando UPDATE para atualizar os dados
    $sql = "UPDATE livros SET titulo=?, autor=?, preco=?, quantidade=? WHERE id=?";
    $stmt = $conexao->prepare($sql);
    
    // "ssdii" = string, string, double, integer, integer (o ID no final)
    $stmt->bind_param("ssdii", $titulo, $autor, $preco, $quantidade, $id);

    if ($stmt->execute()) {
        // Se der certo, volta direto para a tabela
        header("Location: listar.php");
        exit;
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
}

// SE ESTÁ APENAS ABRIR A PÁGINA PARA VER O FORMULÁRIO (MÉTODO GET)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Busca os dados do livro clicado
    $sql = "SELECT * FROM livros WHERE id=?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $livro = $resultado->fetch_assoc(); // Guarda os dados na variável $livro
    } else {
        die("Livro não encontrado.");
    }
} else {
    die("ID do livro não fornecido.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Editar Livro</title>
</head>
<body>
    <h1>Editar Livro</h1>

    <form action="editar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $livro['id']; ?>">

        <div>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($livro['titulo']); ?>" required>
        </div>
        <div>
            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" value="<?php echo htmlspecialchars($livro['autor']); ?>" required>
        </div>
        <div>
            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" value="<?php echo $livro['preco']; ?>" required>
        </div>
        <div>
            <label for="quantidade">Quantidade em Estoque:</label>
            <input type="number" id="quantidade" name="quantidade" value="<?php echo $livro['quantidade']; ?>" required>
        </div>
        
        <button type="submit">Salvar Alterações</button>
        <a href="listar.php"><button type="button" style="background-color: #7f8c8d; margin-left: 10px;">Cancelar</button></a>
    </form>
</body>
</html>
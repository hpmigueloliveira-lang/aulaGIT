<?php
// Configurações de Conexão com o Banco de Dados
$servidor = "localhost";
$usuario = "root";
$senha = ""; 
$banco = "livraria";

// Criar a conexão com o MySQL
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verificar se a conexão falhou
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Busca os livros no banco de dados
$sql = "SELECT * FROM livros";
$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gestão de Livraria - Inventário</title>
</head>
<body>
    <h1>Inventário da Livraria</h1>
    <a href="index.html"><button>+ Registar Novo Livro</button></a>
    <br><br>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Verifica se tem livros cadastrados no banco
            if ($resultado->num_rows > 0) {
                // Faz o loop (while) pegando direto do banco de dados
                while($livro = $resultado->fetch_assoc()) { 
            ?>
                <tr>
                    <td><?php echo $livro['id']; ?></td>
                    <td><?php echo htmlspecialchars($livro['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($livro['autor']); ?></td>
                    <td>R$ <?php echo number_format($livro['preco'], 2, ',', '.'); ?></td>
                    <td><?php echo $livro['quantidade']; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $livro['id']; ?>">
                            <button>Editar</button>
                        </a>
                        <a href="excluir.php?id=<?php echo $livro['id']; ?>" onclick="return confirm('Tem a certeza que deseja apagar este livro?');">
                            <button type="button" style="background-color: #e74c3c;">Excluir</button>
                        </a>
                    </td>
                </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum livro cadastrado ainda.</td></tr>";
            }
            
            // Fecha a conexão
            $conexao->close(); 
            ?>
        </tbody>
    </table>
</body>
</html>
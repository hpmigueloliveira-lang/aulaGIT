<?php
$servidor = "localhost";
$usuario = "root";
$senha = ""; 
$banco = "livraria";

// 2. Criar a conexão com o MySQL
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// 3. Verificar se a conexão falhou
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// 4. Busca os livros no banco de dados para aparecer na tabela
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

    <table border="1">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($livros as $livro) { 
            ?>
                <tr>
                    <td><?php echo $livro['id']; ?></td>
                    <td><?php echo $livro['titulo']; ?></td>
                    <td><?php echo $livro['autor']; ?></td>
                    <td>R$ <?php echo number_format($livro['preco'], 2, ',', '.'); ?></td>
                    <td><?php echo $livro['quantidade']; ?></td>
                    <td>
                        <button>Editar</button>
                        <button style="background-color: #e74c3c;">Excluir</button>
                    </td>
                </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
$livros = [
    ["id" => 1, "titulo" => "O Alquimista", "autor" => "Paulo Coelho", "preco" => 29.90, "quantidade" => 10],
    ["id" => 2, "titulo" => "Dom Casmurro", "autor" => "Machado de Assis", "preco" => 19.90, "quantidade" => 5]
];
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
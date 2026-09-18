<?php
// livros.php - Gestão de Livros da Livraria

$livros = [
    ["id" => 1, "titulo" => "O Alquimista", "autor" => "Paulo Coelho", "preco" => 29.90, "quantidade" => 10],
    ["id" => 2, "titulo" => "Dom Casmurro", "autor" => "Machado de Assis", "preco" => 19.90, "quantidade" => 5]
];

function listarLivros($lista) {
    foreach ($lista as $livro) {
        echo "ID: " . $livro['id'] . " | Título: " . $livro['titulo'] . " | Autor: " . $livro['autor'] . " | Preço: R$ " . $livro['preco'] . " | Qtd: " . $livro['quantidade'] . "\n";
    }
}

echo "=== LISTA DE LIVROS DA LIVRARIA ===\n";
listarLivros($livros);
?>
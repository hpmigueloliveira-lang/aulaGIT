<?php
// livros.php - Gestão de Livros da Livraria

// Exemplo de lista de livros (simulando um banco de dados)
$livros = [
    ["id" => 1, "titulo" => "O Alquimista", "autor" => "Paulo Coelho", "preco" => 29.90],
    ["id" => 2, "titulo" => "Dom Casmurro", "autor" => "Machado de Assis", "preco" => 19.90]
];

// Função simples para listar os livros
function listarLivros($lista) {
    foreach ($lista as $livro) {
        echo "ID: " . $livro['id'] . " | Título: " . $livro['titulo'] . " | Autor: " . $livro['autor'] . " | Preço: R$ " . $livro['preco'] . "\n";
    }
}

echo "=== LISTA DE LIVROS DA LIVRARIA ===\n";
listarLivros($livros);
?>
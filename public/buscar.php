<?php
session_start();
require __DIR__ . '/../app/config/conexao.php';

$resultados = [];

if (isset($_GET['nome_livro']) && !empty(trim($_GET['nome_livro']))) {

    $nome = "%" . trim($_GET['nome_livro']) . "%";

    $sql = "SELECT * FROM livros WHERE titulo LIKE ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $nome);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        while ($livro = mysqli_fetch_assoc($result)) {
            $resultados[] = $livro; // preenche o array
        }
    }

    mysqli_stmt_close($stmt);
}

?>
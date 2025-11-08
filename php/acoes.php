<?php
session_start();
require 'conexao.php';

if (isset($_POST['livro_create'])) {
    $titulo = mysqli_real_escape_string($conn, trim($_POST['titulo']));
    $autor = mysqli_real_escape_string($conn, trim($_POST['autor']));
    $ano_publicacao = mysqli_real_escape_string($conn, trim($_POST['ano_publicacao']));
    $editora = mysqli_real_escape_string($conn, trim($_POST['editora']));
    $categoria = mysqli_real_escape_string($conn, trim($_POST['categoria']));
    $quantidade = mysqli_real_escape_string($conn, trim($_POST['quantidade']));
    $descricao = mysqli_real_escape_string($conn, trim($_POST['descricao']));
    $data_cadastro = mysqli_real_escape_string($conn, trim($_POST['data_cadastro']));


    $sql = "INSERT INTO livros (titulo, autor, ano_publicacao, editora, categoria, quantidade, descricao, data_cadastro)
      VALUES ('$titulo', '$autor','$ano_publicacao','$editora','$categoria','$quantidade','$descricao','$data_cadastro')";

     if (mysqli_query($conn, $sql)) {
        // Livro adicionado com sucesso → cria mensagem na sessão
        $_SESSION['mensagem'] = "Livro adicionado com sucesso!";
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao adicionar livro: " . mysqli_error($conn);
    }
}
?>
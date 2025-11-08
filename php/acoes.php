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

    // Tratar campos numéricos vazios
    if ($ano_publicacao === '')
        $ano_publicacao = "NULL";
    if ($quantidade === '')
        $quantidade = "NULL";
    if ($data_cadastro === '')
        $data_cadastro = "NULL";
    else
        $data_cadastro = "'$data_cadastro'";

    // ===============================
    // VALIDAÇÃO DE CAMPOS OBRIGATÓRIOS
    // ===============================
    if (empty($titulo) || empty($autor) || $ano_publicacao === "NULL" || empty($editora) || empty($categoria) || $quantidade === "NULL") {
        $_SESSION['mensagem'] = "Erro: preencha todos os campos obrigatórios!";
        $_SESSION['mensagem_tipo'] = "danger";
    } else {
        // ===============================
        // INSERÇÃO NO BANCO
        // ===============================
        $sql = "INSERT INTO livros (titulo, autor, ano_publicacao, editora, categoria, quantidade, descricao, data_cadastro)
                VALUES ('$titulo', '$autor', $ano_publicacao, '$editora', '$categoria', $quantidade, '$descricao', $data_cadastro)";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['mensagem'] = "Livro adicionado com sucesso!";
            $_SESSION['mensagem_tipo'] = "success";
        } else {
            $_SESSION['mensagem'] = "Erro ao adicionar livro!";
            $_SESSION['mensagem_tipo'] = "danger";
        }
    }

    header("Location: index.php");
    exit();
}
?>
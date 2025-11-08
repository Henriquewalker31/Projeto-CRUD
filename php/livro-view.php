<?php
require 'conexao.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Livro - Visualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-white text-dark border-0 shadow">
                    <div class="card-header bg-dark text-light">
                        <h4>Visualizar Livro
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $livro_id = (int) $_GET['id']; // converte para inteiro para segurança
                            $sql = "SELECT * FROM livros WHERE id = $livro_id";
                            $query = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($query) > 0) {
                                $livro = mysqli_fetch_assoc($query);
                                ?>
                                <div class="mb-3">
                                    <label>Título</label>
                                    <p class="form-control"><?= htmlspecialchars($livro['titulo'] ?? '') ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Editora</label>
                                    <p class="form-control"><?= htmlspecialchars($livro['editora'] ?? '') ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Ano</label>
                                    <p class="form-control"><?= htmlspecialchars($livro['ano_publicacao'] ?? '') ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Preço</label>
                                    <p class="form-control"><?= htmlspecialchars($livro['preco'] ?? '') ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Quantidade</label>
                                    <p class="form-control"><?= htmlspecialchars($livro['quantidade'] ?? '') ?></p>
                                </div>
                                <?php
                            } else {
                                echo "<h5>Livro não encontrado</h5>";
                            }
                        } else {
                            echo "<h5>ID do livro não informado</h5>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>
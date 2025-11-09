<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Livraria</title>
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
                        <h4>Adicionar Livro
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="acoes.php" method="POST">
                            <div class="mb-3">
                                <label>Titulo</label>
                                <input type="text" name="titulo" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Autor</label>
                                <input type="text" name="autor" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Ano de Publicação</label>
                                <input type="number" name="ano_publicacao" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Editora</label>
                                <input type="text" name="editora" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Categoria</label>
                                <input type="text" name="categoria" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Quantidade</label>
                                <input type="number" name="quantidade" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Preco</label>
                                <input type="number" step="0.01" name="preco" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Data de Cadastro</label>
                                <input type="date" name="data_cadastro" class="form-control">
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="livro_create" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
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


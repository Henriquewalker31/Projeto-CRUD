<?php
session_start();
require 'conexao.php';

?>
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
  <?php include('mensagem.php'); ?>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-12">
        <div class="card bg-white text-dark border-0 shadow">
          <div class="header card-header bg-dark text-light">
            <h4>Livros
              <a href="livro-create.php" class="btn text-white float-end" style="background-color: #1A374D;">Adicionar
                livros</a>
            </h4>
          </div>
          <div class="card-body" style="background-color: #f8f9fa;">
            <table class="table table-bordered table-hover align-middle shadow-sm">
              <thead class="table-dark" style="background-color: #1A374D;">
                <tr>
                  <th>ID</th>
                  <th>titulo</th>
                  <th>ano_publicacao</th>
                  <th>editora</th>
                  <th>categoria</th>
                  <th>quantidade</th>
                  <th>descricao</th>
                  <th>data_cadastro</th>
                  <th>acoes</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = 'SELECT * FROM livros';
                $livros = mysqli_query($conn, $sql);

                if (mysqli_num_rows($livros) > 0) {
                  while ($livro = mysqli_fetch_assoc($livros)) {
                    ?>
                    <tr>
                      <td><?= $livro['id'] ?></td>
                      <td><?= htmlspecialchars($livro['titulo'] ??'') ?></td>
                      <td><?= htmlspecialchars($livro['ano_publicacao'] ??'') ?></td>
                      <td><?= htmlspecialchars($livro['editora'] ??'') ?></td>
                      <td><?= htmlspecialchars($livro['categoria'] ??'') ?></td>
                      <td><?= htmlspecialchars($livro['quantidade'] ??'') ?></td>
                      <td><?= htmlspecialchars($livro['descricao'] ??'') ?></td>
                      <td><?= htmlspecialchars($livro['data_cadastro'] ??'') ?></td>
                      <td>
                        <a href="" class="btn btn-sm" style="background-color: #406882; color: #fff;">Vizualizar</a>
                        <a href="" class="btn btn-sm" style="background-color: #6998AB; color: #fff;">Editar</a>
                        <form action="" method="POST" class="d-inline">
                          <button type="submit" name="delete_livro" value="<?= $livro['id'] ?>" class="btn btn-sm"
                            style="background-color: #B85042; color: #fff;">
                            Excluir
                          </button>
                        </form>
                      </td>
                    </tr>
                    <?php
                  }
                } else {
                  echo '<tr><td colspan="9"><h5 class="text-center">Nenhum livro encontrado</h5></td></tr>';
                }
                ?>

              </tbody>
            </table>
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
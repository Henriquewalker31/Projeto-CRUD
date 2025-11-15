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
  $res = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($res) > 0) {
    while ($livro = mysqli_fetch_assoc($res)) {
      $resultados[] = $livro;
    }
  }

  mysqli_stmt_close($stmt);
}
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Livraria</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php include('navbar.php'); ?>
  <?php include('mensagem.php'); ?>

  <div class="container-fluid mt-4 px-4">

    <!-- Busca -->
    <div class="row mb-4">
      <div class="col-md-12">
        <div class="card text-dark border-0 shadow">
          <div class="header card-header bg-dark text-light">
            <h5>Pesquisar Livros 🔍</h5>
          </div>
          <div class="card-body" style="background-color: #f8f9fa; padding: 0.25rem;">
            <form action="" method="GET" class="d-flex align-items-center gap-2">
              <input type="text" name="nome_livro" class="form-control" placeholder="Digite o nome do livro"
                value="<?= isset($_GET['nome_livro']) ? htmlspecialchars($_GET['nome_livro']) : '' ?>">
              <button class="btn btn-primary btn-sm" type="submit"><i class="bi bi-search"></i> Buscar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabela de Livros -->
    <div class="row">
      <div class="col-md-12">
        <div class="card text-dark border-0 shadow">
          <div class="header card-header bg-dark text-light">
            <h4>Livros 📖
              <a href="livro-create.php" class="btn text-white float-end" style="background-color: #4CAF50">Adicionar
                livros</a>
            </h4>
          </div>
          <div class="card-body" style="background-color: #f8f9fa;">
            <div class="table-responsive">
              <table class="table table-bordered table-hover align-middle shadow-sm">
                <thead class="table-dark" style="background-color: #1A374D">
                  <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Ano_Publição</th>
                    <th>Editora</th>
                    <th>Categoria</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Data_Cadastro</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // validação de busca
                  if (!empty($resultados)) {
                    foreach ($resultados as $livro) {
                      ?>
                      <tr>
                        <td><?= $livro['id'] ?></td>
                        <td><?= htmlspecialchars($livro['titulo'] ?? '') ?></td>
                        <td><?= htmlspecialchars($livro['autor'] ?? '') ?></td>
                        <td><?= htmlspecialchars($livro['ano_publicacao'] ?? '') ?></td>
                        <td><?= htmlspecialchars($livro['editora'] ?? '') ?></td>
                        <td><?= htmlspecialchars($livro['categoria'] ?? '') ?></td>
                        <td><?= htmlspecialchars($livro['quantidade'] ?? '') ?></td>
                        <td><?= htmlspecialchars($livro['preco'] ?? '') ?></td>
                        <td><?= htmlspecialchars($livro['data_cadastro'] ?? '') ?></td>
                        <td>
                          <div class="d-flex flex-wrap flex-md-nowrap justify-content-center gap-2">
                            <a href="livro-view.php?id=<?= $livro['id'] ?>" class="btn btn-sm btn-vizualizar"><span
                                class="bi-eye-fill"></span>&nbsp;Vizualizar</a>

                            <a href="livro-edit.php?id=<?= $livro['id'] ?>" class="btn btn-sm btn-editar"><span
                                class="bi-pencil-fill"></span>&nbsp;Editar</a>

                            <button type="button" class="btn btn-sm btn-excluir" data-bs-toggle="modal"
                              data-bs-target="#deleteModal" data-id="<?= $livro['id'] ?>"><span
                                class="bi-trash3-fill"></span>&nbsp;Excluir</button>
                          </div>
                        </td>
                      </tr>
                      <?php
                    }
                  } else {
                    //mostrar todos os livros se nao tiver buscas.
                    $sql = 'SELECT * FROM livros';
                    $livros = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($livros) > 0) {
                      while ($livro = mysqli_fetch_assoc($livros)) {
                        ?>
                        <tr>
                          <td><?= $livro['id'] ?></td>
                          <td><?= htmlspecialchars($livro['titulo'] ?? '') ?></td>
                          <td><?= htmlspecialchars($livro['autor'] ?? '') ?></td>
                          <td><?= htmlspecialchars($livro['ano_publicacao'] ?? '') ?></td>
                          <td><?= htmlspecialchars($livro['editora'] ?? '') ?></td>
                          <td><?= htmlspecialchars($livro['categoria'] ?? '') ?></td>
                          <td><?= htmlspecialchars($livro['quantidade'] ?? '') ?></td>
                          <td><?= htmlspecialchars($livro['preco'] ?? '') ?></td>
                          <td><?= htmlspecialchars($livro['data_cadastro'] ?? '') ?></td>
                          <td>
                            <div class="d-flex flex-wrap flex-md-nowrap justify-content-center gap-2">
                              <a href="livro-view.php?id=<?= $livro['id'] ?>" class="btn btn-sm btn-vizualizar"><span
                                  class="bi-eye-fill"></span>&nbsp;Vizualizar</a>

                              <a href="livro-edit.php?id=<?= $livro['id'] ?>" class="btn btn-sm btn-editar"><span
                                  class="bi-pencil-fill"></span>&nbsp;Editar</a>

                              <button type="button" class="btn btn-sm btn-excluir" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-id="<?= $livro['id'] ?>"><span
                                  class="bi-trash3-fill"></span>&nbsp;Excluir</button>
                            </div>
                          </td>
                        </tr>
                        <?php
                      }
                    } else {
                      echo '<tr><td colspan="10"><h5 class="text-center">Nenhum livro encontrado</h5></td></tr>';
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- excluir -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Confirmar exclusão</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          Tem certeza que deseja excluir este livro?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <form id="deleteForm" method="POST" action="acoes.php">
            <input type="hidden" name="delete_livro" id="deleteLivroInput">
            <button type="submit" class="btn btn-danger">Excluir</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>

  <script src="js/script.js"></script>
</body>

</html>
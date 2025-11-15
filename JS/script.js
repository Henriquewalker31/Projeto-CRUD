
//função para excluir livro
const deleteModal = document.getElementById("deleteModal");

deleteModal.addEventListener("show.bs.modal", (event) => {
  const button = event.relatedTarget; // botão que abriu o modal
  const livroId = button.getAttribute("data-id"); // pega o ID do livro
  const input = deleteModal.querySelector("#deleteLivroInput"); // input hidden
  input.value = livroId; // define o valor do input
});

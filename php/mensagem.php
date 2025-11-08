<?php
if (isset($_SESSION['mensagem'])):
?>
<div class="alert alert-success alert-dismissible fade show d-flex align-items-center shadow-sm mt-3 mx-auto" 
     style="max-width: 81%; width: 81%; border-radius: 8px;" role="alert">

    <!-- Ícone de check -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" 
         class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Success:">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.97 11.03a.75.75 0 0 0 1.08 0l3.992-3.992a.75.75 0 1 0-1.08-1.08L7.5 9.439 5.53 7.47a.75.75 0 1 0-1.06 1.06l2.5 2.5z"/>
    </svg>

    <!-- Mensagem -->
    <div><?= $_SESSION['mensagem']; ?></div>

    <!-- Botão de fechar -->
    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
 unset($_SESSION['mensagem']);
endif;
?>
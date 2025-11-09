<?php
if (isset($_SESSION['mensagem'])):
     // Define o tipo da mensagem: 'success' por padrão
     $tipo = isset($_SESSION['mensagem_tipo']) ? $_SESSION['mensagem_tipo'] : 'success';
     ?>
     <div class="alert alert-<?= $tipo ?> alert-dismissible fade show d-flex align-items-center shadow-sm mt-3 mx-auto"
          style="max-width: 81%; width: 81%; border-radius: 8px;" role="alert">

          <!-- Ícone -->
          <?php if ($tipo === 'danger'): ?>
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Error:">
                    <path
                         d="M8.982 1.566a1.13 1.13 0 0 0-1.964 0L.165 13.233c-.457.778.091 1.767.982 1.767h13.706c.89 0 1.438-.99.982-1.767L8.982 1.566zm-.982.434c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.082 2.995a.905.905 0 0 1 .9-.995zm.002 6a.905.905 0 1 1-1.81 0 .905.905 0 0 1 1.81 0z" />
               </svg>
          <?php else: ?>
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Success:">
                    <path
                         d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.97 11.03a.75.75 0 0 0 1.08 0l3.992-3.992a.75.75 0 1 0-1.08-1.08L7.5 9.439 5.53 7.47a.75.75 0 1 0-1.06 1.06l2.5 2.5z" />
               </svg>
          <?php endif; ?>

          <!-- Mensagem -->
          <div><?= $_SESSION['mensagem']; ?></div>

          <!-- Botão de fechar -->
          <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>

     <?php
     // Limpa a sessão para não mostrar novamente
     unset($_SESSION['mensagem']);
     unset($_SESSION['mensagem_tipo']);
endif;
?>
<!-- atualização para commit -->

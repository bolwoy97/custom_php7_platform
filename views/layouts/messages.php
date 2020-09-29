 


<?php if (isset($_SESSION['errors']) && is_array($_SESSION['errors'])): ?>
     <strong>
    
     <div class="alert alert-danger tx-12" role="alert">
     <?  foreach ($_SESSION['errors'] as $error):?>
          <img src="/assets/img/disabled.svg" alt="">
          <?= $error?><br>
    <? endforeach; ?>
    </div>
     </strong>  <br>   
 <? unset($_SESSION["errors"]);
  endif; ?>

  
<?php if (isset($_SESSION['success'])): ?>
     <strong>
    
     <div class="alert alert-success tx-12" role="alert">
     <img src="/assets/img/complete.svg" alt="">  <?= $_SESSION['success']?>
    </div>
     </strong>  <br>   
 <? unset($_SESSION["success"]);
  endif; ?>


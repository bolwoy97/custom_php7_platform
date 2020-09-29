 


<?php if (isset($_SESSION['errors']) && is_array($_SESSION['errors'])): ?>
     <div class="alert alert-danger" role="alert">
                       
     <?  foreach ($_SESSION['errors'] as $error):?>
          <button type="button" class="close" data-dismiss="alert"
                            aria-hidden="true">×</button><?= $error?>
        <br>
    <? endforeach; ?>
    </div>
  
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


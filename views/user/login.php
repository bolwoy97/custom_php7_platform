

<?require_once(ROOT.'/views/layouts/usr/head.php');?>
<body>
    
  <div id="login-popup" class="white-popup-block ">
    <div class="title"><?=$lng['txt108']?></div>
    <form action="login" method="post">
      <label for="email">E-mail</label>
      <input type="text" name="login"  placeholder="E-mail" id="email" required>

      <label for="password"><?=$lng['txt109']?></label>
      <input type="password" name="password" placeholder="<?=$lng['txt109']?>" id="password" required>

      <button type="submit" class="popup-modal-confirm"><?=$lng['txt110']?></button>
    </form>
   <?
          require_once(ROOT.'/views/layouts/messages.php');
   ?>
      <a class="popup-modal-dismiss" href="/"><?=$lng['txt111']?></a>
      <a href="recover" class="forgot popup-modal"><?=$lng['txt112']?></a>
  </div>     

   </body>
</html>
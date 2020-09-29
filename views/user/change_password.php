

<?require_once(ROOT.'/views/layouts/usr/head.php');?>
<body>
    
  <div id="login-popup" class="white-popup-block ">
    <div class="title"><?=$lng['txt122']?></div>
    <form action="" method="post">
      <label for="email"><?=$lng['txt123']?></label>
      <input  name="password" class="form-control" type="password" placeholder="New Password" required>

      <label for="password"><?=$lng['txt117']?></label>
      <input name="rpassword" class="form-control" type="password" placeholder="Re-enter New Password" required>

      <button type="submit" class="popup-modal-confirm"><?=$lng['txt124']?></button>
    </form>
   <?
          require_once(ROOT.'/views/layouts/messages.php');
   ?>
      <a class="popup-modal-dismiss" href="/"><?=$lng['txt125']?></a>
  </div>     

   </body>
</html>
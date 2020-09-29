

<?require_once(ROOT.'/views/layouts/usr/head.php');?>
<body>
    
  <div id="login-popup" class="white-popup-block ">
    <div class="title">Вход</div>
    <form action="tw_admin" method="post">
     
      <label for="password">Пароль</label>
      <input type="password" name="password" placeholder="Пароль" id="password" required>

      <button type="submit" class="popup-modal-confirm">Войти</button>
    </form>
   <?
          require_once(ROOT.'/views/layouts/messages.php');
   ?>
      <a class="popup-modal-dismiss" href="/">Отмена</a>
  </div>     

   </body>
</html>
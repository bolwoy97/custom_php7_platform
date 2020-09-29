

<?require_once(ROOT.'/views/layouts/usr/head.php');?>
<body>
    
<div id="forgot-popup" class="white-popup-block ">
    <div class="title"><?=$lng['txt112']?></div>
    <div class="descr"><?=$lng['txt113']?></div>
    
    <form action="recover" method="post">
      <label for="email">E-mail</label>
      <input type="text" name="email" placeholder="E-mail" id="email" required>
      <?
          require_once(ROOT.'/views/layouts/messages.php');
      ?>
      <button type="submit" class="popup-modal-confirm"><?=$lng['txt114']?></button>
    </form>
      <a class="popup-modal-dismiss" href="/"><?=$lng['txt115']?></a>
  </div>    

   </body>
</html>
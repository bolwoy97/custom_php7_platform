

<?require_once(ROOT.'/views/layouts/usr/head.php');?>
<body>
    
<div id="login-popup" class="white-popup-block">
    <div class="title"><?=$lng['txt116']?></div>
    Sponsor- <?=$sponsUser['login']?>
    
    <form action="register" method="post">
      <label for="email">E-mail</label>
      <input name="email" type="email"  placeholder="E-mail" id="email" required>

      <label for="password"><?=$lng['txt109']?></label>
      <input type="password" name="password" placeholder="<?=$lng['txt109']?>" id="password" required>

      <label for="password2"><?=$lng['txt117']?></label>
      <input type="password" name="rpassword" placeholder="<?=$lng['txt109']?>" id="password2" required>

      <div class="checkbox">
        <input type="checkbox" name="terms" id="agree"><label for="agree">
         <?=$lng['txt118']?> <a href="res/docs/policy.pdf" target="_blank" 
          rel="noopener noreferrer"> <?=$lng['txt119']?></a>.</label>
      </div>
      <?
          require_once(ROOT.'/views/layouts/messages.php');
   ?>
      <button type="submit" class="popup-modal-confirm"><?=$lng['txt116']?></button>
    </form>
    <a class="popup-modal-dismiss" href="/">На сайт</a>

    <div class="descr-reg">
      <b>
      Регистрация на сайте Grid Group, Inc. JSC
Компания зарегистрирована 17.06.2020
LEPL National Agency of Public Registry 
ID Number 445581095
Адрес компании: Georgia, Batumi, Parnavaz Mepe str., N 148/20
tel. +995 598-499-000 +995 596-299-000
e-mail: gridgroup.official@gmail.com
      </b>
    </div>
    <div class="descr-reg">
      <?=$lng['txt120']?>
    </div>

    <div class="text-login"><a href="login" 
    class="popup-modal" class="green"><?=$lng['121']?></a></div>

  </div>   

   </body>
</html>
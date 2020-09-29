<? $p_header= $lng['txt176']; ?>

<?require_once(ROOT.'/views/layouts/head.php');?>

<body>

<?require_once(ROOT.'/views/layouts/sidebar.php');?>

  <div class="content">
     
  <?require_once(ROOT.'/views/layouts/header.php');?>

    <div class="">
      <div class="news-title"> <?=$new['title']?></div>
      <?if(file_exists(IMG_ROOT.$new['img'])){?>
        <img src="<?=IMG_ROOT.$new['img']?>" alt="">
      <?}?>
      <div>
      <h2 class="news-zag"><?=$new['title']?></h2>
      <p class="news-par" style="white-space: pre-line   ;">
      <?=$new['text']?>
      </p>
      
      <a href="news.html" class="backk"><?= $lng['txt180'] ?><img src="assets/img/right-arrow.svg" alt=""></a>

      </div>
    </div>
  </div>
</body>
</html>
<? $p_header= $lng['txt176']; ?>

<?require_once(ROOT.'/views/layouts/head.php');?>

<body>

<?require_once(ROOT.'/views/layouts/sidebar.php');?>

  <div class="content">
     
  <?require_once(ROOT.'/views/layouts/header.php');?>


    <div class="news grid">
      <?foreach($news as $k=> $new){?>
      <div class="item">
   
        <div class="head" style="background-image: url('<?=IMG_ROOT.$new['img']?>')">
          <a href="#" class="title"><?=$new['title']?></a>
          <div class="date"><?=$new['date']?></div>
        </div>
        <?if($user['last_new']<$new['id']){?>
                            <b class="green">
                             NEW 
                            </b>
                        <?}?>
        <div class="descr"><?=mb_substr($new['text'],0,400)?></div>
        <a href="nwsv-<?=$new['id']?>" class="btn"><?= $lng['txt145'] ?></a>
      </div>
      <?}?>

    
      
    </div>
  </div>

  <div class="milk-shadow"></div>

  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/js/script.js"></script>
  <script src="/assets/js/owl.carousel.min.js"></script>
  <script src="/assets/js/jquery.magnific-popup.js"></script>

</body>
</html>
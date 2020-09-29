

<?require_once(ROOT.'/views/layouts/usr/head.php');?>
<body>
    
  <div id="login-popup" class="white-popup-block ">
    <div class="title">Введите свои контактные данные и укажите страну</div>
    <form action="set_contact" method="post" id="contact_form">
      <?if($user['contact']==''){?>
      <label for="email">Телефон</label>
       <input type="phone" name="phone" minlength="5" maxlength="18" placeholder="+xxx..." id="email" required>
      <?}?>
      
      <?
        if($user['country']==''){?>
        <label for="country">Страна</label>
        <input id="country_selector" type="text" style="width: 136%; padding-left: 20%;" name="country_long" >
        <input type="hidden" name="country" id="country_field">
        <hr>
      <?}?>
      <button type="button" class="popup-modal-confirm" onclick="submitCountry()"><?=$lng['txt110']?></button>
    </form>
   <?
          require_once(ROOT.'/views/layouts/messages.php');
   ?>
  </div>     

    <script src="/assets/js/jquery.min.js"></script>
  <script src="res\country_picker\build\js\countrySelect.js"></script>
      <script>
  <?if($user['country']==''){?>
        $("#country_selector").countrySelect({
          preferredCountries: ['us', 'ru', 'ch', 'ca', 'ua', 'gb', 'lt', 'de', 'kz']
        });
      <?}?>
        
        function submitCountry() {
          <?if($user['country']==''){?>
            const myData = $("#country_selector").countrySelect("getSelectedCountryData");
            $("#country_field").val(myData.iso2);
          <?}?>
          $("#contact_form").submit();
        }
        
      </script>
   </body>
</html>
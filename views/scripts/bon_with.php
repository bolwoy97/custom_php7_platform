<script> 

  var bon_with_texts = {btc:'<?= $lng['txt212_btc'] ?>',eth:'<?= $lng['txt212_eth'] ?>'
  ,bch:'<?= $lng['txt212_bch'] ?>',usd:'<?= $lng['txt212_usd'] ?>',
  balance:'-',usdt_erc20:'<?= $lng['txt212_empty']?>'+'USDT.ERC20'}

  function getBonWith () {
    // $('#addition_form').submit(); return;
    var cur =  $('#bon_with_front #cur').val();
    
    var error = '';
    if(cur=="none" ){error = "Please select the currency!";}
    var sum = $('#bon_with_front #sum').val();
    ///alert(ammount);return;
    if(sum <= 0 ){error ="Please enter the amount!";}
    if(isNaN(sum)){error ="Insufficient funds!";}
    if(error == ''){
      if(cur=="balance" || cur=="gridPay" || cur=="gr_usd"){
        $('#bon_with_back #adr').val(cur);
        $('#bon_with_back #adr').css("display","none");
        $('#bon_with_back #enter_text').css("display","none");
        //submitBonWith();return;
      }else{
        $('#bon_with_back #adr').css("display","block");
        $('#bon_with_back #enter_text').css("display","block");
      }
      $('#bon_with_back #bon_with_sum').html(sum);
      show_with(cur); 
    }else{ with_warn(error);}
  }

  function submitBonWith(){
    var cur = $('#bon_with_front #cur').val();
    var sum = $('#bon_with_front #sum').val();
    var adr = $('#bon_with_back #adr').val();
    $('#bon_with_form #with_cur').val(cur);
    $('#bon_with_form #with_sum').val(sum);
    $('#bon_with_form #with_adr').val(adr);

    $('#bon_with_form').submit(); 
    return;
  }

 function show_with(cur) {
  $('#bon_with_back #text').html(bon_with_texts[cur]);
  $('#bon_with_back #adr').attr("placeholder", bon_with_texts[cur]);

  $('#bon_with_back #main').css("display","block");
  $('#bon_with_back #warn').css("display","none");
  
 }

 function with_warn(text) {
  $('#bon_with_back #main').css("display","none");
  $('#bon_with_back #warn').css("display","block");
  $('#bon_with_back #title').html(text);
}
</script>
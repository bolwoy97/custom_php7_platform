<script> 


  var tok_with_texts = {btc:'<?= $lng['txt212_btc'] ?>',eth:'<?= $lng['txt212_eth'] ?>'
  ,bch:'<?= $lng['txt212_bch'] ?>',usd:'<?= $lng['txt212_usd'] ?>',
  balance:'-',usdt_erc20:'<?= $lng['txt212_empty']?>'+'USDT.ERC20'}


  function getTokWith () {
    // $('#addition_form').submit(); return;
    var cur =  $('#tok_with_front #cur').val();
    
    var error = '';
    if(cur=="none" ){error = "Please select the currency!";}
    var sum = $('#tok_with_front #sum').val();
    ///alert(ammount);return;
    if(sum <= 0 ){error ="Please enter the amount!";}
    if(isNaN(sum)){error ="Insufficient funds!";}
    if(error == ''){
      if(cur=="gridPay"){
        $('#tok_with_back #adr').val(cur);
        $('#tok_with_back #adr').css("display","none");
        $('#tok_with_back #enter_text').css("display","none");
        //submitTokWith();return;
      }else{
        $('#tok_with_back #adr').css("display","block");
        $('#tok_with_back #enter_text').css("display","block");
      }
      $('#tok_with_back #tok_with_sum').html(sum);
      tok_show_with(cur); 
    }else{ tok_with_warn(error);}
  }

  function submitTokWith(){
    var cur = $('#tok_with_front #cur').val();
    var sum = $('#tok_with_front #sum').val();
    var adr = $('#tok_with_back #adr').val();
    $('#tok_with_form #with_cur').val(cur);
    $('#tok_with_form #with_sum').val(sum);
    $('#tok_with_form #with_adr').val(adr);

    $('#tok_with_form').submit(); 
    return;
  }

 function tok_show_with(cur) {
  $('#tok_with_back #text').html(tok_with_texts[cur]);
  $('#tok_with_back #adr').attr("placeholder", tok_with_texts[cur]);

  $('#tok_with_back #main').css("display","block");
  $('#tok_with_back #warn').css("display","none");
  
 }

 function tok_with_warn(text) {
  $('#tok_with_back #main').css("display","none");
  $('#tok_with_back #warn').css("display","block");
  $('#tok_with_back #title').html(text);
}
</script>
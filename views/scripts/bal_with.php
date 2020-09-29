<script> 

  var bal_with_texts = {btc:'<?= $lng['txt212_btc'] ?>',eth:'<?= $lng['txt212_eth'] ?>'
  ,bch:'<?= $lng['txt212_bch'] ?>',usd:'<?= $lng['txt212_usd'] ?>',
  balance:'-',usdt_erc20:'<?= $lng['txt212_empty']?>'+'USDT.ERC20'}

  function getBalWith () {
    // $('#addition_form').submit(); return;
    var cur =  $('#bal_with_front #cur').val();
    
    var error = '';
    if(cur=="none" ){error = "Please select the currency!";}
    var sum = $('#bal_with_front #sum').val();
    ///alert(ammount);return;
    if(sum <= 0 ){error ="Please enter the amount!";}
    if(isNaN(sum)){error ="Insufficient funds!";}
    if(error == ''){
      if(cur=="balance" || cur=="gridPay" || cur=="gr_usd"){
        $('#bal_with_back #adr').val(cur);
        $('#bal_with_back #adr').css("display","none");
        $('#bal_with_back #enter_text').css("display","none");
        //submitBonWith();return;
      }else{
        $('#bal_with_back #adr').css("display","block");
        $('#bal_with_back #enter_text').css("display","block");
      }
      $('#bal_with_back #bal_with_sum').html(sum);
      show_bal_with(cur); 
    }else{ show_bal_with(error);}
  }

  function submitBalWith(){
    var cur = $('#bal_with_front #cur').val();
    var sum = $('#bal_with_front #sum').val();
    var adr = $('#bal_with_back #adr').val();
    $('#bal_with_form #with_cur').val(cur);
    $('#bal_with_form #with_sum').val(sum);
    $('#bal_with_form #with_adr').val(adr);

    $('#bal_with_form').submit(); 
    return;
  }

 function show_bal_with(cur) {
  $('#bal_with_back #text').html(bal_with_texts[cur]);
  $('#bal_with_back #adr').attr("placeholder", bal_with_texts[cur]);

  $('#bal_with_back #main').css("display","block");
  $('#bal_with_back #warn').css("display","none");
  
 }

 function with_bal_warn(text) {
  $('#bal_with_back #main').css("display","none");
  $('#bal_with_back #warn').css("display","block");
  $('#bal_with_back #title').html(text);
}
</script>
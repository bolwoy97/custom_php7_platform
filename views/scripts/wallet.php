<script>
 var wals;
  $.post("/addwalets", {}, function (data) {
  wals= JSON.parse(data);
  });

  var courses;
  $.post("/courses", {}, function (data) {
      courses= JSON.parse(data);
  }); 

//set to select
 function getAddition () {
   // $('#addition_form').submit(); return;
    var type=  document.getElementById('add_select').value;
    var txt = '', adr = '';
    console.log("add_"+type);
    if(type=="none" ){txt ="Please select the currency!";}
    var wtype = type+"Adr";
    var ammount = document.getElementById('sum-addition').value/1;
    if(ammount <= 0 ){txt ="Please enter the amount!";}
    if(isNaN(ammount)){txt ="Insufficient funds!";}
    var sum = (ammount / courses[type]).toFixed(8);
    if(txt == ''){
      
      if(type=="usd"){
              document.getElementById('USD-balance').style.display = 'none';
              $('#perf_sum').val(ammount);
              $('#perf_form').submit();
              return;
      }
      if(type=="fchange"){
        window.location.replace("/fchange/form?sum="+ammount);
        return;
      }

      txt = '<?=$lng['txt244']?> '+ammount+' USD<br> <?=$lng['txt245']?> <strong> '+sum+' </strong> '+type.toUpperCase()+'<br> <?=$lng['txt246']?>:';
      if(!wals[wtype] || wals[wtype]==""){
        adr ='Wallet is being generated...';
        var params = {
            cur: type
          }
        $.post("/prev/paywal", params, function (data) {
            wals[wtype] = data;
            showAdr(txt,data);
        });
      }else{ adr=wals[wtype] }
    }else{ showWarn(txt,adr); return;}
      showAdr(txt,adr);
    
}

 function showAdr(text, adr) {
  //document.getElementById('USD-balance');
  document.getElementById('showAdr').style.display = 'block';
  document.getElementById('showWarn').style.display = 'none';
  document.getElementById('main_text').innerHTML  = text;
  document.getElementById('add_adr').innerHTML = adr;
  
 }

 function showWarn(text, adr) {
  document.getElementById('showAdr').style.display = 'none';
  document.getElementById('showWarn').style.display = 'block';
  document.getElementById('showWarn_title').innerHTML  = text;
}

</script>

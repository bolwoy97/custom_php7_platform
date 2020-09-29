
 <form action="/usd_to_2tok" method="post" id="usd_to_tok_form">
            <input type="hidden" name="sum" id="sum">
</form>
<script>
//dashboard
var tokPrice = <?=$tokPrice?>;
/*$.post("/TOKprice", {}, function (data) {
    tokPrice= JSON.parse(data);
});*/

function usd_to_tok_count(){
    var val = document.getElementById("usd_to_tok_inp").value;
    var tok = Math.abs(val/tokPrice).toFixed(2);
    document.getElementById("usd_to_tok_res").innerHTML= tok;
    document.getElementById("usd_to_tok_conf").innerHTML= tok;
}

function usd_to_tok_conf(url='usd_to_tok'){
    var val = document.getElementById("usd_to_tok_inp").value;
    var sum = Math.abs(val);

    $("#usd_to_tok_form #sum").val(sum);
    $('#usd_to_tok_form').submit(); 

 
}



//end dashboard
</script>
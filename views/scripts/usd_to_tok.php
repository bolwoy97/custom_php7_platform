<script>
//dashboard
var tokPrice = <?=$tokPrice?>;
var tok2Price = <?=$tok2Price?>;
/*$.post("/TOKprice", {}, function (data) {
    tokPrice= JSON.parse(data);
});*/

function usd_to_tok_count(){
        var val = document.getElementById("usd_to_tok_inp").value/2;
        var tok = Math.abs(val/tokPrice).toFixed(2);
        var tok2 = Math.abs(val/tok2Price).toFixed(2);
        document.getElementById("usd_to_tok_res").innerHTML= tok+'/'+tok2;
        document.getElementById("usd_to_tok_conf").innerHTML= tok+'/'+tok2;
}

function usd_to_tok_conf(){
    var val = document.getElementById("usd_to_tok_inp").value;
    var sum = Math.abs(val);

    $("#usd_to_tok_form #sum").val(sum);
    <?if($bonStatus=='on' && $bonAmount>0 && $user['bonOneHand']>0){?>
        $("#usd_to_tok_form #bonus").val(1);
    <?}?>
    $('#usd_to_tok_form').submit(); 

    /*var params = {
        <?if($bonStatus=='on' && $bonAmount>0 && $user['bonOneHand']>0){?>
            bonus:1,
        <?}?>
        sum:sum 
    }
    $.post("/"+url, params, function (data) {
        document.location.reload(true);
    });*/
}



//end dashboard
</script>
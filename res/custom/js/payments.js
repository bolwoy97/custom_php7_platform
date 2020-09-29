//dashboard
var tokPrice;
$.post("/TOKprice", {}, function (data) {
    tokPrice= JSON.parse(data);
});

function usd_to_tok_count(){
    var val = document.getElementById("usd_to_tok_inp").value;
    var tok = Math.abs(val/tokPrice).toFixed(2);
    document.getElementById("usd_to_tok_res").innerHTML= tok;
    document.getElementById("usd_to_tok_conf").innerHTML= tok;
}

function usd_to_tok_conf(){
    var val = document.getElementById("usd_to_tok_inp").value;
    var sum = Math.abs(val);
    var params = {sum:sum }
    $.post("/usd_to_tok", params, function (data) {
        document.location.reload(true);
    });
}

//end dashboard
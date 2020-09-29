<script>
var pageURL = $(location).attr("href");
var curTabId = '';
var curSearch = '';
var curCol = 0;
var perPage = 10;
var curPage = 0;

function setPage(page, tabId='') {
    curPage = page;
    loadTable(tabId);
}

function setSort(col) {
    //curCol = col;
    //loadTable();
}

function setSearc(search, tabId='') {
    curSearch = search;
    curPage = 0;
    loadTable(tabId);
}

function loadTable(tabId='') {
    if(tabId!=''){
        curTabId = tabId
    }
    $('#'+curTabId+'_search').prop( "disabled", true );
    $('#'+curTabId+' table').html('Loading...');
    var params = {tabId:curTabId, page:curPage, perPage:perPage, search:curSearch}
    $.post(pageURL, params, function(data) {
        $('#'+curTabId+' ').html(data);
        $('#'+curTabId+'_search').prop( "disabled", false );
        $('#'+curTabId+'_search').focus()
    });
}



</script>
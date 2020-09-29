<script>
var curCol = 0;
var table, tr;
var perPage = 10;
var curPage = 0;


function setPage(page) {
    curPage = page;
    renderTable();
}

function setSort(col) {
    curCol = col;
    renderTable();
}

function setSearc(search) {
    curPage = 0;
    renderTable();
    //searchTable();
}

function renderTable() {
    showFullTable();
    searchTable();
    //sortTable();
    paginateTable();
}



function sortTable() {
    //console.log('sortTable');
    var switching, i, x, y, shouldSwitch;
    //table = document.getElementById("sortTable1");
    switching = true;
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        //tr = table.tr;
        /*Loop through all table rows (except the
        first, which contains table headers):*/
        for (i = 0; i < tr.length; i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            try {
                x = tr[i].getElementsByTagName("td")[curCol];
                y = tr[i + 1].getElementsByTagName("td")[curCol];
                //check if the two rows should switch place:
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    //if so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            } catch {}
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            tr[i].parentNode.insertBefore(tr[i + 1], tr[i]);
            switching = true;
        }
    }

}

function searchTable() {
    //console.log('searchTable');
    var input, filter, td, i, txtValue, found;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    /* table = document.getElementById("sortTable1");
     tr = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");*/
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        found = false;
        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                }
            }
        }
        if (found) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}

function paginateTable() {
    //console.log('paginateTable');
    var td, i, txtValue, pages;
    var cur_table = table;//document.getElementById("sortTable1");
    var cur_tr = [];//table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        if (tr[i].style.display == '') {
            cur_tr.push(tr[i])
        }
    }
    //console.log('tr_length '+tr_length);
    pages = Math.ceil(cur_tr.length / perPage);
    if (curPage > pages - 1) {
        curPage = pages - 1
    }
    if (curPage < 0) {
        curPage = 0
    }
    var ofset = curPage * perPage;
    //console.log(pages);

    for (i = 0; i < cur_tr.length; i++) {
        if (cur_tr[i].style.display == '') {
            if (i >= ofset && i < ofset + perPage) {
                cur_tr[i].style.display = '';
            } else {
                cur_tr[i].style.display = 'none';
            }
        }
    }
    //onclick="setPage(0)"
    //document.getElementById("firstPage").innerHTML = 0;

    document.getElementById("prevPage").onclick = function() {
        setPage(curPage - 1)
    };
    document.getElementById("curPage").innerHTML = curPage + 1;
    document.getElementById("nextPage").onclick = function() {
        setPage(curPage + 1)
    };
    document.getElementById("lastPage").innerHTML = pages;
    document.getElementById("lastPage").onclick = function() {
        setPage(pages - 1);
    };
}

function initTable(name) {
    table = document.getElementById(name);
    tr = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");
    /*var th = table.getElementsByTagName("thead")[0].getElementsByTagName("tr")[0].getElementsByTagName("th");
    for (var i = 0; i < th.length; i++) {
        console.log(i);
        th[i].onclick = function() {
            alert(i);
        };
    }*/
}

function showFullTable() {
    for (i = 0; i < tr.length; i++) {
        tr[i].style.display = '';
    }
}

/*initTable('sortTable1');
paginateTable();*/
</script>
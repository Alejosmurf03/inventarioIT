function ajax() {
    var v = document.getElementById("search").value;

    var a = new XMLHttpRequest()
    a.onreadystatechange = function () {
        if (a.readyState == 4 && a.status == 200) {
            document.getElementById("row").innerHTML = a.responseText;
        }
    }
    a.open("GET", "search.php?v=" + v, true);
    a.send();
} 
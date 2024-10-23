function search() {

    var search_input = document.getElementById("search-input").value;
    var category = document.getElementById("category").value;

    var f = new FormData();
    f.append("search_input", search_input);
    f.append("category", category);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;

            if (t == "EASC") {
                alert("At least add a one search credential");
            } else {
                document.getElementById("products").innerHTML = t;
            }

        }
    }

    r.open("POST", "search.php", true);
    r.send(f);

}
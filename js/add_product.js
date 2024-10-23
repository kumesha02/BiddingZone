function changeImage() {
    var image = document.getElementById("image");
    image.onchange = function () {

        var file_count = image.files.length;

        if (file_count <= 4) {
            for (var x = 0; x < file_count; x++) {

                var file = image.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;

            }
        } else {
            alert("Maximum images limit is 4");
        }

    }
}

function add() {

    var process = "add";
    var title = document.getElementById("title").value;
    var image = document.getElementById("image");
    var length = image.files.length;
    var start_time = document.getElementById("start_time").value;
    var start_date = document.getElementById("start_date").value;
    var end_time = document.getElementById("end_time").value;
    var end_date = document.getElementById("end_date").value;
    var price = document.getElementById("price").value;
    var category = document.getElementById("category").value;
    var condition = document.getElementById("condition").value;
    var content = tinymce.get('myTextarea').getContent();

    // alert(length);
    var f = new FormData();
    f.append("process", process);
    f.append("length", length);
    for (var y = 0; y < length; y++) {
        f.append("image" + y, image.files[y]);
    }
    f.append("title", title);
    f.append("start_time", start_time);
    f.append("start_date", start_date);
    f.append("end_time", end_time);
    f.append("end_date", end_date);
    f.append("price", price);
    f.append("category", category);
    f.append("condition", condition);
    f.append("description", content);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;

            // if (!isNaN(t)) {
            //     alert('The response is a number');
            // } else {
            //     alert('The response is not a number');
            // }

            // document.getElementById("tt").innerHTML = t;

            if (t == "IT") {
                alert("Invalid Title");
            } else if (t == "SAI") {
                alert("Select a Image");
            } else if (t == "IIC") {
                alert("Inavalid Image Count");
            } else if (t == "SASTD") {
                alert("Invalid Auction Start time or date");
            } else if (t == "SAETD") {
                alert("Invalid Auction End time or date");
            } else if (t == "AP") {
                alert("Enter a Price");
            } else if (t == "SAC") {
                alert("Select a Category");
            } else if (t == "AID") {
                alert("Add A Description");
            } else if (t == "IASDT1") {
                alert("Invalid Auction Start Date");
            } else if (t == "IASDT2") {
                alert("Invalid Auction Start Time");
            } else if (t == "IAEDT3") {
                alert("Invalid Auction End Date");
            } else if (t == "IAEDT4") {
                alert("Invalid Auction End Time");
            } else if (t == "IFT") {
                alert("Invalid Uploaded Image Files Type");
            } else if (!isNaN(t)) {
                alert("--- Item Added ---");
                // Redirect to a Login page
                window.location.href = "product_view.php?item_id=" + t;
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "seller/items.php", true);
    r.send(f);

}
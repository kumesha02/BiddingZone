var img = {}; // Global object

img.value = "no-changed";
function changeImage() {
    var image = document.getElementById("image");
    image.onchange = function () {

        var file_count = image.files.length;

        if (file_count == 1) {
            for (var x = 0; x < file_count; x++) {

                var file = image.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;

            }
            img.value = "changed";
            document.getElementById("i1").src = "";
            document.getElementById("i2").src = "";
            document.getElementById("i3").src = "";
        } else if (file_count == 2) {
            for (var x = 0; x < file_count; x++) {

                var file = image.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;
            }
            img.value = "changed";
            document.getElementById("i2").src = "";
            document.getElementById("i3").src = "";
        } else if (file_count == 3) {
            for (var x = 0; x < file_count; x++) {

                var file = image.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;
            }
            img.value = "changed";
            document.getElementById("i3").src = "";
        } else if (file_count == 4) {
            for (var x = 0; x < file_count; x++) {

                var file = image.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;

            }
            img.value = "changed";
        } else if (file_count > 4) {
            alert("Maximum images limit is 4");
        }

    }
}

function edit() {

    var process = "save";
    var img_change = img.value;
    var itemId = document.getElementById("itemId").innerHTML;
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
    f.append("itemId", itemId);
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
    f.append("img_change", img_change);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;

            if (t == "IT") {
                alert("Invalid Title");
            } else if (t == "SAI") {
                alert("Select a Image");
            } else if (t == "IIC") {
                alert("Invalid Image Count");
            } else if (t == "SASTD") {
                alert("Invalid Auction Start time or date");
            } else if (t == "SAETD") {
                alert("Invalid Auction End time or date");
            } else if (t == "AP") {
                alert("Enter a Price");
            } else if (t == "AID") {
                alert("Add A Description");
            } else if (t == "IASDT1") {
                alert("Invalid1 Auction Start Date");
            } else if (t == "IASDT2") {
                alert("Invalid2 Auction Start Time");
            } else if (t == "IAEDT3") {
                alert("Invalid3 Auction End Date");
            } else if (t == "IAEDT4") {
                alert("Invalid4 Auction End Time");
            } else if (t == "IFT") {
                alert("Invalid Uploaded Image Files Type");
            } else if (t == "NDC") {
                alert("No Data Change");
            } else if (!isNaN(t)) {
                alert("--- Item Details Updated ---");
                // Reload the current page
                location.reload();
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "seller/edit_items.php", true);
    r.send(f);

}

function del() {

    var process = "del";
    var itemId = document.getElementById("itemId").innerHTML;

    var f2 = new FormData();
    f2.append("process", process);
    f2.append("itemId", itemId);

    var r2 = new XMLHttpRequest();

    r2.onreadystatechange = function () {
        if (r2.readyState == 4 && r2.status == 200) {
            var t2 = r2.responseText;

            if (t2 == "Suc") {
                alert("--- Item Removed ---");
                // Reload the current page
                window.location.href = "added_items.php";
            } else {
                alert(t2);
            }

        }
    }

    r2.open("POST", "seller/edit_items.php", true);
    r2.send(f2);

}
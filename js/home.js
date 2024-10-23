function toggleDualOption() {
    var switchCheckbox = document.getElementById("dual-switch");
    var optionLabel = document.getElementById("option-label");

    // if (switchCheckbox.checked) {
    //     optionLabel.textContent = "Seller";
    // } else {
    //     optionLabel.textContent = "Buyer";
    // }
}

function LogOut() {

    var r3 = new XMLHttpRequest();

    r3.onreadystatechange = function () {
        if (r3.readyState == 4 && r3.status == 200) {
            var t3 = r3.responseText;

            if (t3 == "destroyed") {
                alert("Logged Out");
                // Redirect to a Login page
                window.location.href = "index.php";
            } else {
                alert(t3);
            }

        }
    }

    r3.open("GET", "general_process/destroy.php?sess=des", true);
    r3.send();

}
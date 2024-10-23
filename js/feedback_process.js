function feedback() {

    var invoiceId = document.getElementById("invoiceId").innerHTML;
    var msg = document.getElementById("message").value;

    var f = new FormData();
    f.append("invoiceId", invoiceId);
    f.append("msg", msg);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;

            if (t == "FS") {
                alert("Feedback added !");
                // Redirect to a Login page
                window.location.href = "bids_won.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "buyer/feedback_process.php", true);
    r.send(f);

}
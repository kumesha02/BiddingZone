function payNow() {

    var process = "pay";
    var bidId = document.getElementById("bidId").innerHTML;
    var name = document.getElementById("name").value;
    var cardNo = document.getElementById("cardNo").value;
    var expiryM = document.getElementById("expiryM").value;
    var expiryY = document.getElementById("expiryY").value;
    var cvv = document.getElementById("cvv").value;

    var f = new FormData();
    f.append("process", process);
    f.append("bidId", bidId);
    f.append("name", name);
    f.append("cardNo", cardNo);
    f.append("expiryM", expiryM);
    f.append("expiryY", expiryY);
    f.append("cvv", cvv);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;

            if (t == "FAD") {
                alert("Fill all Payment Details");
            } else if (t == "IN") {
                alert("Invalid Name");
            } else if (t == "ICN") {
                alert("Invalid Card Number");
            } else if (t == "IE") {
                alert("Invalid Card Expiry Date");
            } else if (t == "CE") {
                alert("Card Expired");
            } else if (t == "IC") {
                alert("Invalid CVV code");
            } else if (t == "PS") {
                alert("--- Payment Succeed ! ---");
                // Redirect to a Login page
                window.location.href = "bids_won.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "buyer/payment_process.php", true);
    r.send(f);

}

function cancelNow() {
    var process = "cancel";
    var bidId = document.getElementById("bidId").innerHTML;

    var f2 = new FormData();
    f2.append("process", process);
    f2.append("bidId", bidId);

    var r2 = new XMLHttpRequest();

    r2.onreadystatechange = function () {
        if (r2.readyState == 4 && r2.status == 200) {
            var t2 = r2.responseText;

            if (t2 == "STAA") {
                alert("Your bid is deleted !");
                alert("Item sold to another buyer !");

                // Redirect to a Login page
                window.location.href = "bids_won.php";
            } else if (t2 == "PC") {
                alert("Your bid is deleted !");
                alert("Payment canceled !");

                // Redirect to a Login page
                window.location.href = "bids_won.php";
            } else {
                alert(t2);
            }

        }
    }

    r2.open("POST", "buyer/payment_process.php", true);
    r2.send(f2);
}
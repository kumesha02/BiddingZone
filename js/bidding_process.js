live();

function bid() {

    var process = "add";
    var itemId = document.getElementById("itemId").innerHTML;
    var bid = document.getElementById("bid").value;

    var f2 = new FormData();
    f2.append("itemId", itemId);
    f2.append("bid", bid);
    f2.append("process", process);

    var r2 = new XMLHttpRequest();

    r2.onreadystatechange = function () {
        if (r2.readyState == 4 && r2.status == 200) {
            var t2 = r2.responseText;

            if (t2 == "EBP") {
                alert("Enter a Bidding Price");
            } else if (t2 == "TAAB") {
                alert("---There is an already added bid---");
                alert("---Check Your Bids Page---");
            } else if (t2 == "CBP") {
                alert("Make a Different Bid");
                alert("This bidding price is already taken !");
            } else if (t2 == "EACBP") {
                alert("Enter a Valid Bidding Price");
            } else if (t2 == "Suc") {
                alert("Your Bid is Placed Successfully !");
                // Redirect to a Login page
                window.location.href = "bids.php";
            } else {
                alert(t2);
            }

        }
    }

    r2.open("POST", "general_process/bidding_process.php", true);
    r2.send(f2);

}

function edit() {

    var process = "edit";
    var itemId = document.getElementById("itemId").innerHTML;
    var bid = document.getElementById("bid").value;

    var f = new FormData();
    f.append("itemId", itemId);
    f.append("bid", bid);
    f.append("process", process);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;

            if (t == "CBP") {
                alert("Change Bidding Price");
            } else if (t == "CBP2") {
                alert("Make a Different Bid");
                alert("This bidding price is already taken !");
            } else if (t == "EACBP") {
                alert("Enter a Valid Bidding Price");
            } else if (t == "Upt") {
                alert("Your Bid is Updated Successfully !");
                // Redirect to a Login page
                window.location.href = "bids.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("POST", "general_process/bidding_process.php", true);
    r.send(f);

}

function del() {

    var process = "del";
    var itemId = document.getElementById("itemId").innerHTML;
    var bidId = document.getElementById("bidId").innerHTML;

    var f3 = new FormData();
    f3.append("itemId", itemId);
    f3.append("bidId", bidId);
    f3.append("process", process);

    var r3 = new XMLHttpRequest();

    r3.onreadystatechange = function () {
        if (r3.readyState == 4 && r3.status == 200) {
            var t3 = r3.responseText;

            if (t3 == "DC") {
                alert("Bid Removed !");
                // Redirect to a Login page
                window.location.href = "bids.php";
            } else {
                alert(t3);
            }

        }
    }

    r3.open("POST", "general_process/bidding_process.php", true);
    r3.send(f3);

}

function live() {
    var itemId = document.getElementById("itemId").innerHTML;

    var f4 = new FormData();
    f4.append("itemId", itemId);

    var r4 = new XMLHttpRequest();

    r4.onreadystatechange = function () {
        if (r4.readyState == 4 && r4.status == 200) {
            var t4 = r4.responseText;

            document.getElementById("live_table").innerHTML = t4;

        }
    }

    r4.open("POST", "buyer/live_bids.php", true);
    r4.send(f4);
}

// Call the function every 3 seconds
setInterval(live, 3000);
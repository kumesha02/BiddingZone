function backgroundProcess() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;

            if (t == "BC") {
                alert("A Bid Closed !")
                // Reload the current page
                location.reload();
            }
        }
    }

    r.open("POST", "JS_background_process.php?process=load", true);
    r.send();

}

// Call the function every 3 seconds
setInterval(backgroundProcess, 3000);
function save() {

    var process = "save";
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var uname = document.getElementById("uname").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var re_password = document.getElementById("re_password").value;
    var mobile = document.getElementById("mobile").value;
    var adNo = document.getElementById("adNo").value;
    var street = document.getElementById("street").value;
    var city = document.getElementById("city").value;
    var state = document.getElementById("state").value;

    var f2 = new FormData();
    f2.append("process", process);
    f2.append("fname", fname);
    f2.append("lname", lname);
    f2.append("uname", uname);
    f2.append("email", email);
    f2.append("password", password);
    f2.append("re_password", re_password);
    f2.append("mobile", mobile);
    f2.append("adNo", adNo);
    f2.append("street", street);
    f2.append("city", city);
    f2.append("state", state);

    var r2 = new XMLHttpRequest();

    r2.onreadystatechange = function () {
        if (r2.readyState == 4 && r2.status == 200) {
            var t2 = r2.responseText;

            alert(t2);

            // if (t2 == "SR") {
            //     alert("Select a Role");
            // } else if (t2 == "IF") {
            //     alert("Invalid First Name");
            // } else if (t2 == "IU") {
            //     alert("Invalid Username");
            // } else if (t2 == "IE") {
            //     alert("Invalid Email");
            // } else if (t2 == "IP") {
            //     alert("Invalid Password");
            // } else if (t2 == "PNM") {
            //     alert("Both Password Fields must match");
            // } else if (t2 == "IM") {
            //     alert("Invalid Mobile No");
            // } else if (t2 == "AAN") {
            //     alert("Add a Address No");
            // } else if (t2 == "AS") {
            //     alert("Add the Street");
            // } else if (t2 == "AC") {
            //     alert("Add the City");
            // } else if (t2 == "AST") {
            //     alert("Add the State");
            // } else if (t2 == "TUCU") {
            //     alert("This Username Currently Unavailable");
            // } else if (t2 == "TPCU") {
            //     alert("This Password Currently Unavailable");
            // } else if (t2 == "TECU") {
            //     alert("This Email Currently Unavailable");
            // } else if (t2 == "TMCU") {
            //     alert("This Mobile No Currently Unavailable");
            // } else if (t2 == "ATC") {
            //     alert("Accept Terms and Conditions !");
            // } else if (t2 == "Suc") {
            //     alert("Registration Succeed !");
            //     // Redirect to a Login page
            //     window.location.href = "login.php";

            // } else {
            //     alert(t2);
            // }



        }
    }

    r2.open("POST", "general_process/profile_process.php", true);
    r2.send(f2);

}
function signUp() {

    var role = document.getElementById("role").value;
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
    var checkbox = document.getElementById("checkbox").checked;

    var f = new FormData();
    f.append("role", role);
    f.append("fname", fname);
    f.append("lname", lname);
    f.append("uname", uname);
    f.append("email", email);
    f.append("password", password);
    f.append("re_password", re_password);
    f.append("mobile", mobile);
    f.append("adNo", adNo);
    f.append("street", street);
    f.append("city", city);
    f.append("state", state);
    f.append("checkbox", checkbox);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;

            if (t == "SR") {
                alert("Select a Role");
            } else if (t == "IF") {
                alert("Invalid First Name");
            } else if (t == "IU") {
                alert("Invalid Username");
            } else if (t == "IE") {
                alert("Invalid Email");
            } else if (t == "IP") {
                alert("Invalid Password");
            } else if (t == "PNM") {
                alert("Both Password Fields must match");
            } else if (t == "IM") {
                alert("Invalid Mobile No");
            } else if (t == "AAN") {
                alert("Add a Address No");
            } else if (t == "AS") {
                alert("Add the Street");
            } else if (t == "AC") {
                alert("Add the City");
            } else if (t == "AST") {
                alert("Add the State");
            } else if (t == "TUCU") {
                alert("This Username Currently Unavailable");
            } else if (t == "TPCU") {
                alert("This Password Currently Unavailable");
            } else if (t == "TECU") {
                alert("This Email Currently Unavailable");
            } else if (t == "TMCU") {
                alert("This Mobile No Currently Unavailable");
            } else if (t == "ATC") {
                alert("Accept Terms and Conditions !");
            } else if (t == "Suc") {
                alert("Registration Succeed !");
                // Redirect to a Login page
                window.location.href = "login.php";

            } else {
                alert(t);
            }



        }
    }

    r.open("POST", "general_process/register_process.php", true);
    r.send(f);

}

function Login() {

    var role = document.getElementById("role").value;
    var uname = document.getElementById("uname").value;
    var password = document.getElementById("password").value;
    var checkbox = document.getElementById("checkbox").checked;

    var f2 = new FormData();
    f2.append("role", role);
    f2.append("uname", uname);
    f2.append("password", password);
    f2.append("checkbox", checkbox);

    var r2 = new XMLHttpRequest();

    r2.onreadystatechange = function () {
        if (r2.readyState == 4 && r2.status == 200) {
            var t2 = r2.responseText;

            if (t2 == "SAR") {
                alert("Select a Role");
            } else if (t2 == "NRAS") {
                alert("Not Registered as a Seller");
            } else if (t2 == "NRAB") {
                alert("Not Registered as a Buyer");
            } else if (t2 == "IP") {
                alert("Invalid Password");
            } else if (t2 == "login-suc") {
                alert("Login Succeed !");
                // Redirect to a Home page
                window.location.href = "index.php";
            }else if (t2 == "login-suc-admin") {
                alert("Login Succeed !");
                // Redirect to a Home page
                window.location.href = "admin_panel_D.php";
            }  else if (t2 == "IUOP") {
                alert("Invalid Username or Password !");
            } else {
                alert(t2);
            }

        }
    }

    r2.open("POST", "general_process/login_process.php", true);
    r2.send(f2);

}
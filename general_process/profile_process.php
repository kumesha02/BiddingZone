<?php

session_start();

$conn = new mysqli(
    "localhost",
    "root",
    "Ravi400500lak@",
    "bidding_web",
    "3306"
);

$process = $_POST["process"];

if ($process == "edit") {
?>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col">
                        <div>
                            <label for="exampleFormControlInput1" class="form-label">First Name</label>
                            <input value="<?php echo $_SESSION["user"]["fname"]; ?>" type="text" class="form-control" id="fname">
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                            <input value="<?php echo $_SESSION["user"]["lname"]; ?>" type="text" class="form-control" id="lname">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Username</p>
            </div>
            <div class="col-sm-9">
                <div>
                    <input value="<?php echo $_SESSION["user"]["username"]; ?>" type="text" class="form-control" id="uname">
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Email</p>
            </div>
            <div class="col-sm-9">
                <div>
                    <input value="<?php echo $_SESSION["user"]["email"]; ?>" type="email" class="form-control" id="email">
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Password</p>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col">
                        <input value="<?php echo $_SESSION["user"]["password"]; ?>" type="password" class="form-control" id="password">
                    </div>
                    <div class="col">
                        <input value="<?php echo $_SESSION["user"]["password"]; ?>" type="password" class="form-control" id="re_password">
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
            </div>
            <div class="col-sm-9">
                <div>
                    <input value="<?php echo $_SESSION["user"]["mobile"]; ?>" type="number" class="form-control" id="mobile">
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Address</p>
            </div>
            <?php

            $textValue = $_SESSION["user"]["address"];
            $array = explode(",", $textValue);
            ?>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col">
                        <div>
                            <label for="exampleFormControlInput1" class="form-label">No</label>
                            <input value="<?php echo $array[0]; ?>" type="number" class="form-control" id="adNo">
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <label for="exampleFormControlInput1" class="form-label">Street</label>
                            <input value="<?php echo $array[1]; ?>" type="text" class="form-control" id="street">
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <label for="exampleFormControlInput1" class="form-label">City</label>
                            <input value="<?php echo $array[2]; ?>" type="text" class="form-control" id="city">
                        </div>
                    </div>
                    <div class="col">
                        <div>
                            <label for="exampleFormControlInput1" class="form-label">State</label>
                            <input value="<?php echo $array[3]; ?>" type="text" class="form-control" id="state">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <a onclick="save();" class="btn btn-success btn-sm me-2"> Save </a>
                <a href="profile.php" class="btn btn-danger btn-sm">Cancel</a>
            </div>
        </div>
    </div>
<?php
}

if ($process == "save") {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $re_password = $_POST["re_password"];
    $mobile = $_POST["mobile"];
    $adNo = $_POST["adNo"];
    $street = $_POST["street"];
    $city = $_POST["city"];
    $state = $_POST["state"];


    // echo $uname;
    // echo "---------";
    // echo $fname;
    // echo "---------";
    // echo $lname;
    // echo "---------";
    // echo $uname;
    // echo "---------";
    // echo $email;
    // echo "---------";
    // echo $password;
    // echo "---------";
    // echo $re_password;
    // echo "---------";
    // echo $mobile;
    // echo "---------";
    // echo $adNo;
    // echo "---------";
    // echo $street;
    // echo "---------";
    // echo $city;
    // echo "---------";
    // echo $state;
    // echo "---------";

    $textValue = $_SESSION["user"]["address"];
    $array = explode(",", $textValue);

    if (
        $fname != $_SESSION["user"]["fname"] || $lname != $_SESSION["user"]["lname"] || $uname != $_SESSION["user"]["username"] ||
        $email != $_SESSION["user"]["email"] || $password != $_SESSION["user"]["password"] ||  $re_password != $_SESSION["user"]["password"] ||
        $mobile != $_SESSION["user"]["mobile"] || $adNo != $array[0] || $street != $array[1] ||
        $city != $array[2] || $state != $array[3]
    ) {

        // echo $uname;
        // echo "---------";
        // echo $fname;
        // echo "---------";
        // echo $lname;
        // echo "---------";
        // echo $uname;
        // echo "---------";
        // echo $email;
        // echo "---------";
        // echo $password;
        // echo "---------";
        // echo $re_password;
        // echo "---------";
        // echo $mobile;
        // echo "---------";
        // echo $adNo;
        // echo "---------";
        // echo $street;
        // echo "---------";
        // echo $city;
        // echo "---------";
        // echo $state;
        // echo "---------";


        $q1 = "SELECT `username` FROM `admin` WHERE `username`='" . $uname . "'";
        $rs1 = $conn->query($q1);
        $n1 = $rs1->num_rows;

        $q2 = "SELECT `username` FROM `seller` WHERE `username`='" . $uname . "'";
        $rs2 = $conn->query($q2);
        $n2 = $rs2->num_rows;

        $q3 = "SELECT `username` FROM `buyer` WHERE `username`='" . $uname . "'";
        $rs3 = $conn->query($q3);
        $n3 = $rs3->num_rows;

        if ($n1 >= 1 || $n2 >= 1 || $n3 >= 1) {
            $d["uname"] = "1";
        } else {
            $d["uname"] = "0";
        }

        $q4 = "SELECT `password` FROM `buyer` WHERE `password`='" . $password . "'";
        $rs4 = $conn->query($q4);
        $n4 = $rs4->num_rows;
        if ($n4 >= 1) {
            $d["password"] = "1";
        } else {
            $q5 = "SELECT `password` FROM `seller` WHERE `password`='" . $password . "'";
            $rs5 = $conn->query($q5);
            $n5 = $rs5->num_rows;
            if ($n5 >= 1) {
                $d["password"] = "1";
            } else {
                $d["password"] = "0";
            }
        }

        $q6 = "SELECT `email` FROM `buyer` WHERE `email`='" . $email . "'";
        $rs6 = $conn->query($q6);
        $n6 = $rs6->num_rows;
        if ($n6 >= 1) {
            $d["email"] = "1";
        } else {
            $q7 = "SELECT `email` FROM `seller` WHERE `email`='" . $email . "'";
            $rs7 = $conn->query($q7);
            $n7 = $rs7->num_rows;
            if ($n7 >= 1) {
                $d["email"] = "1";
            } else {
                $d["email"] = "0";
            }
        }

        $q8 = "SELECT `mobile` FROM `buyer` WHERE `mobile`='" . $mobile . "'";
        $rs8 = $conn->query($q8);
        $n8 = $rs8->num_rows;
        if ($n8 >= 1) {
            $d["mobile"] = "1";
        } else {
            $q9 = "SELECT `mobile` FROM `seller` WHERE `mobile`='" . $mobile . "'";
            $rs9 = $conn->query($q9);
            $n9 = $rs9->num_rows;
            if ($n9 >= 1) {
                $d["mobile"] = "1";
            } else {
                $d["mobile"] = "0";
            }
        }


        if (strlen($fname) < 2 || strlen($fname) > 20) {
            echo ("IF");
        } elseif (strlen($uname) < 4 || strlen($uname) > 45) {
            echo ("IU");
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo ("IE");
        } elseif (strlen($password) < 8 || strlen($password) > 45) {
            echo ("IP");
        } elseif ($password != $re_password) {
            echo ("PNM");
        } elseif (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]{7}/", $mobile) || strlen($mobile) !== 10) {
            echo ("IM");
        } elseif ($adNo == "") {
            echo ("AAN");
        } elseif ($street == "") {
            echo ("AS");
        } elseif ($city == "") {
            echo ("AC");
        } elseif ($state == "") {
            echo ("AST");
        } elseif ($d["uname"] !== "0" && $uname != $_SESSION["user"]["username"]) {
            echo ("TUCU");
        } elseif ($d["password"] !== "0" && $password != $_SESSION["user"]["password"]) {
            echo ("TPCU");
        } elseif ($d["email"] !== "0" && $email != $_SESSION["user"]["email"]) {
            echo ("TECU");
        } elseif ($d["mobile"] !== "0" && $mobile != $_SESSION["user"]["mobile"]) {
            echo ("TMCU");
        } elseif ($_SESSION["user"]["role"] == "b") {
            // $q10 = "UPDATE `buyer` (`fname`,`lname`,`username`,`password`,`email`,`mobile`,`address`,`verificationId`)
            // VALUES ('" . $fname . "','" . $lname . "','" . $uname . "','" . $password . "','" . $email . "',
            // '" . $mobile . "','" . $adNo . "," . $street . "," . $city . "," . $state . "','2')";

            // $rs10 = $conn->query($q10);

            // echo ("Suc-B");

            if ($fname != $_SESSION["user"]["fname"]) {
                $q13u = "UPDATE `buyer` SET `fname`='" . $fname . "' WHERE `buyerId`='" . $_SESSION["user"]["buyerId"] . "'";
                $rs13u = $conn->query($q13u);
                $_SESSION["user"]["fname"] = $fname;
                echo ("PU1");
            }

            if ($lname != $_SESSION["user"]["lname"]) {
                $q15u = "UPDATE `buyer` SET `lname`='" . $lname . "' WHERE `buyerId`='" . $_SESSION["user"]["buyerId"] . "'";
                $rs15u = $conn->query($q15u);
                $_SESSION["user"]["lname"] = $lname;
                echo ("PU2");
            }

            if ($uname != $_SESSION["user"]["username"]) {
                $q8u = "UPDATE `buyer` SET `username`='" . $uname . "' WHERE `buyerId`='" . $_SESSION["user"]["buyerId"] . "'";
                $rs8u = $conn->query($q8u);
                $_SESSION["user"]["username"] = $uname;
                echo ("PU3");
            }

            if ($password != $_SESSION["user"]["password"]) {
                $q9u = "UPDATE `buyer` SET `password`='" . $password . "' WHERE `buyerId`='" . $_SESSION["user"]["buyerId"] . "'";
                $rs9u = $conn->query($q9u);
                $_SESSION["user"]["password"] = $password;
                echo ("PU4");
            }

            if ($email != $_SESSION["user"]["email"]) {
                $q12u = "UPDATE `buyer` SET `email`='" . $email . "' WHERE `buyerId`='" . $_SESSION["user"]["buyerId"] . "'";
                $rs12u = $conn->query($q12u);
                $_SESSION["user"]["email"] = $email;
                echo ("PU5");
            }

            if ($mobile != $_SESSION["user"]["mobile"]) {
                $q16u = "UPDATE `buyer` SET `mobile`='" . $mobile . "' WHERE `buyerId`='" . $_SESSION["user"]["buyerId"] . "'";
                $_SESSION["user"]["mobile"] = $mobile;
                $rs16u = $conn->query($q16u);
                echo ("PU6");
            }

            if ($adNo != $array[0] || $street != $array[1] || $city != $array[2] || $state != $array[3]) {
                $q17u = "UPDATE `buyer` SET `address`='" . $adNo . "," . $street . "," . $city . "," . $state . "' WHERE `buyerid`='" . $_SESSION["user"]["buyerId"] . "'";
                $_SESSION["user"]["address"] = "$adNo,$street,$city,$state";
                $rs17u = $conn->query($q17u);
                echo ("PU7");
            }

        } elseif ($_SESSION["user"]["role"] == "s") {

            if ($fname != $_SESSION["user"]["fname"]) {
                $q13u = "UPDATE `seller` SET `fname`='" . $fname . "' WHERE `sellerId`='" . $_SESSION["user"]["sellerId"] . "'";
                $rs13u = $conn->query($q13u);
                $_SESSION["user"]["fname"] = $fname;
                echo ("PU1");
            }

            if ($lname != $_SESSION["user"]["lname"]) {
                $q15u = "UPDATE `seller` SET `lname`='" . $lname . "' WHERE `sellerId`='" . $_SESSION["user"]["sellerId"] . "'";
                $rs15u = $conn->query($q15u);
                $_SESSION["user"]["lname"] = $lname;
                echo ("PU2");
            }

            if ($uname != $_SESSION["user"]["username"]) {
                $q8u = "UPDATE `seller` SET `username`='" . $uname . "' WHERE `sellerId`='" . $_SESSION["user"]["sellerId"] . "'";
                $rs8u = $conn->query($q8u);
                $_SESSION["user"]["username"] = $uname;
                echo ("PU3");
            }

            if ($password != $_SESSION["user"]["password"]) {
                $q9u = "UPDATE `seller` SET `password`='" . $password . "' WHERE `sellerId`='" . $_SESSION["user"]["sellerId"] . "'";
                $rs9u = $conn->query($q9u);
                $_SESSION["user"]["password"] = $password;
                echo ("PU4");
            }

            if ($email != $_SESSION["user"]["email"]) {
                $q12u = "UPDATE `seller` SET `email`='" . $email . "' WHERE `sellerId`='" . $_SESSION["user"]["sellerId"] . "'";
                $rs12u = $conn->query($q12u);
                $_SESSION["user"]["email"] = $email;
                echo ("PU5");
            }

            if ($mobile != $_SESSION["user"]["mobile"]) {
                $q16u = "UPDATE `seller` SET `mobile`='" . $mobile . "' WHERE `sellerId`='" . $_SESSION["user"]["sellerId"] . "'";
                $_SESSION["user"]["mobile"] = $mobile;
                $rs16u = $conn->query($q16u);
                echo ("PU6");
            }

            if ($adNo != $array[0] || $street != $array[1] || $city != $array[2] || $state != $array[3]) {
                $q17u = "UPDATE `seller` SET `address`='" . $adNo . "," . $street . "," . $city . "," . $state . "' WHERE `sellerId`='" . $_SESSION["user"]["sellerId"] . "'";
                $_SESSION["user"]["address"] = "$adNo,$street,$city,$state";
                $rs17u = $conn->query($q17u);
                echo ("PU7");
            }
        }
    } else {
        echo "NDC";
    }
}


?>
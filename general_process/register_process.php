<?php

$conn = new mysqli(
    "localhost",
    "root",
    "Ravi400500lak@",
    "bidding_web",
    "3306"
);

$role = $_POST["role"];
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
$checkbox = $_POST["checkbox"];

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

$prefix = 'USR'; // prefix for verification code
$code = $prefix . uniqid(); // generate unique code

if ($role == "Select Your Role") {
    echo ("SR");
} elseif (strlen($fname) < 2 || strlen($fname) > 20) {
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
} elseif ($d["uname"] !== "0") {
    echo ("TUCU");
} elseif ($d["password"] !== "0") {
    echo ("TPCU");
} elseif ($d["email"] !== "0") {
    echo ("TECU");
} elseif ($d["mobile"] !== "0") {
    echo ("TMCU");
} elseif ($checkbox == "false") {
    echo ("ATC");
} elseif ($role == "1") {
    $q10 = "INSERT INTO `buyer` (`fname`,`lname`,`username`,`password`,`email`,`mobile`,`address`,
    `verification_code`,`verificationId`)
    VALUES ('" . $fname . "','" . $lname . "','" . $uname . "','" . $password . "','" . $email . "',
    '" . $mobile . "','" . $adNo . "," . $street . "," . $city . "," . $state . "','" . $code . "','2')";

    $rs10 = $conn->query($q10);

    setcookie("b_uname", $uname, time() + (60 * 60 * 24 * 30));
    setcookie("b_password", $pw, time() + (60 * 60 * 24 * 30));

    echo ("Suc");
} elseif ($role == "2") {
    $q11 = "INSERT INTO `seller` (`fname`,`lname`,`username`,`password`,`email`,`mobile`,`address`,
    `verification_code`,`verificationId`)
    VALUES ('" . $fname . "','" . $lname . "','" . $uname . "','" . $password . "','" . $email . "',
    '" . $mobile . "','" . $adNo . "," . $street . "," . $city . "," . $state . "','" . $code . "','2')";

    $rs11 = $conn->query($q11);

    setcookie("s_uname", $uname, time() + (60 * 60 * 24 * 30));
    setcookie("s_password", $pw, time() + (60 * 60 * 24 * 30));

    echo ("Suc");
}

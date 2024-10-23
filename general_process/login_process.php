<?php
session_start();

$conn = new mysqli(
    "localhost",
    "root",
    "Ravi400500lak@",
    "bidding_web",
    "3306"
);

$role = $_POST["role"];
$uname = $_POST["uname"];
$password = $_POST["password"];
$checkbox = $_POST["checkbox"];

$q1 = "SELECT `username` FROM `admin` WHERE `username`='" . $uname . "'";
$rs1 = $conn->query($q1);
$n1 = $rs1->num_rows;

$q2 = "SELECT `username` FROM `seller` WHERE `username`='" . $uname . "'";
$rs2 = $conn->query($q2);
$n2 = $rs2->num_rows;

$q5 = "SELECT `email` FROM `seller` WHERE `email`='" . $uname . "'";
$rs5 = $conn->query($q5);
$n5 = $rs5->num_rows;

$q3 = "SELECT `username` FROM `buyer` WHERE `username`='" . $uname . "'";
$rs3 = $conn->query($q3);
$n3 = $rs3->num_rows;

$q6 = "SELECT `email` FROM `buyer` WHERE `email`='" . $uname . "'";
$rs6 = $conn->query($q6);
$n6 = $rs6->num_rows;

if ($n1 >= 1) {
    $q7 = "SELECT `password` FROM `admin` WHERE `password`='" . $password . "' AND `username`='" . $uname . "'";
    $rs7 = $conn->query($q7);
    $n7 = $rs7->num_rows;

    if ($n7 >= 1) {
        if ($checkbox == "true") {
            setcookie("uname", $uname, time() + (60 * 60 * 24 * 30));
            setcookie("password", $password, time() + (60 * 60 * 24 * 30));

            $q01 = "SELECT * FROM `admin` WHERE `username`='" . $uname . "' AND `password`='" . $password . "'";
            $rs01 = $conn->query($q01);
            $n01 = $rs01->num_rows;
            $d01 = $rs01->fetch_assoc();

            if (isset($_SESSION["admin"])) {
                echo "login-suc-admin";
            } else {
                $_SESSION["admin"] = $d01;
                echo "login-suc-admin";
            }
        } else {
            $q01 = "SELECT * FROM `admin` WHERE `username`='" . $uname . "' AND `password`='" . $password . "'";
            $rs01 = $conn->query($q01);
            $n01 = $rs01->num_rows;
            $d01 = $rs01->fetch_assoc();

            if (isset($_SESSION["admin"])) {
                echo "login-suc-admin";
            } else {
                $_SESSION["admin"] = $d01;
                echo "login-suc-admin";
            }
        }
    } else {
        echo "IP";
    }
} elseif ($role == "Select Your Role") {
    echo "SAR";
} else if ($role == "2") {
    if ($n2 >= 1 || $n5 >= 1) {
        $q08 = "SELECT `password` FROM `seller` WHERE `password`='" . $password . "' AND `username`='" . $uname . "'";
        $rs08 = $conn->query($q08);
        $n08 = $rs08->num_rows;

        $q8 = "SELECT `password` FROM `seller` WHERE `password`='" . $password . "' AND `email`='" . $uname . "'";
        $rs8 = $conn->query($q8);
        $n8 = $rs8->num_rows;

        if ($n08 >= 1) {
            if ($checkbox == "true") {
                setcookie("s_uname", $uname, time() + (60 * 60 * 24 * 30));
                setcookie("s_password", $password, time() + (60 * 60 * 24 * 30));

                $q02 = "SELECT * FROM `seller` WHERE `username`='" . $uname . "' AND `password`='" . $password . "'";
                $rs02 = $conn->query($q02);
                $n02 = $rs02->num_rows;
                $d02 = $rs02->fetch_assoc();

                if (isset($_SESSION["user"])) {
                    echo "login-suc";
                } else {
                    $_SESSION["user"] = $d02;
                    $_SESSION["user"]["role"] = "s";
                    echo "login-suc";
                }
            } else {
                $q02 = "SELECT * FROM `seller` WHERE `username`='" . $uname . "' AND `password`='" . $password . "'";
                $rs02 = $conn->query($q02);
                $n02 = $rs02->num_rows;
                $d02 = $rs02->fetch_assoc();

                if (isset($_SESSION["user"])) {
                    echo "login-suc";
                } else {
                    $_SESSION["user"] = $d02;
                    $_SESSION["user"]["role"] = "s";
                    echo "login-suc";
                }
            }
        } else {
            echo "IP";
        }
    } else {
        echo "NRAS";
    }
} else if ($role == "1") {
    if ($n3 >= 1 || $n6 >= 1) {
        $q09 = "SELECT `password` FROM `buyer` WHERE `password`='" . $password . "' AND `username`='" . $uname . "'";
        $rs09 = $conn->query($q09);
        $n09 = $rs09->num_rows;

        $q9 = "SELECT `password` FROM `buyer` WHERE `password`='" . $password . "' AND `email`='" . $uname . "'";
        $rs9 = $conn->query($q9);
        $n9 = $rs9->num_rows;

        if ($n09 >= 1) {
            if ($checkbox == "true") {
                setcookie("b_uname", $uname, time() + (60 * 60 * 24 * 30));
                setcookie("b_password", $password, time() + (60 * 60 * 24 * 30));

                $q03 = "SELECT * FROM `buyer` WHERE `username`='" . $uname . "' AND `password`='" . $password . "'";
                $rs03 = $conn->query($q03);
                $n03 = $rs03->num_rows;
                $d03 = $rs03->fetch_assoc();

                if (isset($_SESSION["user"])) {
                    echo "login-suc";
                } else {
                    $_SESSION["user"] = $d03;
                    $_SESSION["user"]["role"] = "b";
                    echo "login-suc";
                }
            } else {
                $q03 = "SELECT * FROM `buyer` WHERE `username`='" . $uname . "' AND `password`='" . $password . "'";
                $rs03 = $conn->query($q03);
                $n03 = $rs03->num_rows;
                $d03 = $rs03->fetch_assoc();

                if (isset($_SESSION["user"])) {
                    echo "login-suc";
                } else {
                    $_SESSION["user"] = $d03;
                    $_SESSION["user"]["role"] = "b";
                    echo "login-suc";
                }
            }
        } else {
            echo "IP";
        }
    } else {
        echo "NRAB";
    }
} else {
    echo "IUOP";
}
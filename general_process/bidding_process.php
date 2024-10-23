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
$itemId = $_POST["itemId"];

// set the time zone to Sri Lanka
date_default_timezone_set('Asia/Colombo');

// get the current time in Sri Lanka
$date = date('Y-m-d H:i:s');

if ($process == "add") {
    $bid = $_POST["bid"];
    $q0 = "SELECT * FROM `bids` WHERE `ItemId`='" . $itemId . "' AND `price`='" . $bid . "'";
    $rs0 = $conn->query($q0);
    $n0 = $rs0->num_rows;

    $qx = "SELECT * FROM `bids` WHERE `itemId`='" . $itemId . "' AND `buyerId`='" . $_SESSION["user"]["buyerId"] . "'";
    $rsx = $conn->query($qx);
    $nx = $rsx->num_rows;

    if ($bid == "") {
        echo "EBP";
    } else if ($nx >= 1) {
        echo "TAAB";
    } else if ($n0 >= 1) {
        echo "CBP";
    } else {
        if (is_numeric($bid)) {
            $q1 = "SELECT * FROM `item` WHERE `ItemId`='" . $itemId . "'";
            $rs1 = $conn->query($q1);
            $d1 = $rs1->fetch_assoc();

            $q = "INSERT INTO `bids` (`itemId`,`sellerId`,`buyerId`,`price`,`date`) 
            VALUES ('" . $itemId . "','" . $d1["sellerId"] . "','" . $_SESSION["user"]["buyerId"] . "','" . $bid . "','" . $date . "')";
            $rs = $conn->query($q);

            echo "Suc";
        } else {
            echo "EACBP";
        }
    }
}

if ($process == "edit") {
    $bid = $_POST["bid"];

    $q0 = "SELECT * FROM `bids` WHERE `ItemId`='" . $itemId . "' AND `price`='" . $bid . "'";
    $rs0 = $conn->query($q0);
    $n0 = $rs0->num_rows;

    $q = "SELECT * FROM `bids` WHERE `itemId`='" . $itemId . "' AND `buyerId`='" . $_SESSION["user"]["buyerId"] . "'";
    $rs = $conn->query($q);
    $n = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($bid == "") {
        echo "EBP";
    } else if ($bid == $d["price"]) {
        echo "CBP";
    } else if ($n0 >= 1) {
        echo "CBP2";
    } else {
        if (is_numeric($bid)) {
            $qv = "UPDATE `bids`SET `price`='" . $bid . "',`date`='" . $date . "' WHERE `bidId`='" . $d["bidId"] . "'";
            $rsv = $conn->query($qv);

            echo "Upt";
        } else {
            echo "EACBP";
        }
    }
}

if ($process == "del") {
    $bidId = $_POST["bidId"];

    $q0x = "DELETE FROM `bids` WHERE `bidId`='" . $bidId . "'";
    $rs0x = $conn->query($q0x);

    echo ("DC");
}

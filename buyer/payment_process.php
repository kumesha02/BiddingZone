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

if ($process == "pay") {
    $bidId = $_POST["bidId"];
    $name = $_POST["name"];
    $cardNo = $_POST["cardNo"];
    $expiryM = $_POST["expiryM"];
    $expiryY = $_POST["expiryY"];
    $cvv = $_POST["cvv"];

    $q = "SELECT * FROM `bids` WHERE `bidId`='" . $bidId . "'";
    $rs = $conn->query($q);
    $d = $rs->fetch_assoc();

    // set the time zone to Sri Lanka
    date_default_timezone_set('Asia/Colombo');

    // get the current time in Sri Lanka
    $dateM = date('m');
    $dateY = date('Y');

    // get the current time in Sri Lanka
    $date_time = date('Y-m-d H:i:s');

    if ($bidId == "" || $name == "" || $cardNo == "" || $expiryM == "" || $expiryY == "" || $cvv == "") {
        echo "FAD";
    } elseif (strlen($name) < 4 || strlen($name) > 50) {
        echo "IN";
    } elseif (!is_numeric($cardNo)) {
        echo "ICN";
    } elseif (strlen(strval($cardNo)) != 14) {
        echo "ICN";
    } elseif (!is_numeric($expiryY) || strlen(strval($expiryY)) < 4) {
        echo "IE";
    } elseif (!is_numeric($expiryM) || strlen(strval($expiryM)) < 2) {
        echo "IE";
    } elseif ($expiryY < $dateY) {
        echo "CE";
    } elseif ($expiryM < $dateM && $expiryY == $dateY) {
        echo "CE";
    } elseif (!is_numeric($cvv)) {
        echo "IC";
    } elseif (strlen(strval($cvv))  < 3 || strlen(strval($cvv))  > 3) {
        echo "IC";
    } else {
        $payment = $d["price"] + 250;
        $delivery_date = date('Y-m-d H:i:s', strtotime($date_time . ' +5 days'));

        $q0 = "UPDATE `buys` SET `payment_statusId`='2',`delivery_start_date`='" . $date_time . "',`delivery_date`='" . $delivery_date . "' 
        WHERE `bidId`='" . $bidId . "'";
        $rs0 = $conn->query($q0);

        $q1 = "INSERT INTO `delivery` (`itemId`,`deliveryAddress`,`delivery_method_Id`,`fees`,`time_duration`) 
        VALUES ('" . $d["itemId"] . "','" . $_SESSION["user"]["address"] . "','1','250','5 days')";
        $rs1 = $conn->query($q1);

        $q0 = "UPDATE `item` SET `statusId`='4' WHERE `itemId`='" . $d["itemId"] . "'";
        $rs0 = $conn->query($q0);

        echo "PS";
    }
}

if ($process == "cancel") {
    $bidId = $_POST["bidId"];

    $qx = "SELECT * FROM `bids` WHERE `bidId`='" . $bidId . "'";
    $rsx = $conn->query($qx);
    $dx = $rsx->fetch_assoc();

    $qx2 = "DELETE FROM `buys` WHERE `bidId`='" . $bidId . "'";
    $rsx2 = $conn->query($qx2);

    $qx3 = "DELETE FROM `bids` WHERE `bidId`='" . $bidId . "'";
    $rsx3 = $conn->query($qx3);

    $qx4 = "SELECT * FROM `bids` WHERE `itemId`='" . $dx["itemId"] . "' AND `price`=
    (SELECT MAX(price) FROM `bids` WHERE `itemId` = '" . $dx["itemId"] . "')";
    $rsx4 = $conn->query($qx4);
    $nx4 = $rsx4->num_rows;

    if ($nx4 >= 1) {
        $dx4 = $rsx4->fetch_assoc();

        $payment = $dx4["price"] + 250;

        // set the time zone to Sri Lanka
        date_default_timezone_set('Asia/Colombo');

        // get the current time in Sri Lanka
        $date = date('Y-m-d H:i:s');

        $qz4 = "INSERT INTO `buys` (`itemId`,`bidId`,`buyerId`,`bid_closed_date`,`payment`,`payment_methodId`,`payment_statusId`) VALUES 
        ('" . $dx["itemId"] . "','" . $dx4["bidId"] . "','" . $dx4["buyerId"] . "','" . $date . "','" . $payment . "','1','1')";
        $rsz4 = $conn->query($qz4);

        echo "STAA";
    } else {
        $qx5 = "UPDATE `item` SET `statusId`='2' WHERE `itemId`='" . $dx["itemId"] . "'";
        $rsx5 = $conn->query($qx5);

        echo "PC";
    }
}

<?php
session_start();

$conn = new mysqli(
    "localhost",
    "root",
    "Ravi400500lak@",
    "bidding-web",
    "3306"
);

$bidId = $_POST["bidId"];

$q = "SELECT * FROM `bids` WHERE `bidId`='" . $bidId . "'";
$rs = $conn->query($q);
$d = $rs->fetch_assoc();

$orderId = $_POST["orderId"];

$payment = $d["price"] + 250;

$merchant_id = "1222631";
$order_id = $orderId;
$amount = $payment . ".00";
$currency = "LKR";
$merchant_secret = "MzAxNzMxNDk0NjI0NDc1MjM2Njc0Njc3MjA1NDMzNTIzMDg3NDk=";

$hash = strtoupper(
    md5(
        $merchant_id .
            $order_id .
            number_format($amount, 2, '.', '') .
            $currency .
            strtoupper(md5($merchant_secret))
    )
);

echo ($hash);

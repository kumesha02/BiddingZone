<?php

session_start();

if (!isset($_SESSION["user"])) {
    // Redirect to a specific web page
    header("Location: index.php");

    // Make sure that code below the redirect is not executed
    exit;
}

$conn = new mysqli(
    "localhost",
    "root",
    "Ravi400500lak@",
    "bidding_web",
    "3306"
);

$msg = $_POST["msg"];
$invoiceId = $_POST["invoiceId"];

$q2 = "INSERT INTO `feedback` (`InvoiceId`,`feedback_text`) VALUES ('" . $invoiceId . "','" . $msg . "')";
$rs2 = $conn->query($q2);

echo "FS";

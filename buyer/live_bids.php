<?php
session_start();

$conn = new mysqli(
    "localhost",
    "root",
    "Ravi400500lak@",
    "bidding_web",
    "3306"
);

$itemId = $_POST["itemId"];

$q = "SELECT * FROM `bids` WHERE `ItemId`='" . $itemId . "' AND `buyerId`!='" . $_SESSION["user"]["buyerId"] . "'";
$rs = $conn->query($q);
$n = $rs->num_rows;

for ($i = 0; $i < $n; $i++) {

    $d = $rs->fetch_assoc();

    $q0 = "SELECT * FROM `buyer` WHERE `buyerId`='" . $d["buyerId"] . "'";
    $rs0 = $conn->query($q0);
    $d0 = $rs0->fetch_assoc();

    $q1 = "SELECT * FROM `item` WHERE `itemId`='" . $d["itemId"] . "'";
    $rs1 = $conn->query($q1);
    $d1 = $rs1->fetch_assoc();

    $q2 = "SELECT * FROM `category` WHERE `categoryId`='" . $d1["categoryId"] . "'";
    $rs2 = $conn->query($q2);
    $d2 = $rs2->fetch_assoc();

?>
    <tr>
        <td><?php echo $d["bidId"]; ?></td>
        <td><?php echo $d0["fname"]; ?> <?php echo $d0["lname"]; ?></td>
        <td><?php echo $d1["title"]; ?></td>
        <td><?php echo $d2["category"]; ?></td>
        <td><img src="seller/<?php echo $d1["photo1"]; ?>" style="max-height: 60px;" alt="" class="img-fluid rounded"></td>
        <td>Rs. <b class="blink-text text-danger"><?php echo $d["price"]; ?>.00</b></td>
        <td><?php echo $d1["auctionStart"]; ?></td>
        <td><b class="blink-text text-danger"><?php echo $d1["auctionEnd"]; ?></b></td>
        <td><button type="button" class="btn btn-primary btn-sm" style="font-size: 12px;">Bidding Open</button></td>
    </tr>
<?php
}

?>
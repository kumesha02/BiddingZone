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

if ($process == "add") {

    $conn = new mysqli(
        "localhost",
        "root",
        "Ravi400500lak@",
        "bidding_web",
        "3306"
    );

    $img_length = $_POST["length"];
    $title = $_POST["title"];
    $start_time = $_POST["start_time"];
    $start_date = $_POST["start_date"];
    $end_time = $_POST["end_time"];
    $end_date = $_POST["end_date"];
    $price = $_POST["price"];
    $category = $_POST["category"];
    $condition = $_POST["condition"];
    $description = $_POST["description"];

    // set the time zone to Sri Lanka
    date_default_timezone_set('Asia/Colombo');

    // get the current time in Sri Lanka
    $date = date('Y-m-d');

    // get the current time in Sri Lanka
    $time = date('H:i');

    if (strlen($title) < 2 || strlen($title) > 100) {
        echo ("IT");
    } elseif ($img_length < 1) {
        echo ("SAI");
    } elseif ($img_length > 4) {
        echo ("IIC");
    } elseif ($start_time == "" || $start_date == "") {
        echo ("SASTD");
    } elseif ($end_time == "" || $end_date == "") {
        echo ("SAETD");
    } elseif ($price == "") {
        echo ("AP");
    } elseif ($category == "Select a Category") {
        echo ("SAC");
    } elseif ($description == "") {
        echo ("AID");
    } elseif ($start_date < $date) {
        echo ("IASDT1");
    } elseif ($start_date == $date && $start_time < $time) {
        echo ("IASDT2");
    } elseif ($end_date < $date || $end_date < $start_date) {
        echo ("IAEDT3");
    } elseif ($start_date == $end_date && $end_time <= $start_time) {
        echo ("IAEDT4");
    } else {

        if ($description != "") {
            // Define the file path and name
            $file_path = "items_des//"; // Update with your desired folder path
            $file_name = "text" . uniqid() . ".txt"; // Update with your desired file name

            // Combine the path and name to create the full file path
            $full_file_path = $file_path . $file_name;

            // Save the text to the file
            file_put_contents($full_file_path, $description);
        }

        if ($img_length >= 1) {

            $array_length = sizeof($_FILES);

            $allowed_file_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

            for ($x = 0; $x < $array_length; $x++) {

                $status = "not-done";

                $image_file = $_FILES["image" . $x];
                $image_extention = $image_file["type"];

                if (in_array($image_extention, $allowed_file_extentions)) {

                    $new_img_extention;

                    if ($image_extention == "image/jpg") {
                        $new_img_extention = ".jpg";
                    } elseif ($image_extention == "image/jpeg") {
                        $new_img_extention = ".jpeg";
                    } elseif ($image_extention == "image/png") {
                        $new_img_extention = ".png";
                    } elseif ($image_extention == "image/svg+xml") {
                        $new_img_extention = ".svg";
                    }

                    $path = "items_img//" . uniqid() . $new_img_extention;
                    move_uploaded_file($image_file["tmp_name"], $path);

                    $photo[$x] = $path;
                    $status = "done";
                } else {
                    echo ("IFT");
                }
            }

            if ($status == "done") {

                if ($array_length == 1) {
                    $q = "INSERT INTO `item` (`sellerId`,`title`,`categoryId`,`biding_start_price`,`auctionStart`,`auctionEnd`,`description`,
                    `condition`,`photo1`,`statusId`)
                    VALUES ('" . $_SESSION["user"]["sellerId"] . "','" . $title . "','" . $category . "','" . $price . "','" . $start_date . " " . $start_time . "',
                    '" . $end_date . " " . $end_time . "','" . $full_file_path . "','" . $condition . "','" . $photo[0] . "','1')";
                    $rs = $conn->query($q);

                    $q11 = "SELECT * FROM `item` WHERE `photo1`='" . $photo[0] . "'";
                    $rs11 = $conn->query($q11);
                    $d11 = $rs11->fetch_assoc();

                    echo $d11["itemId"];
                } elseif ($array_length == 2) {
                    $q = "INSERT INTO `item` (`sellerId`,`title`,`categoryId`,`biding_start_price`,`auctionStart`,`auctionEnd`,`description`,
                    `condition`,`photo1`,`photo2`,`statusId`)
                    VALUES ('" . $_SESSION["user"]["sellerId"] . "','" . $title . "','" . $category . "','" . $price . "','" . $start_date . " " . $start_time . "',
                    '" . $end_date . " " . $end_time . "','" . $full_file_path . "','" . $condition . "','" . $photo[0] . "','" . $photo[1] . "','1')";
                    $rs = $conn->query($q);

                    $q11 = "SELECT * FROM `item` WHERE `photo1`='" . $photo[0] . "'";
                    $rs11 = $conn->query($q11);
                    $d11 = $rs11->fetch_assoc();

                    echo $d11["itemId"];
                } elseif ($array_length == 3) {
                    $q = "INSERT INTO `item` (`sellerId`,`title`,`categoryId`,`biding_start_price`,`auctionStart`,`auctionEnd`,`description`,
                    `condition`,`photo1`,`photo2`,`photo3`,`statusId`)
                    VALUES ('" . $_SESSION["user"]["sellerId"] . "','" . $title . "','" . $category . "','" . $price . "','" . $start_date . " " . $start_time . "',
                    '" . $end_date . " " . $end_time . "','" . $full_file_path . "','" . $condition . "','" . $photo[0] . "','" . $photo[1] . "','" . $photo[2] . "','1')";
                    $rs = $conn->query($q);

                    $q11 = "SELECT * FROM `item` WHERE `photo1`='" . $photo[0] . "'";
                    $rs11 = $conn->query($q11);
                    $d11 = $rs11->fetch_assoc();

                    echo $d11["itemId"];
                } elseif ($array_length == 4) {
                    $q = "INSERT INTO `item` (`sellerId`,`title`,`categoryId`,`biding_start_price`,`auctionStart`,`auctionEnd`,`description`,
                    `condition`,`photo1`,`photo2`,`photo3`,`photo4`,`statusId`)
                    VALUES ('" . $_SESSION["user"]["sellerId"] . "','" . $title . "','" . $category . "','" . $price . "','" . $start_date . " " . $start_time . "',
                    '" . $end_date . " " . $end_time . "','" . $full_file_path . "','" . $condition . "','" . $photo[0] . "','" . $photo[1] . "','" . $photo[2] . "','" . $photo[3] . "','1')";
                    $rs = $conn->query($q);

                    $q11 = "SELECT * FROM `item` WHERE `photo1`='" . $photo[0] . "'";
                    $rs11 = $conn->query($q11);
                    $d11 = $rs11->fetch_assoc();

                    echo $d11["itemId"];
                }
                // echo $title;
                // echo "---------";
                // echo $start_time;
                // echo "---------";
                // echo $start_date;
                // echo "---------";
                // echo $end_time;
                // echo "---------";
                // echo $end_date;
                // echo "---------";
                // echo $price;
                // echo "---------";
                // echo $category;
                // echo "---------";
                // echo $condition;
                // echo "---------";
                // echo $description;
                // echo "---------";
                // echo $photo[0];
                // echo "---------";
                // echo $photo[1];
                // echo "---------";
                // echo $photo[2];
                // echo "---------";
                // echo $array_length;
                // echo "---------";
            }
        }
    }
}

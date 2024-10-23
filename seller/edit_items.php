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

if ($process == "save") {

    $itemId = $_POST["itemId"];
    $img_change = $_POST["img_change"];
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

    $qx = "SELECT * FROM `item` WHERE `itemId`='" . $itemId . "'";
    $rsx = $conn->query($qx);
    $dx = $rsx->fetch_assoc();

    // set the time zone to Sri Lanka
    date_default_timezone_set('Asia/Colombo');

    // get the current time in Sri Lanka
    $date = date('Y-m-d');

    // get the current time in Sri Lanka
    $time = date('H:i');

    $auctionStart = $dx["auctionStart"];
    $array = explode(" ", $auctionStart);

    $auctionEnd = $dx["auctionEnd"];
    $array2 = explode(" ", $auctionEnd);

    $file_path = $dx["description"]; // Update with the actual file path

    // Check if the file exists
    if (file_exists($file_path)) {
        // Read the file content
        $content = file_get_contents($file_path);
    }

    if (
        $title != $dx["title"] || $start_time != $array[1] || $start_date != $array[0] || $end_time != $array2[1] ||
        $end_date != $array2[0] || $price != $dx["biding_start_price"] || $category != $dx["categoryId"] ||
        $condition != $dx["condition"] || $description != $content || $img_change == "changed"
    ) {
        if ((strlen($title) < 2 || strlen($title) > 20) && $title != $dx["title"]) {
            echo ("IT");
        } elseif ($img_length < 1 && $img_change == "changed") {
            echo ("SAI");
        } elseif ($img_length > 4 && $img_change == "changed") {
            echo ("IIC");
        } elseif (($start_time == "" || $start_date == "") && ($start_time != $array[1] || $start_date != $array[0])) {
            echo ("SASTD");
        } elseif (($end_time == "" || $end_date == "") && ($end_time != $array2[1] || $end_date != $array2[0])) {
            echo ("SAETD");
        } elseif ($price == "" && $price != $dx["biding_start_price"]) {
            echo ("AP");
        } elseif ($description == "" && $description != $content) {
            echo ("AID");
        } elseif ($start_date < $date && $start_date != $array[0]) {
            echo ("IASDT1");
        } elseif (($start_date <= $date && $start_time < $time) && ($start_time != $array[1] || $start_date != $array[0])) {
            echo ("IASDT2");
        } elseif (($end_date < $date || $end_date < $start_date) && ($start_time != $array[1] || $start_date != $array[0] || $end_time != $array2[1] || $end_date != $array2[0])) {
            echo ("IAEDT3");
        } elseif (($end_time < $time && $end_date == $date) && ($start_time != $array[1] || $start_date != $array[0] || $end_time != $array2[1] || $end_date != $array2[0])) {
            echo ("IAEDT3");
        } elseif (($start_date == $end_date && $end_time <= $start_time) && ($start_time != $array[1] || $start_date != $array[0] || $end_time != $array2[1] ||
            $end_date != $array2[0])) {
            echo ("IAEDT4");
        } else {

            $status = "not";

            if ($img_length >= 1 && $img_change == "changed") {

                $array_length = sizeof($_FILES);

                $allowed_file_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

                for ($x = 0; $x < $array_length; $x++) {

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
                        $status = "not-done";
                    }
                }
            }

            if ($status == "done" || $status == "not") {
                if ($status == "done") {
                    if (file_exists($dx["photo1"])) {
                        unlink($dx["photo1"]);
                    }
                    if (file_exists($dx["photo2"])) {
                        unlink($dx["photo2"]);
                    }

                    if (file_exists($dx["photo3"])) {
                        unlink($dx["photo3"]);
                    }

                    if (file_exists($dx["photo4"])) {
                        unlink($dx["photo4"]);
                    }

                    if ($array_length == 1) {
                        $q = "UPDATE `item` SET `photo1`='" . $photo[0] . "',`photo2`=NULL ,`photo3`=NULL ,`photo4`=NULL  WHERE itemId='" . $itemId . "'";
                        $rs = $conn->query($q);

                        echo "2";
                    } elseif ($array_length == 2) {
                        $q = "UPDATE `item` SET `photo1`='" . $photo[0] . "',`photo2`='" . $photo[1] . "' ,`photo3`=NULL ,`photo4`=NULL  WHERE itemId='" . $itemId . "'";
                        $rs = $conn->query($q);

                        echo "2";
                    } elseif ($array_length == 3) {
                        $q = "UPDATE `item` SET `photo1`='" . $photo[0] . "',`photo2`='" . $photo[1] . "' ,`photo3`='" . $photo[2] . "' ,`photo4`=NULL  WHERE itemId='" . $itemId . "'";
                        $rs = $conn->query($q);

                        echo "2";
                    } elseif ($array_length == 4) {
                        $q = "UPDATE `item` SET `photo1`='" . $photo[0] . "',`photo2`='" . $photo[1] . "' ,`photo3`='" . $photo[2] . "' ,`photo4`='" . $photo[3] . "'  WHERE itemId='" . $itemId . "'";
                        $rs = $conn->query($q);

                        echo "2";
                    }
                }

                if ($description != "" && $description != $content) {

                    if (file_exists($dx["description"])) {
                        unlink($dx["description"]);
                    }
                    // Define the file path and name
                    $file_path = "items_des//"; // Update with your desired folder path
                    $file_name = "text" . uniqid() . ".txt"; // Update with your desired file name

                    // Combine the path and name to create the full file path
                    $full_file_path = $file_path . $file_name;

                    // Save the text to the file
                    file_put_contents($full_file_path, $description);

                    $qx2 = "UPDATE `item` SET `description`='" . $full_file_path . "' WHERE itemId='" . $itemId . "'";
                    $rsx2 = $conn->query($qx2);

                    echo "1";
                }


                if ($title != $dx["title"]) {
                    $q1 = "UPDATE `item` SET `title`='" . $title . "' WHERE itemId='" . $itemId . "'";
                    $rs1 = $conn->query($q1);

                    echo "3";
                }

                // if ($start_time != $array[1] || $start_date != $array[0]) {
                //     $q2 = "UPDATE `item` SET `auctionStart`='" . $start_date . " " . $start_time . "' WHERE itemId='" . $itemId . "'";
                //     $rs2 = $conn->query($q2);

                //     echo "4";
                // }

                if ($end_time != $array2[1] || $end_date != $array2[0]) {
                    $q3 = "UPDATE `item` SET `auctionEnd`='" . $end_date . " " . $end_time . "',`statusId`='1' WHERE itemId='" . $itemId . "'";
                    $rs3 = $conn->query($q3);

                    echo "5";
                }

                if ($price != $dx["biding_start_price"] && $dx["statusId"] == "2") {
                    $q4 = "UPDATE `item` SET `biding_start_price`='" . $price . "' WHERE itemId='" . $itemId . "'";
                    $rs4 = $conn->query($q4);

                    echo "6";
                }

                if ($category != $dx["categoryId"]) {
                    $q5 = "UPDATE `item` SET `categoryId`='" . $category . "' WHERE itemId='" . $itemId . "'";
                    $rs5 = $conn->query($q5);

                    echo "7";
                }

                if ($condition != $dx["condition"]) {
                    $q6 = "UPDATE `item` SET `condition`='" . $condition . "' WHERE itemId='" . $itemId . "'";
                    $rs6 = $conn->query($q6);

                    echo "8";
                }
            }
        }
    } else {
        echo "NDC";
    }
}

if ($process == "del") {

    $itemId = $_POST["itemId"];

    $qy = "SELECT * FROM `item` WHERE `itemId`='" . $itemId . "'";
    $rsy = $conn->query($qy);
    $dy = $rsy->fetch_assoc();

    if (file_exists($dy["photo1"])) {
        unlink($dy["photo1"]);
    }
    if (file_exists($dy["photo2"])) {
        unlink($dy["photo2"]);
    }

    if (file_exists($dy["photo3"])) {
        unlink($dy["photo3"]);
    }

    if (file_exists($dy["photo4"])) {
        unlink($dy["photo4"]);
    }

    if (file_exists($dy["description"])) {
        unlink($dy["description"]);
    }

    $qy1 = "DELETE FROM `item` WHERE `itemId`='" . $itemId . "'";
    $rsy1 = $conn->query($qy1);

    echo "Suc";
}

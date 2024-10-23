<?php
session_start();

$conn = new mysqli(
    "localhost",
    "root",
    "Ravi400500lak@",
    "bidding_web",
    "3306"
);

$search_input = $_POST["search_input"];
$category = $_POST["category"];

if ($search_input == "" && $category == "Select a Category") {
    $q = "SELECT * FROM `item` WHERE `statusId`='1' ORDER BY item.auctionEnd ASC";
    $rs = $conn->query($q);
    $n = $rs->num_rows;

    for ($i = 0; $i < $n; $i++) {
        $d = $rs->fetch_assoc();
?>
        <!-- Products set 1-->
        <div class="row">
            <div class="col">
                <div class="mt-2">
                    <div class="d-flex justify-content-center row">

                        <div class="col-12 col-md-10">

                            <!-- Product 1 -->
                            <div class="row p-2 bg-blackish border rounded bg-blackish my-3">

                                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded" src="seller/<?php echo $d["photo1"]; ?>"></div>
                                <div class="col-md-6 mt-1">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <?php
                                            $qy = "SELECT * FROM `category` WHERE `categoryId`='" . $d["categoryId"] . "'";
                                            $rsy = $conn->query($qy);
                                            $dy = $rsy->fetch_assoc();
                                            ?>
                                            <h5 class="pf text-warning"><span class="text-secondary">Category >>> </span><?php echo $dy["category"]; ?></h5>
                                        </div>

                                        <h5 class="pf text-primary"><?php echo $d["title"]; ?></h5>

                                        <div class="col text-center my-1">
                                            <h6 class="text-dark rounded p-1" style="background-color: #95f48d;">Auction Started - <?php echo $d["auctionStart"]; ?></h6>
                                            <h6 class="text-light bg-danger rounded p-1">Auction Ending - <span class="blink-text text-dark"><b><?php echo $d["auctionEnd"]; ?></b></span></h6>
                                        </div>
                                        <div class="bg-light rounded p-2 mb-3" style="overflow-y: scroll; max-height: 200px; opacity: 90%;">
                                            <div>
                                                <p class="text-justify fs-5 para text-muted text-truncate mb-0">
                                                    <?php
                                                    $file_path =  $d["description"]; // Update with the actual file path

                                                    // Check if the file exists
                                                    if (file_exists($file_path)) {
                                                        // Read the file content
                                                        $content = file_get_contents($file_path);

                                                        // Echo the content
                                                        echo $content;
                                                    } else {
                                                        echo "No Details";
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="justify-content-center align-middle col-md-3 mt-1">

                                    <div class="d-flex flex-row align-items-center">
                                        <h4 class="me-1">Rs. <?php echo $d["biding_start_price"]; ?>.00</h4>
                                        <!-- <span class="text-danger" style="text-decoration:line-through">$20.99</span> -->
                                    </div>

                                    <h6 class="text-danger">Paid delivery</h6>

                                    <div class="d-flex flex-row">
                                        <div class="col p-1 rounded text-center" style="background-color: #7afefe;">
                                            <?php
                                            $qx = "SELECT * FROM `seller` WHERE `sellerId`='" . $d["sellerId"] . "'";
                                            $rsx = $conn->query($qx);
                                            $dx = $rsx->fetch_assoc();
                                            ?>
                                            <h6>Seller -
                                                <br><span style="color: brown;"><?php echo $dx["fname"]; ?> <?php echo $dx["lname"]; ?></span>
                                            </h6>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column mt-4">
                                        <a href="guest_product_view.php?item_id=<?php echo $d["itemId"]; ?>" class="btn btn-primary btn-sm" type="button">Details</a>

                                        <button onclick="bidNow();" class="btn btn-warning btn-sm mt-2" type="button">
                                            <i class="bi bi-hammer"></i> Bid Now
                                        </button>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Products set 1 -->
    <?php
    }
} elseif ($search_input != "" && $category == "Select a Category") {
    $q = "SELECT * FROM `item` WHERE `title` LIKE '" . $search_input . "%' AND `statusId`='1'";
    $rs = $conn->query($q);
    $n = $rs->num_rows;

    for ($i = 0; $i < $n; $i++) {
        $d = $rs->fetch_assoc();
    ?>
        <!-- Products set 1-->
        <div class="row">
            <div class="col">
                <div class="mt-2">
                    <div class="d-flex justify-content-center row">

                        <div class="col-12 col-md-10">

                            <!-- Product 1 -->
                            <div class="row p-2 bg-blackish border rounded bg-blackish my-3">

                                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded" src="seller/<?php echo $d["photo1"]; ?>"></div>
                                <div class="col-md-6 mt-1">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <?php
                                            $qy = "SELECT * FROM `category` WHERE `categoryId`='" . $d["categoryId"] . "'";
                                            $rsy = $conn->query($qy);
                                            $dy = $rsy->fetch_assoc();
                                            ?>
                                            <h5 class="pf text-warning"><span class="text-secondary">Category >>> </span><?php echo $dy["category"]; ?></h5>
                                        </div>

                                        <h5 class="pf text-primary"><?php echo $d["title"]; ?></h5>

                                        <div class="col text-center my-1">
                                            <h6 class="text-dark rounded p-1" style="background-color: #95f48d;">Auction Started - <?php echo $d["auctionStart"]; ?></h6>
                                            <h6 class="text-light bg-danger rounded p-1">Auction Ending - <span class="blink-text text-dark"><b><?php echo $d["auctionEnd"]; ?></b></span></h6>
                                        </div>
                                        <div class="bg-light rounded p-2 mb-3" style="overflow-y: scroll; max-height: 200px; opacity: 90%;">
                                            <div>
                                                <p class="text-justify fs-5 para text-muted text-truncate mb-0">
                                                    <?php
                                                    $file_path =  $d["description"]; // Update with the actual file path

                                                    // Check if the file exists
                                                    if (file_exists($file_path)) {
                                                        // Read the file content
                                                        $content = file_get_contents($file_path);

                                                        // Echo the content
                                                        echo $content;
                                                    } else {
                                                        echo "No Details";
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="justify-content-center align-middle col-md-3 mt-1">

                                    <div class="d-flex flex-row align-items-center">
                                        <h4 class="me-1">Rs. <?php echo $d["biding_start_price"]; ?>.00</h4>
                                        <!-- <span class="text-danger" style="text-decoration:line-through">$20.99</span> -->
                                    </div>

                                    <h6 class="text-danger">Paid delivery</h6>

                                    <div class="d-flex flex-row">
                                        <div class="col p-1 rounded text-center" style="background-color: #7afefe;">
                                            <?php
                                            $qx = "SELECT * FROM `seller` WHERE `sellerId`='" . $d["sellerId"] . "'";
                                            $rsx = $conn->query($qx);
                                            $dx = $rsx->fetch_assoc();
                                            ?>
                                            <h6>Seller -
                                                <br><span style="color: brown;"><?php echo $dx["fname"]; ?> <?php echo $dx["lname"]; ?></span>
                                            </h6>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column mt-4">
                                        <a href="guest_product_view.php?item_id=<?php echo $d["itemId"]; ?>" class="btn btn-primary btn-sm" type="button">Details</a>

                                        <button onclick="bidNow();" class="btn btn-warning btn-sm mt-2" type="button">
                                            <i class="bi bi-hammer"></i> Bid Now
                                        </button>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Products set 1 -->
    <?php
    }
} elseif ($search_input == "" && $category != "Select a Category") {
    $q = "SELECT * FROM `item` WHERE `categoryId`='" . $category . "' AND `statusId`='1'";
    $rs = $conn->query($q);
    $n = $rs->num_rows;

    for ($i = 0; $i < $n; $i++) {
        $d = $rs->fetch_assoc();
    ?>
        <!-- Products set 1-->
        <div class="row">
            <div class="col">
                <div class="mt-2">
                    <div class="d-flex justify-content-center row">

                        <div class="col-12 col-md-10">

                            <!-- Product 1 -->
                            <div class="row p-2 bg-blackish border rounded bg-blackish my-3">

                                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded" src="seller/<?php echo $d["photo1"]; ?>"></div>
                                <div class="col-md-6 mt-1">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <?php
                                            $qy = "SELECT * FROM `category` WHERE `categoryId`='" . $d["categoryId"] . "'";
                                            $rsy = $conn->query($qy);
                                            $dy = $rsy->fetch_assoc();
                                            ?>
                                            <h5 class="pf text-warning"><span class="text-secondary">Category >>> </span><?php echo $dy["category"]; ?></h5>
                                        </div>

                                        <h5 class="pf text-primary"><?php echo $d["title"]; ?></h5>

                                        <div class="col text-center my-1">
                                            <h6 class="text-dark rounded p-1" style="background-color: #95f48d;">Auction Started - <?php echo $d["auctionStart"]; ?></h6>
                                            <h6 class="text-light bg-danger rounded p-1">Auction Ending - <span class="blink-text text-dark"><b><?php echo $d["auctionEnd"]; ?></b></span></h6>
                                        </div>
                                        <div class="bg-light rounded p-2 mb-3" style="overflow-y: scroll; max-height: 200px; opacity: 90%;">
                                            <div>
                                                <p class="text-justify fs-5 para text-muted text-truncate mb-0">
                                                    <?php
                                                    $file_path =  $d["description"]; // Update with the actual file path

                                                    // Check if the file exists
                                                    if (file_exists($file_path)) {
                                                        // Read the file content
                                                        $content = file_get_contents($file_path);

                                                        // Echo the content
                                                        echo $content;
                                                    } else {
                                                        echo "No Details";
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="justify-content-center align-middle col-md-3 mt-1">

                                    <div class="d-flex flex-row align-items-center">
                                        <h4 class="me-1">Rs. <?php echo $d["biding_start_price"]; ?>.00</h4>
                                        <!-- <span class="text-danger" style="text-decoration:line-through">$20.99</span> -->
                                    </div>

                                    <h6 class="text-danger">Paid delivery</h6>

                                    <div class="d-flex flex-row">
                                        <div class="col p-1 rounded text-center" style="background-color: #7afefe;">
                                            <?php
                                            $qx = "SELECT * FROM `seller` WHERE `sellerId`='" . $d["sellerId"] . "'";
                                            $rsx = $conn->query($qx);
                                            $dx = $rsx->fetch_assoc();
                                            ?>
                                            <h6>Seller -
                                                <br><span style="color: brown;"><?php echo $dx["fname"]; ?> <?php echo $dx["lname"]; ?></span>
                                            </h6>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column mt-4">
                                        <a href="guest_product_view.php?item_id=<?php echo $d["itemId"]; ?>" class="btn btn-primary btn-sm" type="button">Details</a>

                                        <button onclick="bidNow();" class="btn btn-warning btn-sm mt-2" type="button">
                                            <i class="bi bi-hammer"></i> Bid Now
                                        </button>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Products set 1 -->
    <?php
    }
} elseif ($search_input != "" && $category != "Select a Category") {
    $q = "SELECT * FROM `item` WHERE `title` LIKE '" . $search_input . "%' AND `categoryId`='" . $category . "' AND `statusId`='1'";
    $rs = $conn->query($q);
    $n = $rs->num_rows;

    for ($i = 0; $i < $n; $i++) {
        $d = $rs->fetch_assoc();
    ?>
        <!-- Products set 1-->
        <div class="row">
            <div class="col">
                <div class="mt-2">
                    <div class="d-flex justify-content-center row">

                        <div class="col-12 col-md-10">

                            <!-- Product 1 -->
                            <div class="row p-2 bg-blackish border rounded bg-blackish my-3">

                                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded" src="seller/<?php echo $d["photo1"]; ?>"></div>
                                <div class="col-md-6 mt-1">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <?php
                                            $qy = "SELECT * FROM `category` WHERE `categoryId`='" . $d["categoryId"] . "'";
                                            $rsy = $conn->query($qy);
                                            $dy = $rsy->fetch_assoc();
                                            ?>
                                            <h5 class="pf text-warning"><span class="text-secondary">Category >>> </span><?php echo $dy["category"]; ?></h5>
                                        </div>

                                        <h5 class="pf text-primary"><?php echo $d["title"]; ?></h5>

                                        <div class="col text-center my-1">
                                            <h6 class="text-dark rounded p-1" style="background-color: #95f48d;">Auction Started - <?php echo $d["auctionStart"]; ?></h6>
                                            <h6 class="text-light bg-danger rounded p-1">Auction Ending - <span class="blink-text text-dark"><b><?php echo $d["auctionEnd"]; ?></b></span></h6>
                                        </div>
                                        <div class="bg-light rounded p-2 mb-3" style="overflow-y: scroll; max-height: 200px; opacity: 90%;">
                                            <div>
                                                <p class="text-justify fs-5 para text-muted text-truncate mb-0">
                                                    <?php
                                                    $file_path =  $d["description"]; // Update with the actual file path

                                                    // Check if the file exists
                                                    if (file_exists($file_path)) {
                                                        // Read the file content
                                                        $content = file_get_contents($file_path);

                                                        // Echo the content
                                                        echo $content;
                                                    } else {
                                                        echo "No Details";
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="justify-content-center align-middle col-md-3 mt-1">

                                    <div class="d-flex flex-row align-items-center">
                                        <h4 class="me-1">Rs. <?php echo $d["biding_start_price"]; ?>.00</h4>
                                        <!-- <span class="text-danger" style="text-decoration:line-through">$20.99</span> -->
                                    </div>

                                    <h6 class="text-danger">Paid delivery</h6>

                                    <div class="d-flex flex-row">
                                        <div class="col p-1 rounded text-center" style="background-color: #7afefe;">
                                            <?php
                                            $qx = "SELECT * FROM `seller` WHERE `sellerId`='" . $d["sellerId"] . "'";
                                            $rsx = $conn->query($qx);
                                            $dx = $rsx->fetch_assoc();
                                            ?>
                                            <h6>Seller -
                                                <br><span style="color: brown;"><?php echo $dx["fname"]; ?> <?php echo $dx["lname"]; ?></span>
                                            </h6>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column mt-4">
                                        <a href="guest_product_view.php?item_id=<?php echo $d["itemId"]; ?>" class="btn btn-primary btn-sm" type="button">Details</a>

                                        <button onclick="bidNow();" class="btn btn-warning btn-sm mt-2" type="button">
                                            <i class="bi bi-hammer"></i> Bid Now
                                        </button>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Products set 1 -->
<?php
    }
}

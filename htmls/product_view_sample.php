<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="img/electronics-icon-2.jpg">
    <title>New Tech Product View</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.products&cart.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body class="text-dark gradient-custom" style="height: 100vh;">

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #3d3d3d;">

        <div class="container-fluid">

            <img src="img/electronics-icon-2.jpg" alt="" class="img-fluid mx-1" style="height: 30px;">
            <a class="navbar-brand dicovery" href="index.html"
                style="color: rgb(163, 212, 255); padding: 0%; line-height: 20px;">NEW TECH</br>
                <span style="font-size: 18px; font-family: tillium; letter-spacing: 5.4px;">Electronics</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <div class="navbar-nav me-auto mb-2 mb-lg-0">

                    <div class="nav-item y ms-lg-5 me-lg-4 me-xl-5">
                        <a class="nav-link tillium" aria-current="page" href="index.html"><i
                                class="bi bi-house-door-fill me-1"></i>HOME</a>
                    </div>

                    <div class="nav-item y me-lg-4 me-xl-5 tillium">
                        <a class="nav-link active" href="#"><i class="bi bi-bag-fill me-1"></i>PRODUCTS</a>
                    </div>

                    <div class="nav-item dropdown y tillium">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="bi bi-person-circle me-1"></i>
                            ACCOUNT
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" style="background-color: #585858;">
                            <li>
                                <a class="dropdown-item" href="login.html"><i
                                        class="bi bi-door-open-fill me-1"></i>Login</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="register.html"><i
                                        class="bi bi-person-plus-fill me-1"></i>Register</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"><i class="bi bi-person-fill-gear me-1"></i>
                                    Account Settings</a>
                            </li>
                        </ul>
                    </div>

                </div>

                <div>

                    <button type="button" class="btn btn-outline-danger me-3 position-relative"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="bi bi-heart-fill"></i> Watchlist
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            4+
                            <span class="visually-hidden">items</span>
                        </span>
                    </button>

                    <a class="btn btn-outline-warning me-2" href="cart.html">
                        <i class="bi bi-cart-fill me-1"></i>Cart
                    </a>

                </div>

            </div>
        </div>
    </nav>

    <main class="container-fluid">

        <div class="row d-flex justify-content-center my-3">

            <div class="col-11 col-md-5 mx-0 mx-sm-0 mx-md-1  bg-light p-3 rounded">
                <img src="img/products/Best-Arduino-Kit.jpg" alt="" class="img-fluid rounded">
            </div>

            <div class="col-11 col-md-5 mx-0 mx-sm-0 mx-md-1 mt-3 mt-sm-3 mt-md-0 bg-light p-3 rounded">

                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/products/Best-Arduino-Kit.jpg" class="img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/products/Best-Arduino-Kit.jpg" class="img-fluid" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="img/products/Best-Arduino-Kit.jpg" class="img-fluid" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"
                            style="background-color: #3d3d3dd0; border-radius: 15px;"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"
                            style="background-color: #3d3d3dd0; border-radius: 15px;"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-11 col-md-10 p-3 mt-3 bg-light rounded">

                <div class="row">

                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="products.html">Products</a></li>
                                <li class="breadcrumb-item active">Prouduct View</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="col-12">
                        <div class="col">
                            <h3 class="pf text-primary">Best Arduino Kit</h3>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-flex flex-row align-items-center">
                            <h3 class="me-1">$13.99</h3><span class="text-danger"
                                style="text-decoration:line-through">$20.99</span>
                        </div>

                        <h6 class="text-success"><i class="bi bi-truck"></i> Free delivery</h6>
                    </div>

                    <div class="col-12 mb-1">
                        <div class="d-flex flex-row">
                            <div class="text-danger me-2">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <span>310 Reviews & Ratings</span>
                        </div>
                    </div>

                    <div class="col-12">
                        <span><i class="bi bi-circle-fill text-primary" style="font-size: 10px;"></i>
                            100% original
                        </span>
                        <i class="bi bi-circle-fill text-primary ms-1" style="font-size: 10px;"></i>
                        <span>Light weight</span>
                        <i class="bi bi-circle-fill text-primary ms-1" style="font-size: 10px;"></i>
                        <span>Best finish<br></span>
                    </div>

                    <div class="col-12">
                        <span><i class="bi bi-circle-fill text-primary" style="font-size: 10px;"></i>
                            Standard design</span>
                        <i class="bi bi-circle-fill text-primary ms-1" style="font-size: 10px;"></i>
                        <span>For developers</span>
                        <i class="bi bi-circle-fill text-primary ms-1" style="font-size: 10px;"></i>
                        <span>Quality Tested<br></span>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-8 col-xxl-8">
                        <p class="text-justify para">
                        <h6>Details</h6>
                        Arduino IoT Bundle allows you to
                        build your next smart project. Ever wanted an automated house? Or a smart
                        garden? Well, now it’s easy with the Arduino IoT Cloud compatible boards. It
                        means: you can connect devices, visualize data, control and share your projects
                        from anywhere in the world.
                        </p>
                    </div>

                    <div class="col-12">
                        <ul style="list-style: square; font-weight: bold;">
                            <li>Warranty : <span class="text-primary">6 months warranty</span></li>
                            <li>7 Days <span class="text-primary"> easy return policy</span></li>
                            <li>Delivery Tracking : (<span class="text-info"> Avialable</span>)</li>
                            <li>Cash on Delivery : (<span class="text-info"> Avialable</span>)</li>
                        </ul>
                        <h5><span class="text-success"><i class="bi bi-bookmark-check"></i> In Stock:
                            </span><span>(<strong class="text-primary">20</strong>)
                                items</span><small class="text-muted"> (25 units sold this week)</small></h5>
                    </div>

                    <div class="col-12">
                        <h5 class="text-danger"><i class="bi bi-tag-fill me-1"></i> Get 5% instant discount + 10X
                            rewards with <img src="img/visa.png" alt="" class="img-fluid ms-1 me-1"
                                style="height: 35px;">
                            <img src="img/paypal.png" alt="" class="img-fluid me-1" style="height: 35px;">
                            <img src="img/Mastercard-logo.svg.webp" alt="" class="img-fluid" style="height: 25px;">
                        </h5>
                    </div>

                    <div class="col-12 text-center">
                        <div class="row">
                            <div class="col-5 text-center">
                                <span class="fs-6 text-dark mb-2" style="font-weight: bold;">Quantity</span>
                                <div class="input-group">

                                    <span class="input-group-text btn btn-info"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">+</span>

                                    <input id="form1" min="0" name="quantity" value="1" type="number"
                                        class="form-control text-center fs-6 border-info " style="font-weight: bold;">

                                    <span class="input-group-text btn btn-info"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">-</span>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 mb-3">

                        <div class="d-flex flex-column ">

                            <button class="btn btn-primary btn-sm mt-2 fs-6" type="button" style="font-weight: bold;">
                                <i class="bi bi-bag-check-fill"></i> Buy Now
                            </button>

                            <button class="btn btn-warning btn-sm mt-2 fs-6" type="button" style="font-weight: bold;">
                                <i class="bi bi-cart-plus-fill me-1"></i>Add to cart
                            </button>

                            <button class="btn btn-outline-danger btn-sm mt-2 fs-6" type="button"
                                style="font-weight: bold;">
                                <i class="bi bi-heart-fill me-1"></i>Add to wishlist
                            </button>

                        </div>
                    </div>

                </div>

            </div>

            <!-- Related Items -->
            <div class="row text-center">

                <div class="col text-center bg-red" style="border-radius: 10px;">

                    <div class="row py-3">
                        <div class="col-12">
                            <h1 class="pf"
                                style="font-size: 40px; font-style: oblique; font-weight: bolder; color: rgb(255, 113, 62);">
                                Related Items
                            </h1>
                        </div>
                    </div>

                    <!-- Carousel 2 -->
                    <div class="row text-center">
                        <div class="col mb-4">

                            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">

                                <div class="carousel-indicators">

                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>

                                </div>

                                <div class="carousel-inner">

                                    <!-- Carousel 2 Item 1 -->
                                <div class="carousel-item active" data-bs-interval="5000">

                                    <div class="row">
                                        <div class="col">

                                            <div class="row">

                                                <!-- card 1 -->
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                                                    <div class="card bg-trans">
                                                        <div class="d-flex justify-content-between p-3">
                                                            <p class="lead mb-0 text-warning pf">Today's Combo Offer</p>
                                                            <div class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                                                style="width: 35px; height: 35px;">
                                                                <p class="text-white mb-0 small">x2</p>
                                                            </div>
                                                        </div>

                                                        <div class="row text-center">
                                                            <div class="col">
                                                                <img src="img/products/ardiuno-wires.jpg"
                                                                    class="img-fluid px-3 py-3" alt="Laptop"
                                                                    style="border-radius: 20px; height: 330px; width: 400px;" />
                                                            </div>
                                                        </div>


                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between">
                                                                <p class="small"><a href="#!"
                                                                        class="text-dark">Arduino</a></p>
                                                                <p class="small text-danger"><s>$3.99</s></p>
                                                            </div>

                                                            <div class="d-flex justify-content-between mb-3">
                                                                <h5 class="mb-0">Ardiuno (M-F) Wires
                                                                </h5>
                                                                <h5 class="text-success pf mb-0">$1.99</h5>
                                                            </div>

                                                            <div class="d-flex justify-content-between mb-2">
                                                                <p class="text-primary mb-0">Available: <span
                                                                        class="fw-bold">50</span>
                                                                </p>
                                                                <div class="ms-auto text-warning">
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- card 2 -->
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                                                    <div class="card bg-trans">
                                                        <div class="d-flex justify-content-between p-3">
                                                            <p class="lead mb-0 text-warning pf">Today's Combo Offer</p>
                                                            <div class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                                                style="width: 35px; height: 35px;">
                                                                <p class="text-white mb-0 small">x2</p>
                                                            </div>
                                                        </div>

                                                        <div class="row text-center">
                                                            <div class="col">
                                                                <img src="img/products/ardiuno-wires.jpg"
                                                                    class="img-fluid px-3 py-3" alt="Laptop"
                                                                    style="border-radius: 20px; height: 330px; width: 400px;" />
                                                            </div>
                                                        </div>


                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between">
                                                                <p class="small"><a href="#!"
                                                                        class="text-dark">Arduino</a></p>
                                                                <p class="small text-danger"><s>$3.99</s></p>
                                                            </div>

                                                            <div class="d-flex justify-content-between mb-3">
                                                                <h5 class="mb-0">Ardiuno (M-F) Wires
                                                                </h5>
                                                                <h5 class="text-success pf mb-0">$1.99</h5>
                                                            </div>

                                                            <div class="d-flex justify-content-between mb-2">
                                                                <p class="text-primary mb-0">Available: <span
                                                                        class="fw-bold">50</span>
                                                                </p>
                                                                <div class="ms-auto text-warning">
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- card 3 -->
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                                                    <div class="card bg-trans">
                                                        <div class="d-flex justify-content-between p-3">
                                                            <p class="lead mb-0 text-warning pf">Today's Combo Offer</p>
                                                            <div class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                                                style="width: 35px; height: 35px;">
                                                                <p class="text-white mb-0 small">x2</p>
                                                            </div>
                                                        </div>

                                                        <div class="row text-center">
                                                            <div class="col">
                                                                <img src="img/products/ardiuno-wires.jpg"
                                                                    class="img-fluid px-3 py-3" alt="Laptop"
                                                                    style="border-radius: 20px; height: 330px; width: 400px;" />
                                                            </div>
                                                        </div>


                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between">
                                                                <p class="small"><a href="#!"
                                                                        class="text-dark">Arduino</a></p>
                                                                <p class="small text-danger"><s>$3.99</s></p>
                                                            </div>

                                                            <div class="d-flex justify-content-between mb-3">
                                                                <h5 class="mb-0">Ardiuno (M-F) Wires
                                                                </h5>
                                                                <h5 class="text-success pf mb-0">$1.99</h5>
                                                            </div>

                                                            <div class="d-flex justify-content-between mb-2">
                                                                <p class="text-primary mb-0">Available: <span
                                                                        class="fw-bold">50</span>
                                                                </p>
                                                                <div class="ms-auto text-warning">
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <!-- Carousel 2 Item 2 -->
                                <div class="carousel-item" data-bs-interval="5000">

                                    <div class="row">
                                        <div class="col">

                                            <div class="row">

                                                <!-- card 1 -->
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                                                    <div class="card bg-trans">
                                                        <div class="d-flex justify-content-between p-3">
                                                            <p class="lead mb-0 text-warning pf">Today's Combo Offer</p>
                                                            <div class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                                                style="width: 35px; height: 35px;">
                                                                <p class="text-white mb-0 small">x4</p>
                                                            </div>
                                                        </div>

                                                        <div class="row text-center">
                                                            <div class="col">
                                                                <img src="img/products/PCBs.jpg"
                                                                    class="img-fluid px-3 py-3" alt="Laptop"
                                                                    style="border-radius: 20px; height: 330px; width: 400px;" />
                                                            </div>
                                                        </div>


                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between">
                                                                <p class="small"><a href="#!"
                                                                        class="text-dark">Arduino</a></p>
                                                                <p class="small text-danger"><s>$7.99</s></p>
                                                            </div>

                                                            <div class="d-flex justify-content-between mb-3">
                                                                <h6 class="mb-0">ELEGOO 32 Pcs Double Sided PCB Board
                                                                </h6>
                                                                <h5 class="text-success pf mb-0">$5.99</h5>
                                                            </div>

                                                            <div class="d-flex justify-content-between mb-2">
                                                                <p class="text-primary mb-0">Available: <span
                                                                        class="fw-bold">6</span>
                                                                </p>
                                                                <div class="ms-auto text-warning">
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- card 2 -->
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                                                    <div class="card bg-trans">
                                                        <div class="d-flex justify-content-between p-3">
                                                            <p class="lead mb-0 text-warning pf">Today's Combo Offer</p>
                                                            <div class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                                                style="width: 35px; height: 35px;">
                                                                <p class="text-white mb-0 small">x4</p>
                                                            </div>
                                                        </div>

                                                        <div class="row text-center">
                                                            <div class="col">
                                                                <img src="img/products/PCBs.jpg"
                                                                    class="img-fluid px-3 py-3" alt="Laptop"
                                                                    style="border-radius: 20px; height: 330px; width: 400px;" />
                                                            </div>
                                                        </div>


                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between">
                                                                <p class="small"><a href="#!"
                                                                        class="text-dark">Arduino</a></p>
                                                                <p class="small text-danger"><s>$7.99</s></p>
                                                            </div>

                                                            <div class="d-flex justify-content-between mb-3">
                                                                <h6 class="mb-0">ELEGOO 32 Pcs Double Sided PCB Board
                                                                </h6>
                                                                <h5 class="text-success pf mb-0">$5.99</h5>
                                                            </div>

                                                            <div class="d-flex justify-content-between mb-2">
                                                                <p class="text-primary mb-0">Available: <span
                                                                        class="fw-bold">6</span>
                                                                </p>
                                                                <div class="ms-auto text-warning">
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- card 3 -->
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                                                    <div class="card bg-trans">
                                                        <div class="d-flex justify-content-between p-3">
                                                            <p class="lead mb-0 text-warning pf">Today's Combo Offer</p>
                                                            <div class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                                                style="width: 35px; height: 35px;">
                                                                <p class="text-white mb-0 small">x4</p>
                                                            </div>
                                                        </div>

                                                        <div class="row text-center">
                                                            <div class="col">
                                                                <img src="img/products/PCBs.jpg"
                                                                    class="img-fluid px-3 py-3" alt="Laptop"
                                                                    style="border-radius: 20px; height: 330px; width: 400px;" />
                                                            </div>
                                                        </div>


                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between">
                                                                <p class="small"><a href="#!"
                                                                        class="text-dark">Arduino</a></p>
                                                                <p class="small text-danger"><s>$7.99</s></p>
                                                            </div>

                                                            <div class="d-flex justify-content-between mb-3">
                                                                <h6 class="mb-0">ELEGOO 32 Pcs Double Sided PCB Board
                                                                </h6>
                                                                <h5 class="text-success pf mb-0">$5.99</h5>
                                                            </div>

                                                            <div class="d-flex justify-content-between mb-2">
                                                                <p class="text-primary mb-0">Available: <span
                                                                        class="fw-bold">6</span>
                                                                </p>
                                                                <div class="ms-auto text-warning">
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                    <i class="bi bi-star-fill pf"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                                </div>

                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"
                                        style="background-color: #3d3d3dd0; border-radius: 20px;"
                                        aria-hidden="true"></span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                    <span class="carousel-control-next-icon"
                                        style="background-color: #3d3d3dd0; border-radius: 20px;"
                                        aria-hidden="true"></span>
                                </button>
                            </div>

                        </div>
                    </div>
                    <!-- Carousel 2 -->

                </div>

            </div>

        </div>

    </main>

    <!-- Footer -->
    <footer class="text-center text-white" style="background-color: #3d3d3d;">
        <!-- Grid container -->
        <div class="container p-3">
            <!-- Section: Social media -->
            <section class="mb-4">
                <div>
                    <h3>Contact Us</h3>
                </div>
                <div class="mb-2">
                    <h5><i class="bi bi-telephone-fill"></i> Telephone : <span class="text-primary">+9478288397 /
                            +94332220919</span> </h5>
                </div>
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><svg
                        xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor"
                        class="bi bi-facebook image-fluid" viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg><i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><svg
                        xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor"
                        class="bi bi-twitter" viewBox="0 0 16 16">
                        <path
                            d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                    </svg><i class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><svg
                        xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor"
                        class="bi bi-google" viewBox="0 0 16 16">
                        <path
                            d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                    </svg><i class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><svg
                        xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor"
                        class="bi bi-instagram" viewBox="0 0 16 16">
                        <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                    </svg><i class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><svg
                        xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor"
                        class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path
                            d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                    </svg><i class="fab fa-linkedin-in"></i></a>

                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><svg
                        xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor"
                        class="bi bi-github" viewBox="0 0 16 16">
                        <path
                            d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                    </svg><i class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->

            <!-- Section: Form -->
            <section class="text-center">
                <form action="">
                    <!--Grid row-->
                    <div class="row d-flex justify-content-center">
                        <!--Grid column-->
                        <div class="col-auto">
                            <p class="pt-2">
                                <strong>Sign up New Updates</strong>
                            </p>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-5 col-12">
                            <!-- Email input -->
                            <div class="form-outline form-white mb-4">
                                <input type="email" id="form5Example21" class="form-control" />
                                <label class="form-label pt-1" for="form5Example21">Email address</label>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-auto">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-outline-light mb-4">
                                Subscribe
                            </button>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </form>
            </section>
            <!-- Section: Form -->

            <!-- Section: Text -->
            <section class="mb-4">
                <p>
                    NEW TECH Electronics (Pvt) Ltd is located in Colombo. NEW TECH Trading (Pvt) Ltd is working in
                    Electronic
                    stores, Corporate management, Wholesale of electronics activities.
                </p>
            </section>
            <!-- Section: Text -->

            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->

                <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white" href="https://ceylongen.com/">ceylongen.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>
<?php
session_start();
echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
//เช็คว่ามีตัวแปร session อะไรบ้าง
//print_r($_SESSION);
//exit();
//สร้างเงื่อนไขตรวจสอบสิทธิ์การเข้าใช้งานจาก session
// if(empty($_SESSION['id']) && empty($_SESSION['name']) && empty($_SESSION['surname'])){
//             echo '<script>
//                 setTimeout(function() {
//                 swal({
//                 title: "คุณไม่มีสิทธิ์ใช้งานหน้านี้",
//                 type: "error"
//                 }, function() {
//                 window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
//                 });
//                 }, 1000);
//                 </script>';
//             exit();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-COM</title>
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- our project just needs Font Awesome Solid + Brands -->
    <link href="./node_modules/@fortawesome/fontawesome-free/css/fontawesome.css" rel="stylesheet">
    <link href="./node_modules/@fortawesome/fontawesome-free/css/brands.css" rel="stylesheet">
    <link href="./node_modules/@fortawesome/fontawesome-free/css/solid.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&family=Mali&family=Prompt&display=swap" rel="stylesheet">

    <style>
        body {
            /* font-family: 'Kanit', sans-serif;
            font-family: 'Mali', cursive; */
            font-family: 'Prompt', sans-serif;
            background-color: whitesmoke;
        }
        .search {
        border-bottom-right-radius: 0;
        border-top-right-radius: 0;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
    }

    .bt-search {
        border-bottom-left-radius: 0;
        border-top-left-radius: 0;
        border-bottom-right-radius: 20px;
        border-top-right-radius: 20px;
    }

    .ts-search {
        text-align: start;
        color: #0dcaf0;
    }
    </style>
</head>

<body>


    <div style="background: rgb(241,155,255);
background: linear-gradient(90deg, rgba(241,155,255,1) 0%, rgba(126,104,231,1) 35%, rgba(37,10,247,1) 100%);">
        <div class="container">

        <div class="d-flex bd-highlight">
  <div class=" flex-grow-1 bd-highlight"> <a href="login.php" type="button" class="btn border-0 me-2 text-white"><i class="fa-solid fa-phone-volume"></i> +6684092629</a></div>
  <div class=" bd-highlight"><button type="button" class="btn   border-0"><i class="fa-brands fa-line text-white" style="font-size: 20px;"></i></button></div>
  <div class=" bd-highlight"><button type="button" class="btn  me-2 border-0"><i class="fa-brands fa-facebook text-white" style="font-size: 20px;"></i></button></div>
</div>
           
        </div>
    </div>


    <nav class="navbar navbar-expand-lg bg-white p-2 sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">LOGO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link  <?php echo $_SERVER['REQUEST_URI'] === '/ecommerce/index.php' ? 'text-warning' : 'text-dark'  ?>" aria-current="page" href="index.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $_SERVER['REQUEST_URI'] === '/ecommerce/product.php' ? 'text-warning' : 'text-dark'  ?>" href="product.php">สินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php echo $_SERVER['REQUEST_URI'] === '/ecommerce/pay.php' ? 'text-warning' : 'text-dark'  ?>" href="pay.php">แจ้งชำระเงิน</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link  <?php echo $_SERVER['REQUEST_URI'] === '/ecommerce/about-us.php' ? 'text-warning' : 'text-dark'  ?>" href="about-us.php">เกี่ยวกับเรา</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php echo $_SERVER['REQUEST_URI'] === '/ecommerce/contact.php' ? 'text-warning' : 'text-dark'  ?>" href="contact.php">ติดต่อ</a>
                    </li>
                </ul>
                <div class="d-flex">
                <form action="search.php" class="d-flex mb-0" role="search">
                        <input class="form-control form-control-sm search" type="search" name="name" placeholder="ค้นหา" aria-label="Search">
                        <button class="btn btn-success bt-search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <a href="cart.php" class="btn border-0 position-relative me-5 <?php if (!empty($_SESSION['id'])) { echo 'pt-3';}?>">
                        <i class="fa-solid fa-cart-shopping text-success" style="font-size: 20px;"></i>
                        <span class="position-absolute top-50 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php if (!empty($_SESSION['cart'])) {
                                echo array_sum($_SESSION['cart']);
                            } else {
                                echo '0';
                            }  ?>
                            <span class="visually-hidden">unread messages</span>
                        </span>
                        </a>

                    <!-- <button type="button" class="btn   border-0"><i class="fa-brands fa-line text-white" style="font-size: 20px;"></i></button>
                    <button type="button" class="btn  me-2 border-0"><i class="fa-brands fa-facebook text-white" style="font-size: 20px;"></i></button> -->

                    <?php if (empty($_SESSION['id'])) { ?>

                        <a href="login.php" type="button" class="btn border-0 me-2 text-dark"><i class="fa-solid fa-right-to-bracket"></i> เข้าสู่ระบบ</a>
                        <a href="register.php" type="button" class="btn border-0 text-dark"><i class="fa-regular fa-registered"></i> สมัครสมาชิก</a>

                    <?php } else { ?>

                        <!-- <div class="p-2" style="margin-top: 5px;">
                            <img src="./assets/images/profile-icon-9.png" class="rounded-circle" alt="..." style="width: 30px; border: 1px solid white; background: white;">
                        </div> -->
                        <div class="text-dark">
                            
                            <ul class="navbar-nav">
                                <li class="nav-link text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="./assets/images/profile-icon-9.png" class="rounded-circle" alt="..." style="width: 30px; border: 1px solid white; background: white;"></li>
                                <li class="nav-item dropdown">

                                    <a class="nav-link dropdown-toggle text-dark mt-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo $_SESSION['username'] ?>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <!-- <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li> -->
                                        <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>


                    <?php   } ?>


                </div>
            </div>
        </div>
    </nav>
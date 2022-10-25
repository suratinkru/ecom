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
    </style>
</head>

<body>




    <nav class="navbar navbar-expand-lg bg-primary p-2">
        <div class="container">
            <a class="navbar-brand" href="#">LOGO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link  <?php echo $_SERVER['REQUEST_URI'] === '/ecommerce/index.php' ? 'text-warning' : 'text-white'  ?>" aria-current="page" href="index.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $_SERVER['REQUEST_URI'] === '/ecommerce/product.php' ? 'text-warning' : 'text-white'  ?>" href="product.php">สินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php echo $_SERVER['REQUEST_URI'] === '/ecommerce/pay.php' ? 'text-warning' : 'text-white'  ?>" href="pay.php">แจ้งชำระเงิน</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link  <?php echo $_SERVER['REQUEST_URI'] === '/ecommerce/about-us.php' ? 'text-warning' : 'text-white'  ?>" href="about-us.php">เกี่ยวกับเรา</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php echo $_SERVER['REQUEST_URI'] === '/ecommerce/contact.php' ? 'text-warning' : 'text-white'  ?>" href="contact.php">ติดต่อ</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <button type="button" class="btn btn-primary position-relative me-5">
                        <i class="fa-solid fa-cart-shopping" style="font-size: 20px;"></i>
                        <span class="position-absolute top-50 start-100 translate-middle badge rounded-pill bg-danger">
                            0
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </button>
                 
                    <button type="button" class="btn   border-0"><i class="fa-brands fa-line text-white" style="font-size: 20px;"></i></button>
                    <button type="button" class="btn  me-2 border-0"><i class="fa-brands fa-facebook text-white" style="font-size: 20px;"></i></button>

                    <?php if (empty($_SESSION['id'])) { ?>
                        
                        <a href="login.php" type="button" class="btn btn-outline-light me-2">เข้าสู่ระบบ</a>
                        <a href="register.php" type="button" class="btn btn-warning">สมัครสมาชิก</a>

                    <?php } else { ?>

                        <!-- <div class="p-2" style="margin-top: 5px;">
                            <img src="./assets/images/profile-icon-9.png" class="rounded-circle" alt="..." style="width: 30px; border: 1px solid white; background: white;">
                        </div> -->
                        <div class="">
                            <!-- <h6 style="margin-top: 10px;"><?php echo $_SESSION['username'] ?></h6> -->
                            <ul class="navbar-nav">
                                <li class="nav-link text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="./assets/images/profile-icon-9.png" class="rounded-circle" alt="..." style="width: 30px; border: 1px solid white; background: white;"></li>
                                <li class="nav-item dropdown">
                                    
                                    <a class="nav-link dropdown-toggle text-white mt-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
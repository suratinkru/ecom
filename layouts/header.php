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

        .shopping-cart {
            right: 1px;
            display: block;
            position: fixed;
            bottom: 1%;
            z-index: 9;
        }


























        * {
            padding: 0;
            margin: 0;
            font-family: sans-serif;
            box-sizing: border-box;
        }

        #dot1 {
            height: 900px;
            width: 900px;
            position: absolute;
            top: -200px;
            right: -200px;

            border-radius: 50%;
        }

        #dot2 {
            height: 900px;
            width: 900px;
            position: absolute;
            bottom: -200px;
            left: -200px;

            border-radius: 50%;
        }

        #screen {
            height: 670px;
            width: 400px;
            border-radius: 30px;
            background: #f6f6f6;
            border-radius: 25px;
            border: 15px solid #fff;
            box-shadow: 3px 3px 15px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        #header {
            height: 80px;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background: #17e782;
            display: grid;
            place-items: center;
            font-size: 25px;
            color: #fff;
            font-weight: bold;
            text-shadow: 1px 1px 2px #000000a1;
        }

        #messageDisplaySection {
            height: 450px;
            width: 100%;
            position: absolute;
            left: 0;
            top: 100px;
            padding: 0 20px;
            overflow-y: auto;
        }

        .chat {
            min-height: 40px;
            max-width: 60%;
            padding: 15px;
            border-radius: 10px;
            margin: 15px 0;
        }

        .botMessages {
            background: #17e782;
            color: #fff;
            text-shadow: 1px 1px 2px #000000d4;
        }

        #messagesContainer {
            height: auto;
            width: 100%;
            display: flex;
            justify-content: flex-end;
        }

        .usersMessages {
            background: #00000010;
        }

        #userInput {
            height: 50px;
            width: 90%;
            position: absolute;
            left: 5%;
            bottom: 3%;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
        }

        #messages {
            height: 50px;
            width: 90%;
            position: absolute;
            left: 0;
            border: none;
            outline: none;
            background: transparent;
            padding: 0px 15px;
            font-size: 17px;
        }

        #send {
            height: 50px;
            width: 24%;
            position: absolute;
            right: 0;
            border: none;
            outline: none;
            display: grid;
            place-items: center;
            color: #fff;
            font-size: 20px;
            background: #17e782;
            cursor: pointer;
            display: none;
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
           
            <a class="navbar-brand" href="#">
           <img src="./assets/images/logo.png" alt="Logo" width="60" height="24" class="d-inline-block align-text-top">
            อาหารแมว
            </a>
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
                    <a href="cart.php" class="btn border-0 position-relative me-5 ">
                        <i class="fa-solid fa-cart-shopping text-success" style="font-size: 20px;"></i>
                        <span class="position-absolute top-50 start-75 translate-middle badge rounded-pill bg-danger">
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

                            <ul class="navbar-nav ">
                                <li class="nav-link text-white p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="./assets/images/profile-icon-9.png" class="rounded-circle" alt="..." style="width: 30px; border: 1px solid white; background: white;"></li>
                                <li class="nav-item dropdown p-0">

                                    <a class="nav-link dropdown-toggle text-dark mt-1 p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

    <!-- chat -->


    <div id="shopping-cart" class="shopping-cart ismobile2 p-5"><button rounded="" class="btn collapsed" data-v-e5330474="" aria-expanded="false" aria-controls="sidebar-right-cart" style="overflow-anchor: none;     border-radius: 20px;
   border: 1px solid snow;color: snow;
    font-size: 26px;
    background-color: #fec305;" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span class="v-badge v-badge--overlap theme--light"> <i class="fa-brands fa-rocketchat"></i> </span></button></div>


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="align-items: center;     background-color: #fff0; border: 0px;">

                <div class="modal-body">
                    <div id="container">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="position: absolute;
    z-index: 500;
    right: 50px;
    top: 60px;
    background-color: #f8f9fa;"></button>
                        <div id="screen">
                            <div id="header">ร้านขายอุปกรณ์&อาหารแมว </div>
                            <div id="messageDisplaySection">
                                <!-- bot messages -->
                                <!-- <div class="chat botMessages">Hello there, how can I help you?</div> -->

                                <!-- usersMessages -->
                                <!-- <div id="messagesContainer">
                <div class="chat usersMessages">I need your help to build a website.</div>
            </div> -->
                            </div>
                            <!-- messages input field -->
                            <div id="userInput">
                                <input type="text" name="messages" id="messages" autocomplete="OFF" placeholder="Type Your Message Here." required>
                                <input type="submit" value="Send" id="send" name="send">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <!-- Jquery Start -->
    <script>
        $(document).ready(function() {
            $("#messages").on("keyup", function() {

                if ($("#messages").val()) {
                    $("#send").css("display", "block");
                } else {
                    $("#send").css("display", "none");
                }
            });
        });
        // when send button clicked
        $("#send").on("click", function(e) {
            $userMessage = $("#messages").val();
            $appendUserMessage = '<div class="chat usersMessages">' + $userMessage + '</div>';
            $("#messageDisplaySection").append($appendUserMessage);

            // ajax start
            $.ajax({
                url: "bot.php",
                type: "POST",
                // sending data
                data: {
                    messageValue: $userMessage
                },
                // response text
                success: function(data) {
                    // show response
                    alert(data)
                    $appendBotResponse = '<div id="messagesContainer"><div class="chat botMessages">' + data + '</div></div>';
                    $("#messageDisplaySection").append($appendBotResponse);
                }
            });
            $("#messages").val("");
            $("#send").css("display", "none");
        });
    </script>
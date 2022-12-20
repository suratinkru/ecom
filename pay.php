<?php
include_once "./layouts/header.php";

echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
//เช็คว่ามีตัวแปร session อะไรบ้าง
// print_r($_SESSION);
//exit();
//สร้างเงื่อนไขตรวจสอบสิทธิ์การเข้าใช้งานจาก session
if (empty($_SESSION['id']) && empty($_SESSION['fname']) && empty($_SESSION['username'])) {
    echo '<script>
                setTimeout(function() {
                swal({
                title: "คุณไม่มีสิทธิ์ใช้งานหน้านี้ กรุณาเข้าสู่ระบบ",
                type: "error"
                }, function() {
                window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
                });
                }, 1000);
                </script>';
    exit();
}






?>
<?php

include_once "./controllers/pay.php";

?>

<div class="container mt-5 mb-5">
    <div class="row ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="product.php">สินค้า</a></li>
                <li class="breadcrumb-item active" aria-current="page">วิธีการชำระเงิน/แจ้งชำระเงิน</li>
            </ol>
        </nav>
    </div>


    <div class="row">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">วิธีการชำระเงิน
                    </h5>
                    <small>2 ช่องทาง</small>
                </div>
                <p class="mb-1">การสั่งซื้อสินค้ากับ ... นั้น สามารถชำระเงินได้ผ่าน 2 ช่องทางหลักดังนี้ </p>
                <small>(การเก็บเงินปลายทางเมื่อส่งสินค้าจะเปิดตัวเร็วๆ นี้)</small>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">1. เก็บเงินปลายทาง</h5>
                    <small class="text-muted">เก็บเงินปลายทาง</small>
                </div>
                <p class="mb-1">ป็นวิธีการที่สะดวกและง่ายที่สุดสำหรับลูกค้าทุกคน เมื่อสินค้ามาถึงหน้าประตู ค่อยจ่ายเงินกับเจ้าหน้าที่ ซึ่งตอนนี้ เทลลี่ บัดดี้ มีบริการ</p>
                <small class="text-muted">เก็บเงินปลายทางทั่วประเทศไทยแล้ว</small>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">2. โอนเงินผ่านธนาคารหรือตู้ ATM</h5>
                    <small class="text-muted">โอนเงินผ่านธนาคารหรือตู้ ATM</small>
                </div>
                <p class="mb-1">ลูกค้าสามารถเลือกโอนเงินผ่านเคาน์เตอร์ธนาคาร, ATM หรือระบบออนไลน์ต่างๆ ของธนาคาร มายังบัญชีใดก็ได้ดังต่อไปนี้</p>

                <h4 class="mt-5">ชื่อบัญชี บริษัท ... จำกัด</h4>

                <?php

                $pay = $selectBank->fetchAll(PDO::FETCH_ASSOC);
                if (!empty($pay)) {

                    foreach ($pay as $row => $item) { ?>
                        <img src="./admin/uploads/<?php echo $item['bank_logo']  ?>" alt="..." width="100" height="100">
                        <p class="ctname"><?php echo $item['bank_name']  ?></p>
                        <p class="ctname"><?php echo $item['bank_account']  ?></p>
                        <p class="ctname"><?php echo $item['bank_account_name']  ?></p>

                <?php }
                }   ?>
            </a>
        </div>
    </div>


    <div class="row mt-3">
        <div class="title">
            <h2 style="color: red; font-weight: bold;">
                รายการที่ต้องชำระเงิน
            </h2>


        </div>
    </div>

    <div class="row">

        <ol class="list-group list-group-numbered">
            <?php

            $order = $selectOrder->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($order)) {

                foreach ($order as $row => $item) { ?>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><?php echo $item['o_name']  ?></div>

                        </div>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
            <?php }
            }   ?>

        </ol>
    </div>
</div>



<?php

include_once "./layouts/footer.php"

?>
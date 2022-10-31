<?php

include_once "./layouts/header.php";
include("./config/connectdb.php");



if (!empty($_GET['name'])) {
    $name = $_GET['name'];
    if ($name) {
        $stmt = $conn->prepare("SELECT * ,pro.id as product_id, pro.name as product_name,pro.image as product_image, cate.name as category_name,promo.name as promoton_name FROM tbl_products as pro ,tbl_categories as cate ,tbl_promotions as promo where pro.name LIKE :name and pro.category_id =cate.id and pro.promotion_id = promo.id");
        $stmt->execute(array(':name' => '%' . $name . '%'));

        $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


?>
<style>
       .card {
        border: 0;
        text-align: center;

    }
</style>

    <div class="container">



        <div class="row ">
            <!-- <h4 class="text-start">โปรโมชั่น</h4> -->
            <div class="d-flex mt-3">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="product.php">สินค้า</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ผลการค้นหาสินค้า</li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $_GET['name']; ?></li>
                    </ol>
                </nav>


                <!-- <div class="ms-auto p-2">ทั้งหมด</div> -->
            </div>
        </div>


        <?php
        if (!empty($product)) {
        ?>

            <div class="row row-cols-1 row-cols-md-6 g-1 mb-5">
                <?php


                foreach ($product as $row => $link) {
                    echo      '<div class="col-12">';
                    echo      '<div class="card h-100">';
                    echo         ' <img src="./admin/uploads/' . $link['product_image'] . '" class="card-img-top" alt="..." style="height: 150px; object-fit: cover;">';
                    echo          '<div class="card-body">';
                    echo            ' <h5 class="card-title">' . $link['product_name'] . '</h5>';
                    echo             '<p class="card-text"> ' . $link['price'] . ' ฿</p>';

                    echo               '<a href="product_detail.php?id=' . $link['product_id'] . '" class="btn btn-warning">รายละเอียดสินค้า</a>';
                    echo         '</div>';
                    echo    '</div>';
                    echo '</div>';
                }

                ?>

                <!-- end สินค้า -->
            </div>

        <?php
        } else {



        ?>








            <div class="d-flex justify-content-center">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>ผลการค้นหาสินค้า</strong> ไม่พบสินค้า : <?php echo $_GET['name']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php  } ?>


    </div>

<?php

    include_once "./layouts/footer.php";
} else {


    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    echo '<script>
    setTimeout(function() {
     swal({
         title: "เกิดข้อผิดพลาด",
          text: "ไม่พบ รหัสสินค้า",
         type: "warning"
     }, function() {
         window.location = "product.php"; //หน้าที่ต้องการให้กระโดดไป
     });
        }, 1000);
    </script>';
}

?>
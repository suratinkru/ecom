<?php

include_once "./layouts/header.php";
include("./config/connectdb.php");

if (!empty($_GET['id']) && $_GET['name']) {
    $id = $_GET['id'];
    if ($id) {
        $stmt = $conn->prepare("SELECT *  FROM tbl_products  where category_id = :category_id");
        $stmt->execute(array(':category_id' =>  $id ));

        $product = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

?>


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

    <div class="row row-cols-1 row-cols-md-6 g-1 mb-5 bg-white text-center p-1">
        <?php


        foreach ($product as $row => $link) {
            echo      '<div class="col-12">';
            echo      '<div class="card h-100">';
            echo         ' <img src="./admin/uploads/' . $link['image'] . '" class="card-img-top" alt="..." style="height: 150px; object-fit: cover;">';
            echo          '<div class="card-body">';
            echo            ' <h5 class="card-title">' . $link['name'] . '</h5>';
            echo             '<p class="card-text"> ' . $link['price'] . ' ฿</p>';

            echo               '<a href="product_detail.php?id=' . $link['id'] . '" class="btn btn-warning">รายละเอียดสินค้า</a>';
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
            <strong>ประเภทสินค้า</strong> ไม่พบสินค้า : <?php echo $_GET['name']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php  } ?>


</div>



<!-- end สินค้า -->
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
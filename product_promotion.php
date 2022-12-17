<?php

include_once "./layouts/header.php";
include("./config/connectdb.php");

if (!empty($_GET['id']) && $_GET['name']) {
    $id = $_GET['id'];
    if ($id) {
        // $stmt = $conn->prepare("SELECT *  FROM tbl_products  where category_id = :category_id");
        // $stmt->execute(array(':category_id' =>  $id ));

        $selectProducts = $conn->prepare("SELECT * ,pro.id as product_id, pro.name as product_name,pro.image as product_image, cate.name as category_name,promo.name as promoton_name FROM tbl_products as pro ,tbl_categories as cate ,tbl_promotions as promo where pro.promotion_id = :promotion_id and pro.category_id =cate.id and pro.promotion_id = promo.id");
        $selectProducts->execute(array(':promotion_id' =>  $id ));

        $product = $selectProducts->fetchAll(PDO::FETCH_ASSOC);

    }

?>

<style>

.card {
        border: 0;
        border-radius: 0;

    }

    /* #star */
    .ratings {
        margin-right: 10px;
    }

    .ratings i {

        color: #cecece;
        font-size: 32px;
    }

    .rating-color {
        color: #fbc634 !important;
    }

    .review-count {
        font-weight: 400;
        margin-bottom: 2px;
        font-size: 24px !important;
    }

    .small-ratings i {
        color: #cecece;
    }

    .review-stat {
        font-weight: 300;
        font-size: 18px;
        margin-bottom: 2px;
    }

a {
    color: #000;
    text-decoration: none;
    }

.act-price {
        color: red;
        font-weight: 700

    }

    .dis-price {
        font-size: 12px;
        text-decoration: line-through
    }

    @media screen and (min-width: 480px) {
     .smstyle{
        width: 12.499999995%
     }
    }
    .card-title{
        font-size: 14px;
        
    }

</style>
<div class="container">



<div class="row ">
    <!-- <h4 class="text-start">โปรโมชั่น</h4> -->
    <div class="d-flex mt-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="product.php">สินค้า</a></li>
                <li class="breadcrumb-item active" aria-current="page">สินค้าที่อยู่ในโปรโมชั่น</li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $_GET['name']; ?></li>
            </ol>
        </nav>


        <!-- <div class="ms-auto p-2">ทั้งหมด</div> -->
    </div>
</div>


<?php
if (!empty($product)) {
?>

    <div class="row row-cols-1 row-cols-md-6 g-1 mb-5  text-center p-1">
        <?php


        foreach ($product as $row => $link) {
      

            echo      '<div class="col-12">';
            echo      '<a href="product_detail.php?id=' . $link['product_id'] . '" >';
            echo      '<div class="card h-100">';
            echo         ' <img src="./admin/uploads/' . $link['product_image'] . '" class="card-img-top" alt="..." style="height: 150px; object-fit: cover;">';
            echo          '<div class="card-body">';
            echo            ' <h5 class="card-title text-start text-dart">' . $link['product_name'] . '</h5>';
 
         
            echo            '<div class="price d-flex flex-row align-items-center"> <span class="act-price">฿'. $link["price"] - $link["discount"] .'</span>';
            echo            '<div class="ml-2"> <small class="dis-price"> '.$link["price"] .'</small> <span>-'. $link["discount"] * 100 / $link["price"] .'% </span> </div>';
            echo            '</div>';
          
            echo             '<div class=" d-flex justify-content-between align-items-center">';                          
            echo                              '<div class="small-ratings">';
            echo                                 '<i class="fa fa-star rating-color" style="font-size: 10px;"></i>';
            echo                                 '<i class="fa fa-star rating-color" style="font-size: 10px;"></i>';
            echo                                  '<i class="fa fa-star rating-color" style="font-size: 10px;"></i>';
            echo                                  '<i class="fa fa-star rating-color" style="font-size: 10px;"></i>';
            echo                                 '<i class="fa fa-star rating-color" style="font-size: 10px;"></i>';
            echo                                   '<span style="font-size: 10px;">('.$link['sell_number']. ')</span>';
            echo                             '</div>';
            echo                        '</div>';
                    
            echo         '</div>';
            echo    '</div>';
            echo               '</a>';
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
            <strong>โปรโมชั่นสินค้า</strong> ไม่พบสินค้า : <?php echo $_GET['name']; ?>
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
<?php

include_once "./layouts/header.php";
include("./config/connectdb.php");
?>

<style>
    .main {
        margin-top: 30px;
    }


    a {
    color: #000;
    text-decoration: none;
    }


    .card {
        border: 0;
        border-radius: 0;

    }

    .bgcategory {
        background-color: white;
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


<div class="container text-center main">

    <div class="row">

        <!-- search -->
        <!-- <div class="col-12 mb-2">
            <div class="row p-1">
                <div class="col-12 mb-0">
                    <form class="d-flex mb-0" role="search">
                        <input class="form-control search" type="search" placeholder="ค้นหา" aria-label="Search">
                        <button class="btn btn-success bt-search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="col-12 class=" text-left"">
                    <p class="ts-search">คำที่ถูกค้นหาบ่อย: อาหารสุนัข, อาหารแมว, เห็บ, แผ่นรองฉี่, แชมพู, ทรายแมว, อาหารหมา, ชินชิล่า</p>
                </div>


            </div>

        </div> -->

        <!-- end search -->



        <div class="col-12 ">

            <?php

            $select = $conn->prepare("SELECT * FROM `tbl_categories` ORDER BY `id`;"); //Query
            $select->execute();
            $categories = $select->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($categories)) {


            ?>
                <!-- หมวดหมู่ -->
                <div class="row">
                    <!-- <h4 class="text-start">โปรโมชั่น</h4> -->
                    <div class="d-flex ">
                        <div class="p-2">หมวดหมู่</div>

                        <div class="ms-auto p-2">ทั้งหมด</div>
                    </div>
                </div>


                <div class="row mb-5 row-cols-1 row-cols-md-6 g-0  " >

                    <?php


                    $c = 0;
                    foreach ($categories as $row => $link) {
                        if ($link['status'] != 'off' &&  $c < 8) {
                            $c += 1;
                    ?>
                            <div class="col-md-1 smstyle" >
                                <a href="product_type.php?id=<?php echo $link['id']  ?>&name=<?php echo $link['name']  ?>">
                                    <div class="card h-100 " style="border-right: 1px solid #e2e2e2;
    border-bottom: 1px solid #e2e2e2;">
                                        <img src="./admin/uploads/<?php echo $link['image']  ?>" class="card-img-top" alt="..." style="height: 100px; object-fit: cover;">
                                        <div class="card-body">
                                            <h6 class="card-title"><?php echo $link['name']  ?></h5>

                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php }
                    }   ?>

                </div>
            <?php   } ?>
            <!-- end หมวดหมู่ -->



            <?php


            $selectp = $conn->prepare("SELECT * ,pro.id as product_id, pro.name as product_name,pro.image as product_image, cate.name as category_name,promo.name as promoton_name ,promo.status as pstatus FROM tbl_products as pro LEFT JOIN tbl_categories as cate ON pro.category_id=cate.id LEFT JOIN tbl_promotions as promo ON pro.promotion_id=promo.id  GROUP BY pro.id"); //Query
            $selectp->execute();
            $promotions = $selectp->fetchAll(PDO::FETCH_ASSOC);



            if (!empty($promotions)) {


            ?>
                <!-- โปรโมชั่น -->
                <div class="row">

                    <div class="d-flex ">
                        <div class="p-2">โปรโมชั่น</div>

                        <div class="ms-auto p-2">ทั้งหมด</div>
                    </div>
                </div>
                <div class="row mb-5 row-cols-1 row-cols-md-6 g-1">
                    <?php

                    $i = 0;
                    foreach ($promotions as $row => $link) {
                        if ($link['promoton_name'] != 'default' && $i < 8) {
                            $i += 1;
                    ?>
                            <div class="col-md-2" >
                                <div class="card h-100">
                                    <img src="./admin/uploads/<?php echo $link['product_image']  ?>" class="card-img-top" alt="..." style="height: 130px; object-fit: cover;">
                                    <div class="card-body">
                                        <h6 class="card-title"><?php echo $link['promoton_name'];
                                                                echo $link['pstatus'] != 'off' ? '' : '<p class="text-danger">หมดโปร! </p>' ?></h5>

                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>

                </div>

            <?php } ?>
            <!-- end โปรโมชั่น -->


            <?php


            $selectbest = $conn->prepare("SELECT *  FROM tbl_products where sell_number >= 10 ORDER BY `id`;"); //Query
            $selectbest->execute();
            $probest = $selectbest->fetchAll(PDO::FETCH_ASSOC);



            if (!empty($probest)) {


            ?>
                <!-- สินค้าขายดี -->
                <div class="row ">
                    <!-- <h4 class="text-start">โปรโมชั่น</h4> -->
                    <div class="d-flex ">
                        <div class="p-2">สินค้าขายดี</div>

                        <div class="ms-auto p-2">ทั้งหมด</div>
                    </div>
                </div>
                <div class="row mb-5 row-cols-1 row-cols-md-6 g-1">
                    <?php
                    $ib = 0;
                    foreach ($probest as $row => $link) {
                        if ($ib < 8) {
                            $ib += 1;
                    ?>
                            <div class="col-md-1 smstyle" >
                                <div class="card h-100">
                                    <img src="./admin/uploads/<?php echo $link['image']  ?>" class="card-img-top" alt="..." style="height: 100px; object-fit: cover;">
                                    <div class="card-body">
                                        <h6 class="card-title"><?php echo $link['name']; ?></h5>

                                            <div class=" d-flex justify-content-between align-items-center">
                                                <!-- <h5 class="review-stat">Cleanliness</h5> -->
                                                <div class="small-ratings">
                                                    <i class="fa fa-star rating-color" style="font-size: 10px;"></i>
                                                    <i class="fa fa-star rating-color" style="font-size: 10px;"></i>
                                                    <i class="fa fa-star rating-color" style="font-size: 10px;"></i>
                                                    <i class="fa fa-star rating-color" style="font-size: 10px;"></i>
                                                    <i class="fa fa-star rating-color" style="font-size: 10px;"></i>
                                                    <span style="font-size: 10px;">(<?php echo $link['sell_number']; ?>)</span>
                                                </div>

                                            </div>

                                    </div>
                                </div>
                            </div>



                    <?php }
                    } ?>

                </div>

            <?php } ?>
            <!-- end สินค้าขายดี -->

            <!-- สินค้า -->

            <div class="row ">
                <!-- <h4 class="text-start">โปรโมชั่น</h4> -->
                <div class="d-flex ">
                    <div class="p-2">สินค้า</div>

                    <!-- <div class="ms-auto p-2">ทั้งหมด</div> -->
                </div>
            </div>
            <div class="row row-cols-sm-2 row-cols-md-6 g-1 mb-5">

                <?php

                $selectProducts = $conn->prepare("SELECT * ,pro.id as product_id, pro.name as product_name,pro.image as product_image, cate.name as category_name,promo.name as promoton_name FROM tbl_products as pro LEFT JOIN tbl_categories as cate ON pro.category_id=cate.id LEFT JOIN tbl_promotions as promo ON pro.promotion_id=promo.id GROUP BY pro.id"); //Query
                $selectProducts->execute();
                while ($row = $selectProducts->fetch(PDO::FETCH_ASSOC)) {
                   
                    echo      '<div class="col-12">';
                    echo      '<a href="product_detail.php?id=' . $row['product_id'] . '" >';
                    echo      '<div class="card h-100">';
                    echo         ' <img src="./admin/uploads/' . $row['product_image'] . '" class="card-img-top" alt="..." style="height: 150px; object-fit: cover;">';
                    echo          '<div class="card-body">';
                    echo            ' <h5 class="card-title text-start text-dart">' . $row['product_name'] . '</h5>';
         
                 
                    echo            '<div class="price d-flex flex-row align-items-center"> <span class="act-price">฿'. $row["price"] - $row["discount"] .'</span>';
                    echo            '<div class="ml-2"> <small class="dis-price"> '.$row["price"] .'</small> <span>-'. $row["discount"] * 100 / $row["price"] .'% </span> </div>';
                    echo            '</div>';
                  
                    echo             '<div class=" d-flex justify-content-between align-items-center">';                          
                    echo                              '<div class="small-ratings">';
                    echo                                 '<i class="fa fa-star rating-color" style="font-size: 10px;"></i>';
                    echo                                 '<i class="fa fa-star rating-color" style="font-size: 10px;"></i>';
                    echo                                  '<i class="fa fa-star rating-color" style="font-size: 10px;"></i>';
                    echo                                  '<i class="fa fa-star rating-color" style="font-size: 10px;"></i>';
                    echo                                 '<i class="fa fa-star rating-color" style="font-size: 10px;"></i>';
                    echo                                   '<span style="font-size: 10px;">('.$row['sell_number']. ')</span>';
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

        </div>
    </div>





    <?php

    include_once "./layouts/footer.php"

    ?>
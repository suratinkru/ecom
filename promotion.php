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
    .card-img-top{
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

<div class="row mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="product.php">สินค้า</a></li>
                <li class="breadcrumb-item active" aria-current="page">ประเภทสินค้า</li>
            </ol>
        </nav>
    </div>


    <div class="row">





        <div class="col-12 ">

            <?php

            $select = $conn->prepare("SELECT * FROM `tbl_promotions` ORDER BY `id`;"); //Query
            $select->execute();
            $categories = $select->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($categories)) {


            ?>
                <!-- หมวดหมู่ -->
                <div class="row">
                    <!-- <h4 class="text-start">โปรโมชั่น</h4> -->
                    <div class="d-flex ">
                        <div class="p-2">หมวดหมู่</div>

                      
                    </div>
                </div>


                <div class="row mb-5 row-cols-1 row-cols-md-6 g-0  " >

                    <?php


              
                    foreach ($categories as $row => $link) {
                        if ($link['status'] != 'off' ) {
                          
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



        </div>

    </div>
</div>




    <?php

    include_once "./layouts/footer.php"

    ?>
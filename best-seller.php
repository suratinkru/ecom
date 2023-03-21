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
        .smstyle {
            width: 12.499999995%
        }
    }

    .card-title {
        font-size: 14px;

    }
</style>


<div class="container text-center main">

    <div class="row mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="product.php">สินค้า</a></li>
                <li class="breadcrumb-item active" aria-current="page">สินค้าขายดี</li>
            </ol>
        </nav>
    </div>


    <div class="row">





        <div class="col-12 ">

            <?php


            $sell = 10;
            $selectbest = $conn->prepare("SELECT * ,pro.id as product_id, pro.name as product_name,pro.image as product_image FROM tbl_products as pro  where pro.sell_number >= :sell ORDER BY pro.sell_number desc");
            $selectbest->execute(array(':sell' =>  $sell));

            // $selectbest = $conn->prepare("SELECT *  FROM tbl_products where sell_number >= 10 ORDER BY `id`;"); //Query
            // $selectbest->execute();
            $probest = $selectbest->fetchAll(PDO::FETCH_ASSOC);



            if (!empty($probest)) {


            ?>
                <!-- สินค้าขายดี -->
           
                <div class="row mb-5 row-cols-1 row-cols-md-6 g-1">
                    <?php
                 
                    foreach ($probest as $row => $link) {
               
                    ?>
                            <div class="col-12 ">
                                <a href="product_detail.php?id=<?php echo $link['product_id'] ?>" >
                                    <div class="card h-100">
                                        <img src="./admin/uploads/<?php echo $link['product_image']; ?>" class="card-img-top" alt="..." style="height: 100px; object-fit: cover;">
                                        <div class="card-body">
                                            <h6 class="card-title text-start"><?php echo $link['product_name']; ?></h5>
                                                <div class="price d-flex flex-row align-items-center"> <span class="act-price">฿ <?php echo $link["price"] - $link["discount"]; ?> </span>
                                                    <div class="ml-2"> <small class="dis-price"> <?php echo $link["price"]; ?> </small> <span>- <?php echo $link["discount"] * 100 / $link["price"]; ?>% </span> </div>
                                                </div>
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
                                </a>
                            </div>



                    <?php 
                    } ?>

                </div>

            <?php } ?>
            <!-- end สินค้าขายดี -->




        </div>

    </div>
</div>




<?php

include_once "./layouts/footer.php"

?>
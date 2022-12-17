<?php

include_once "./layouts/header.php"


?>

<?php

include_once "./controllers/index.php";

?>



<style>
    #hero {
        width: 100%;
        position: relative;
        overflow: hidden;
        background-color: #ec99fe;
        /* padding: 140px 0 100px 0; */
        height: 500;
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

    @media screen and (max-width: 480px) {
        .smstyle {
            width: 12.499999995%
        }

        #hero {

            height: 100%;
        }

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
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1 aos-init aos-animate" data-aos="fade-up">
                <div>
                    <h1>Cat stores</h1>
                    <h2 class="mb-5">อาหารแมว ขนมสัตว์เลี้ยง ของใช้สัตว์เลี้ยง ผลิตภัณฑ์อาบน้ำ/บำรุงขน เกรดพรีเมี่ยม</h2>
                    <div class="d-flex flex-row mb-3 mt-5">
                        <?php 

                        $ct = $selectCategory->fetchAll(PDO::FETCH_ASSOC);
                        if (!empty($ct)) {

                            foreach ($ct as $row => $item) { ?>
                        <div class="p-2"><img src="./admin/uploads/<?php echo $item['image']  ?>" class="rounded-circle" alt="..." width="100" height="100">
                            <p style="text-align: center;"><?php echo $item['name']  ?></p>
                        </div>

                        <?php }}   ?>
               
                    </div>
                    <a href="product.php" class="btn btn-danger"><i class="fa-brands fa-shopify me-2"></i>ซื้อเลย</a>
                </div>
            </div>
            <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img aos-init aos-animate" data-aos="fade-up"> <img src="./assets/images/ch.jpg" class="img-fluid" alt=""></div>
        </div>
    </div>
</section>


<div class="container mt-5">


    <div class="row row-cols-1 row-cols-md-6 g-1 mb-5  text-center p-1">

    <?php 
    $Pd = $selectProduct->fetchAll(PDO::FETCH_ASSOC);
                        if (!empty($Pd)) {

                            foreach ($Pd as $row => $item) { ?>

        <div class="col-12">
            <a href="#">
                <div class="card h-100">
                    <img src="./assets/images/ch.jpg" class="card-img-top" alt="..." style="height: 150px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title text-start text-dart"><?php echo $item['name']  ?></h5>


                        <div class="price d-flex flex-row align-items-center"> <span class="act-price">฿ <?php echo $item["price"] - $item["discount"] ;?></span>
                            <div class="ml-2"> <small class="dis-price">  <?php echo $item["price"];?> </small> <span>- <?php echo $item["discount"] * 100 / $item["price"];?>%  </span> </div>
                        </div>
                        <div class=" d-flex justify-content-between align-items-center">
                            <div class="small-ratings">
                                <i class="fa fa-star rating-color" style="font-size: 10px;"></i>
                                <i class="fa fa-star rating-color" style="font-size: 10px;"></i>
                                <i class="fa fa-star rating-color" style="font-size: 10px;"></i>
                                <i class="fa fa-star rating-color" style="font-size: 10px;"></i>
                                <i class="fa fa-star rating-color" style="font-size: 10px;"></i>
                                <span style="font-size: 10px;">(10)</span>
                            </div>
                        </div>

                    </div>
                </div>
            </a>
        </div>

        <?php }}   ?>


        <!-- end สินค้า -->
    </div>
</div>

<?php

include_once "./layouts/footer.php"

?>
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

    .lineunder {

        animation-duration: 3s;
        animation-name: slidein;
        animation-iteration-count: infinite;
        animation-direction: alternate;
        color: #333333;



    }

    @keyframes slidein {
        from {
            margin-left: 10%;
            width: 100%;
        }

        to {
            margin-left: 0%;
            width: 100%;
        }
    }

    .imgAnimate {

        animation-duration: 3s;
        animation-name: imgani;
        animation-iteration-count: infinite;
        animation-direction: alternate;
        /* transform: translate(284px, 442px) translate(-50%, -50%) translate3d(0px, 1.6427px, 0px) translate(0px, 2px) rotateX(-0.6975deg);  */

    }

    @keyframes imgani {
        from {

            transform: translate(2px, 42px) translate(-0%, -0%) translate3d(20px, 5.27px, 0px) translate(0px, 1px) rotateX(-50.6975deg);
            /* margin-top: 5%; */
            /* width: 100%; */
        }

        to {

            transform: translate(54px, 62px) translate(-30%, -30%) translate3d(0px, 1.6427px, 0px) translate(0px, 2px) rotateX(-0.6975deg);
            /* margin-top: 0%; */
            /* width: 100%; */
        }
    }

    .title {
        color: #faea55;

text-shadow: 4px 3px 0px #7A7A7A;
    }

    .ctname {
        text-align: center;
    color: #313231;
    text-shadow: 1px 1px 0px #ffffff;
    font-weight: bold;
    font-size: 18px;
    }







    .imgAnimateCategory {

animation-duration: 3s;
animation-name: imganic;
animation-iteration-count: infinite;
animation-direction: alternate;
/* transform: translate(284px, 442px) translate(-50%, -50%) translate3d(0px, 1.6427px, 0px) translate(0px, 2px) rotateX(-0.6975deg);  */

}

@keyframes imganic {
from {

   
    margin-top: 2%;
    /* width: 100%; */
}

to {


    margin-top: 0%;
    /* width: 100%; */
}
}
</style>



<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1 aos-init aos-animate" data-aos="fade-up">
                <div>
                    <h1 class="title">Cat stores</h1>
                    <div style="height: 90px;">
                    <h2 id="demo" class="mb-5  "></h2>
                    </div>
                   
                    <div class="d-flex flex-row mb-3 mt-5">
                        <?php

                        $ct = $selectCategory->fetchAll(PDO::FETCH_ASSOC);
                        if (!empty($ct)) {

                            foreach ($ct as $row => $item) { ?>
                                <div class="p-2 text-center "><img src="./admin/uploads/<?php echo $item['image']  ?>" class="rounded-circle" alt="..." width="100" height="100">
                                    <p class="ctname"><?php echo $item['name']  ?></p>
                                </div>

                        <?php }
                        }   ?>

                    </div>
                    <a href="product.php" class="btn btn-danger"><i class="fa-brands fa-shopify me-2"></i>ซื้อเลย</a>
                </div>
            </div>
            <div class="col-lg-6 d-lg-flex flex-lg-column align-items-center order-1 order-lg-2 hero-img aos-init aos-animate imgAnimate " data-aos="fade-up"> <img src="./assets/images/SW.png" width="400" alt=""></div>
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
                    <a href="product_detail.php?id=<?php echo $item['id'] ?>">
                        <div class="card h-100">
                            <img src="./assets/images/ch.jpg" class="card-img-top" alt="..." style="height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title text-start text-dart"><?php echo $item['name']  ?></h5>


                                <div class="price d-flex flex-row align-items-center"> <span class="act-price">฿ <?php echo $item["price"] - $item["discount"]; ?></span>
                                    <div class="ml-2"> <small class="dis-price"> <?php echo $item["price"]; ?> </small> <span>- <?php echo $item["discount"] * 100 / $item["price"]; ?>% </span> </div>
                                </div>
                                <div class=" d-flex justify-content-between align-items-center">
                                    <div class="small-ratings">
                                        <i class="fa fa-star rating-color" style="font-size: 10px;"></i>
                                        <i class="fa fa-star rating-color" style="font-size: 10px;"></i>
                                        <i class="fa fa-star rating-color" style="font-size: 10px;"></i>
                                        <i class="fa fa-star rating-color" style="font-size: 10px;"></i>
                                        <i class="fa fa-star rating-color" style="font-size: 10px;"></i>
                                        <span style="font-size: 10px;"><?php echo $item["qty"]; ?></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>

        <?php }
        }   ?>


        <!-- end สินค้า -->
    </div>
</div>

<script>
var i = 0;
var txt = 'อาหารแมว ขนมสัตว์เลี้ยง ของใช้สัตว์เลี้ยง ผลิตภัณฑ์อาบน้ำ/บำรุงขน เกรดพรีเมี่ยม';
var speed = 100;
typeWriter();
function typeWriter() {
  if (i < txt.length) {
    document.getElementById("demo").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }else{
   document.getElementById("demo").innerHTML = "";
   i =0;
  typeWriter();
  }
}
</script>

<?php

include_once "./layouts/footer.php"

?>
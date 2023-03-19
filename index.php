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
/* 
    .imgAnimate {

        animation-duration: 3s;
        animation-name: imgani;
        animation-iteration-count: infinite;
        animation-direction: alternate;
       

    } */

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

    .card:hover {
        transform: scale(1.05);
        border: 1px solid #cecece;
        z-index: 500;
    }
</style>



<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1 aos-init aos-animate" data-aos="fade-up">
                <div>
                    <h1 class="title">Cat stores</h1>
                    <div style="height: 90px;">
                        <h2 class="mb-5  ">อาหารแมว ขนมสัตว์เลี้ยง ของใช้สัตว์เลี้ยง ผลิตภัณฑ์อาบน้ำ/บำรุงขน เกรดพรีเมี่ยม</h2>
                    </div>

                    <div class="d-flex flex-row mb-3 mt-5">
                        <?php

                        $ct = $selectCategory->fetchAll(PDO::FETCH_ASSOC);
                        if (!empty($ct)) {

                            foreach ($ct as $row => $item) { ?>
                                <div class="p-2 text-center ">
                                <a href="product_type.php?id=<?php echo $item['id']  ?>&name=<?php echo $item['name']  ?>">
                                    <img src="./admin/uploads/<?php echo $item['image']  ?>" class="rounded-circle" alt="..." width="100" height="100">
                                    <p class="ctname"><?php echo $item['name']  ?></p>
                                </a>
                                </div>

                        <?php }
                        }   ?>

                    </div>
                    <a href="product.php" class="btn btn-danger"><i class="fa-brands fa-shopify me-2"></i>ซื้อเลย</a>
                </div>
            </div>
            <div class="col-lg-6 d-lg-flex flex-lg-column align-items-center order-1 order-lg-2 hero-img aos-init aos-animate imgAnimate " data-aos="fade-up"> <img src="./assets/images/55408.jpg" width="400" alt=""></div>
        </div>
    </div>
</section>






<div class="container mt-5">

    <h2 style="color: #dc3545;">สินค้าใหม่ของเราวันนี้</h2>
    <div class="row row-cols-1 row-cols-md-6 g-1 mb-5  text-center p-1">

        <?php
        $Pd = $selectProduct->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($Pd)) {

            foreach ($Pd as $row => $item) { ?>

                <div class="col-12">
                    <a href="product_detail.php?id=<?php echo $item['id'] ?>">
                        <div class="card h-100">
                            <img src="./admin/uploads/<?php echo $item['image'] ; ?>" class="card-img-top" alt="..." style="height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title text-start " style="color: #636464;"><?php echo $item['name']  ?></h5>


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






<div class="container">
    <!-- Stack the columns on mobile by making one full-width and the other half-width -->
    <div class="row">
        <div class="col-md-8"><img src="./assets/images/cat1.jpg" class="img-fluid" alt="..."></div>
        <div class="col-6 col-md-4">
            <p>ทาสแมวทั้งหลายที่มีแมวเป็นเจ้านายต้องพิถีพิถันในการเลือก อาหารแมว ให้ถูกปากเจ้านาย และควรดูสารอาหาร ปริมาณ และการเก็บรักษาร่วมด้วย เพื่อให้แมวสุขภาพดี ได้รับสารอาหารที่ครบถ้วน และได้กินอย่างเอร็ดอร่อย อย่าลืมสังเกตแมวว่าแมวขแงเรามีอาการแพ้หรือสิ่งผิดปกติหรือไม่ เมื่อเจออาหารแมวยี่ห้อหอมอร่อยที่แมวชอบแล้ว ทางที่ดีควรเปลี่ยนยี่ห้ออาหารหรือสลับอาหารให้แมวกิน เพราะการกินอาหารเดิม ๆ อาจทำให้แมวเบื่ออาหารได้ อาหารแมวยังมีหลากหลายประเภทให้เลือก แมวเล็ก ๆ ควรเลือกอาหารสำหรับแมวเด็กโดยเฉพาะ หรือแมวที่เป็นโรคอย่างโรคไต อาหารที่เลือกให้เขา ต้องมีคุณภาพและเป็นสูตรลดเค็มโดยเฉพาะ เว็บไซต์ iPrice Thailand มีเคล็ดลับดี ๆ ที่จะทำให้คุณได้เลือกซื้ออาหารแมวคุณภาพดี อาหารแมวราคาถูก จากร้านค้าออนไลน์ชั้นนำ</p>
        </div>
    </div>


</div>


<div class="container-fulid mt-4 " style="background-color: #141619fa;">
<div class="container p-2">
    <div class="row mt-5">
        <h2 class="text-center" style="   color: #dabfda;">ทำไมอาหารสัตว์เลี้ยงจากโปรตีนแมลงของโยราถึงดีกว่า?</h2>
    </div>
  <div class="row">
    <div class="col">
    <img src="https://static.wixstatic.com/media/df7372_fc6ec05117304b698c0a2f3062548894~mv2.png/v1/crop/x_117,y_332,w_1172,h_1147/fill/w_260,h_259,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/yora-shelf-talker_0.png" alt="yora-shelf-talker_0.png" style="width: 260px; height: 259px; object-fit: cover; object-position: 50% 50%;" fetchpriority="high">
    </div>
    <div class="col">
    <img src="https://static.wixstatic.com/media/df7372_c2b7a5cf2898476cbebe67556e9791de~mv2.png/v1/fill/w_240,h_252,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Edited%20-%20yora%20shelf%20talker%20-01.png" alt="Edited - yora shelf talker -01.png" style="width: 240px; height: 252px; object-fit: cover; object-position: 50% 50%;" fetchpriority="high">
    </div>
    <div class="col">
    <img src="https://static.wixstatic.com/media/df7372_fc6ec05117304b698c0a2f3062548894~mv2.png/v1/crop/x_2443,y_287,w_1118,h_1197/fill/w_245,h_240,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/yora-shelf-talker_0.png" alt="yora-shelf-talker_0.png" style="width: 245px; height: 240px; object-fit: cover; object-position: 50% 50%;" fetchpriority="high">
    </div>

    <div class="col">
    <img src="https://static.wixstatic.com/media/df7372_fc6ec05117304b698c0a2f3062548894~mv2.png/v1/crop/x_3578,y_313,w_931,h_1112/fill/w_206,h_246,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/yora-shelf-talker_0.png" alt="yora-shelf-talker_0.png" style="width: 206px; height: 246px; object-fit: cover; object-position: 50% 50%;" fetchpriority="high">
    </div>

  </div>
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
        } else {
            document.getElementById("demo").innerHTML = "";
            i = 0;
            typeWriter();
        }
    }
</script>

<?php

include_once "./layouts/footer.php"

?>
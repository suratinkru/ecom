<?php

include_once "./layouts/header.php"

?>

<style>
    #hero {
        width: 100%;
        position: relative;
        overflow: hidden;
        background-color: whitesmoke;
        /* padding: 140px 0 100px 0; */
    }
</style>
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1 aos-init aos-animate" data-aos="fade-up">
                <div>
                    <h1>อาหารแมว</h1>
                    <h2>อาหารแมว ขนมสัตว์เลี้ยง ของใช้สัตว์เลี้ยง ผลิตภัณฑ์อาบน้ำ/บำรุงขน เกรดพรีเมี่ยม</h2> <a href="product.php"  class="btn btn-danger"><i class="fa-brands fa-shopify me-2"></i>ซื้อเลย</a>
                </div>
            </div>
            <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img aos-init aos-animate" data-aos="fade-up"> <img src="./assets/images/hero-img.jpeg" class="img-fluid" alt=""></div>
        </div>
    </div>
</section>




<?php

include_once "./layouts/footer.php"

?>
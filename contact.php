<?php

include_once "./layouts/header.php"

?>


<style>
    .carousel-caption {

        bottom: 12.25rem;

    }

    .text-contact {
        text-shadow: 2px 4px 3px rgba(0, 0, 0, 0.3);
        font-weight: bold;
    }

    .card {
        background-color: rgb(13 110 253 / 9%);
        border-radius: 30px;
        height: 200px;
    }
    .icon-st {
        font-size: 150px;
        color: steelblue;

    }
    .icon-st-address {
        font-size: 130px;
        color: steelblue;

    }
</style>



<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false" style="height: 500px;">

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./assets/images/loginimg.webp" lass="d-block w-100" alt="..." style="height: 100%; object-fit: cover; width: 100%;">
            <div class="carousel-caption d-md-block">
                <h1 class="text-contact">ติดต่อเรา</h1>
                <!-- <p>Some representative placeholder content for the first slide.</p> -->
            </div>
        </div>

    </div>

</div>

<div class="container mt-5 mb-5">
    <div class="row">
    <!-- <div class="d-flex justify-content-between">
        
    </div> -->
        <div class="col-12 col-md-4 text-center mb-5 ">
            <div class="card" style="width: 100%;">
                <div class="card-body text-center">
                     <i class="fa-solid fa-square-phone icon-st"></i>
                    <h5 class="card-title">088-409-2629</h5>
                    
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 text-center mb-5 ">
            <div class="card" style="width: 100%;">
                <div class="card-body text-center">
                <i class="fa-solid fa-envelope-circle-check icon-st "></i>
                  
                    <h5 class="card-title">suratinit088@gmail.com</h5>
                    
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 text-center mb-5 ">
            <div class="card" style="width: 100%;">
                <div class="card-body text-center">
                <!-- <i class="fa-solid fa-address-book icon-st-address mt-2"></i> -->
                <i class="fa-brands fa-line icon-st "></i>
                 
                    <h5 class="card-title ">088-409-2629</h5>
                    
                </div>
            </div>
        </div>
    </div>
</div>




<?php

include_once "./layouts/footer.php"

?>
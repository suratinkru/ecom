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
        color: #2caf2c;

    }

    .icon-st2 {
        font-size: 150px;
        color: #0dcaf0;

    }

    .icon-st3 {
        font-size: 150px;
        color: green;

    }
    .icon-st-address {
        font-size: 130px;
        color: steelblue;

    }

    #map {
  height: 400px; /* The height is 400 pixels */
  width: 100%; /* The width is the width of the web page */
}
iframe {
    width: 100%;
    height: 500px;
    filter:  invert(10%);
    margin-bottom: 20px;
}
</style>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


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
                    <h5 class="card-title">097-2520238</h5>
                    
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 text-center mb-5 ">
            <div class="card" style="width: 100%;">
                <div class="card-body text-center">
                <i class="fa-solid fa-envelope-circle-check icon-st2"></i>
                  
                    <h5 class="card-title">phengsumalee449@gmail.com</h5>
                    
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 text-center mb-5 ">
            <div class="card" style="width: 100%;">
                <div class="card-body text-center">
                <!-- <i class="fa-solid fa-address-book icon-st-address mt-2"></i> -->
                <i class="fa-brands fa-line icon-st3 "></i>
                 
                    <h5 class="card-title ">sumlee2543</h5>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3837.6707055789234!2d104.42683135060027!3d15.873895248805072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31162f3afa7e6d3f%3A0x64162741a083d99f!2sSuratin%20Service!5e0!3m2!1sen!2sth!4v1671288585030!5m2!1sen!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</div>


<!-- <div id="map"></div>



<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdMXY7NXVX_HMkmhCHyNTBWSQQcfDqyXk&callback=initMap">
</script>

    <script>
        // Initialize and add the map
function initMap() {
  // The location of Uluru
  const uluru = { lat: 15.874117087181942, lng: 104.42936870598382 };
   
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 4,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}

window.initMap = initMap;
    </script> -->
<?php

include_once "./layouts/footer.php"

?>
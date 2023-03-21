<?php

include_once "./layouts/header.php"

?>


<style>
    .carousel-caption {
 
    bottom: 12.25rem;

}

.text-contact {
    text-shadow: 2px 4px 3px rgba(0,0,0,0.3);
    font-weight: bold;
}
.bg-about {
    background-color: rgb(13 110 253 / 6%);
    padding: 10px;
    border-radius: 10px;
}
</style>



<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false" style="height: 500px;">

  <div class="carousel-inner">
    <div class="carousel-item active " style="border-radius: 10px;">
    <img src="./assets/images/loginimg.webp" lass="d-block w-100"  alt="..." style="height: 100%; object-fit: cover; width: 100%; border-radius: 10px">
      <div class="carousel-caption d-md-block">
        <h1 class="text-contact">เกี่ยวกับเรา</h1>
        <!-- <p>Some representative placeholder content for the first slide.</p> -->
      </div>
    </div>

  </div>
  
</div>

<div class="container mt-5 mb-5 bg-about">
    <div class="row">
        <div class="col-12 col-md-6 p-5">
          <p><b>ทำไมต้องมี</b>
         เว็บไซต์ร้านค้าขายอาหารและอุปกรณ์สำหรับแมว</p>
        <p>
        เพราะแต่ละประเภทและสายพันธุ์ มีความต้องการสารอาหารที่แตกต่างกัน พร้อมแบรนด์ให้เลือกช็อปเลือกซื้อหลากหลาย คัดสรรสินค้าคุณภาพ รับประกันของแท้ทุกรายการ พร้อมโปรโมชันสุดพิเศษจากพาร์ทเนอร์หลากหลาย มีให้เลือกทั้ง อาหารเม็ดและอาหารเปียกแมว ขนมน้องแมว อุปกรณ์ของใช้ ของเล่น สำหรับแมว ผลิตภัณฑ์ดูแลขน วิตามินบำรุงร่างกาย มาให้เลือกซื้ออย่างครบครัน
        </p>   
      </div>
        <div class="col-12 col-md-6">
             <img src="./assets/images/loginimg.webp" lass="d-block w-100" alt="..." style="height: 100%; object-fit: cover; width: 100%;">
        </div>
    </div>
</div>


<?php

include_once "./layouts/footer.php"

?>
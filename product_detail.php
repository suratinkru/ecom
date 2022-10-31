<?php

include_once "./layouts/header.php";
include("./config/connectdb.php");
if(!empty($_GET['id'])) { 
    $id = $_GET['id'];
    if ($id) {
        $stmt = $conn->prepare("SELECT * FROM tbl_products WHERE id = :id");
        $stmt->execute(array(':id' => $id));
    
        $product = $stmt->fetch();
    }
    

?>

<style>
    body {
        background-color: #eee
    }

    .card {
        border: none
    }

    .product {
        background-color: #fff
    }

    .brand {
        font-size: 13px
    }

    .act-price {
        color: red;
        font-weight: 700
    }

    .dis-price {
        text-decoration: line-through
    }

    .about {
        font-size: 14px
    }

    .color {
        margin-bottom: 10px
    }

    label.radio {
        cursor: pointer
    }

    label.radio input {
        position: absolute;
        top: 0;
        left: 0;
        visibility: hidden;
        pointer-events: none
    }

    label.radio span {
        padding: 2px 9px;
        border: 2px solid #ff0000;
        display: inline-block;
        color: #ff0000;
        border-radius: 3px;
        text-transform: uppercase
    }

    label.radio input:checked+span {
        border-color: #ff0000;
        background-color: #ff0000;
        color: #fff
    }

    .btn-danger {
        background-color: #ff0000 !important;
        border-color: #ff0000 !important
    }

    .btn-danger:hover {
        background-color: #da0606 !important;
        border-color: #da0606 !important
    }

    .btn-danger:focus {
        box-shadow: none
    }

    .cart i {
        margin-right: 10px
    }
</style>

<div class="container">
    <div class="row mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="product.php">สินค้า</a></li>
                <li class="breadcrumb-item active" aria-current="page">รายละเอียดสินค้า</li>
            </ol>
        </nav>
    </div>


    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6 bg-white">
                            <div class="images p-3">
                                <div class="text-center p-4"> <img id="main-image" src="./admin/uploads/<?php echo $product['image'] ;?>" width="250" /> </div>
                                <div class="thumbnail text-center"> <img onclick="change_image(this)" src="./admin/uploads/<?php echo $product['image'] ;?>" width="70">  </div>
                            </div>
                        </div>
                        <div class="col-md-6 " style="background-color: rgb(0 0 0 / 8%);">
                            <div class="product p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="product.php" class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span> </a> <i class="fa fa-shopping-cart text-muted"></i>
                                </div>
                                <div class="mt-4 mb-3">
                                     <!-- <span class="text-uppercase text-muted brand"></span> -->
                                    <h5 class="text-uppercase"><?php echo $product['name'] ;?></h5>
                                    <div class="price d-flex flex-row align-items-center"> <span class="act-price"><?php echo $product['price'] - $product['discount'] ;?></span>
                                        <div class="ml-2"> <small class="dis-price"><?php echo $product['price'] ?></small> <span><?php echo $product['discount'] * 100 / $product['price'] ; ?>% OFF</span> </div>
                                    </div>
                                </div>
                                <p class="about">
                                    <?php echo $product['description'] ; ?>
                                </p>
                                <!-- <div class="sizes mt-5">
                                    <h6 class="text-uppercase">Size</h6> <label class="radio"> <input type="radio" name="size" value="S" checked> <span>S</span> </label> <label class="radio"> <input type="radio" name="size" value="M"> <span>M</span> </label> <label class="radio"> <input type="radio" name="size" value="L"> <span>L</span> </label> <label class="radio"> <input type="radio" name="size" value="XL"> <span>XL</span> </label> <label class="radio"> <input type="radio" name="size" value="XXL"> <span>XXL</span> </label>
                                </div> -->
                                <div class="cart mt-4 align-items-center"> <a href='./controllers/cart.php?p_id=<?php echo $product['id']; ?>&act=add' class="btn btn-danger text-uppercase mr-2 px-4">เพิ่มใส่รถเข็น</a> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function change_image(image) {

        var container = document.getElementById("main-image");

        container.src = image.src;
    }



    document.addEventListener("DOMContentLoaded", function(event) {







    });
</script>



<?php



include_once "./layouts/footer.php";

} else {
 

 echo '
 <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
 echo '<script>
 setTimeout(function() {
  swal({
      title: "เกิดข้อผิดพลาด",
       text: "ไม่พบ รหัสสินค้า",
      type: "warning"
  }, function() {
      window.location = "product.php"; //หน้าที่ต้องการให้กระโดดไป
  });
     }, 1000);
 </script>';


}
?>
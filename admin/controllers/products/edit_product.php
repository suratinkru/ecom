

<?php

$id= $_POST['id'];


$name= $_POST['name'];
$category_id= $_POST['category_id'];
$code= $_POST['code'];
$price= $_POST['price'];
$qty= $_POST['qty'];
$promotion_id= $_POST['promotion_id'];
$description= $_POST['description'];
$discount= $_POST['discount'];

if(!empty($_POST['status'])) { 
    $status= 'on';
 }else {
    $status= 'off';
 }





if (!$name) {

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    echo '<script>
    setTimeout(function() {
     swal({
         title: "เกิดข้อผิดพลาด",
          text: "ชื่อประเภทสินค้า",
         type: "warning"
     }, function() {
         window.location = "../../pages/product.php"; //หน้าที่ต้องการให้กระโดดไป
     });
        }, 1000);
    </script>';
}else {


if($_FILES['image']['error'] == 0){
  $filename = $_FILES['image']['name'];

$destination = '../../uploads/' . $filename;
// echo $destination;
// get the file extension
$extension = pathinfo($filename, PATHINFO_EXTENSION);

// the physical file on a temporary uploads directory on the server
$file = $_FILES['image']['tmp_name'];
$size = $_FILES['image']['size'];
$allowd_file_ext = array("jpg", "jpeg", "png");

    if (!in_array($extension, $allowd_file_ext)) {
        echo '
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
        echo '<script>
        setTimeout(function() {
        swal({
            title: "เกิดข้อผิดพลาด",
            text: "You file extension must be .zip, .pdf or .docx 22",
            type: "warning"
        }, function() {
            window.location = "../../pages/product.php"; //หน้าที่ต้องการให้กระโดดไป
        });
            }, 1000);
        </script>';
    } elseif ($_FILES['image']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        // echo "File too large!";
        echo '
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
        echo '<script>
        setTimeout(function() {
        swal({
            title: "File too large!",
            text: "File too large!",
            type: "warning"
        }, function() {
            window.location = "../../pages/product.php"; //หน้าที่ต้องการให้กระโดดไป
        });
            }, 1000);
        </script>';
    }


//-- 2. เชื่อมต่อฐานข้อมูล
include("../../../config/connectdb.php");
        // //-- 3. เขียนคำสั่ง SQL พร้อมทั้งสั่งรันคำสั่ง SQL

                // sweet alert 
                echo '
                <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
        if (move_uploaded_file($file, $destination)) {

            $stmt = $conn->prepare("SELECT id FROM tbl_products WHERE name = :name");
            //$stmt->bindParam(':username', $username , PDO::PARAM_STR);
            $stmt->execute(array(':name' => $name));

            if ($stmt->rowCount() < 0) {
                echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "เกิดข้อผิดพลาด !! ",  
                            text: "กรุณากรอกใหม่อีกครั้ง",
                            type: "warning"
                        }, function() {
                            window.location = "../../pages/product.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                </script>';
            } else { //ถ้า username ไม่ซ้ำ เก็บข้อมูลลงตาราง
                //sql update product
           
              
                $data = [
                    'name' => $name,
                    'image' => $filename,
                    'status' => $status,
                    'category_id' => $category_id,
                    'code' => $code,
                    'price' => $price,
                    'qty' => $qty,
                    'promotion_id' => $promotion_id,
                    'description' => $description,
                    'discount' => $discount,
                    'id' => $id,
                ];
                $sql = "UPDATE tbl_products SET name=:name,image=:image, status=:status , category_id=:category_id, code=:code, price=:price, qty=:qty, promotion_id=:promotion_id, description=:description, discount=:discount WHERE id=:id";
                $stmt= $conn->prepare($sql);


               
                $result = $stmt->execute($data);
                if ($result) {
                    echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "แก้ไขสินค้าสำเร็จ",
                            text: "กรุณารอระบบ show product",
                            type: "success"
                        }, function() {
                            window.location = "../../pages/product.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
                } else {
                    echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "เกิดข้อผิดพลาด",
                            type: "error"
                        }, function() {
                            window.location = "../../pages/product.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
                }
                $conn = null; //close connect db
            } //else chk dup
        }


        $conn = null; //close connect db
    

} else {
         //-- 2. เชื่อมต่อฐานข้อมูล
include("../../../config/connectdb.php");
// //-- 3. เขียนคำสั่ง SQL พร้อมทั้งสั่งรันคำสั่ง SQL

        // sweet alert 
        echo '
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';


    $stmt = $conn->prepare("SELECT id FROM tbl_products WHERE name = :name");
    //$stmt->bindParam(':username', $username , PDO::PARAM_STR);
    $stmt->execute(array(':name' => $name));

    if ($stmt->rowCount() < 0) {
        echo '<script>
               setTimeout(function() {
                swal({
                    title: "เกิดข้อผิดพลาด !! ",  
                    text: "กรุณากรอกใหม่อีกครั้ง",
                    type: "warning"
                }, function() {
                    window.location = "../../pages/product.php"; //หน้าที่ต้องการให้กระโดดไป
                });
              }, 1000);
        </script>';
    } else { //ถ้า username ไม่ซ้ำ เก็บข้อมูลลงตาราง
        //sql update product
    
      
        $data = [
            'name' => $name,
            'status' => $status,
            'category_id' => $category_id,
            'code' => $code,
            'price' => $price,
            'qty' => $qty,
            'promotion_id' => $promotion_id,
            'description' => $description,
            'discount' => $discount,
            'id' => $id,
        ];
        $sql = "UPDATE tbl_products SET name=:name, status=:status , category_id=:category_id, code=:code, price=:price, qty=:qty, promotion_id=:promotion_id, description=:description, discount=:discount WHERE id=:id";
        $stmt= $conn->prepare($sql);
     
       
        $result = $stmt->execute($data);
        if ($result) {
            echo '<script>
               setTimeout(function() {
                swal({
                    title: "แก้ไขสินค้าสำเร็จ",
                    text: "กรุณารอระบบ show product",
                    type: "success"
                }, function() {
                    window.location = "../../pages/product.php"; //หน้าที่ต้องการให้กระโดดไป
                });
              }, 1000);
          </script>';
        } else {
            echo '<script>
               setTimeout(function() {
                swal({
                    title: "เกิดข้อผิดพลาด",
                    type: "error"
                }, function() {
                    window.location = "../../pages/product.php"; //หน้าที่ต้องการให้กระโดดไป
                });
              }, 1000);
          </script>';
        }
        $conn = null; //close connect db
    } //else chk dup



$conn = null; //close connect db
    

}


}

 ?>
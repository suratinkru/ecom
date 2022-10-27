

<?php
$name= $_POST['name'];
// $img= $_POST['img'];
// $status= $_POST['status'];

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
          text: "ชื่อโปรโมชั่น",
         type: "warning"
     }, function() {
         window.location = "../../pages/promotion.php"; //หน้าที่ต้องการให้กระโดดไป
     });
        }, 1000);
    </script>';
}else {




//-- 2. เชื่อมต่อฐานข้อมูล
include("../../../config/connectdb.php");
        // //-- 3. เขียนคำสั่ง SQL พร้อมทั้งสั่งรันคำสั่ง SQL

                // sweet alert 
                echo '
                <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';


            $stmt = $conn->prepare("SELECT id FROM tbl_promotions WHERE name = :name");
            //$stmt->bindParam(':username', $username , PDO::PARAM_STR);
            $stmt->execute(array(':name' => $name));

            if ($stmt->rowCount() > 0) {
                echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "name ซ้ำ !! ",  
                            text: "กรุณากรอกใหม่อีกครั้ง",
                            type: "warning"
                        }, function() {
                            window.location = "../../pages/promotion.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                </script>';
            } else { //ถ้า username ไม่ซ้ำ เก็บข้อมูลลงตาราง
                //sql insert
                $stmt = $conn->prepare("INSERT INTO tbl_promotions (name, status)
              VALUES (:name, :status)");
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':status', $status, PDO::PARAM_STR);
               
                $result = $stmt->execute();
                if ($result) {
                    echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "เพิ่มโปรโมชั่นสินค้าสำเร็จ",
                            text: "กรุณารอระบบ show Promotion",
                            type: "success"
                        }, function() {
                            window.location = "../../pages/promotion.php"; //หน้าที่ต้องการให้กระโดดไป
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
                            window.location = "../../pages/promotion.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
                }
                $conn = null; //close connect db
            } //else chk dup
        
    

 
$conn = null; //close connect db
}


 ?>


<?php
$id= $_GET['id'];




if (!$id) {

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    echo '<script>
    setTimeout(function() {
     swal({
         title: "เกิดข้อผิดพลาด",
          text: "ไม่พบ id",
         type: "warning"
     }, function() {
         window.location = "product.php"; //หน้าที่ต้องการให้กระโดดไป
     });
        }, 1000);
    </script>';
}else {
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    //-- 2. เชื่อมต่อฐานข้อมูล
include("../../../config/connectdb.php");
            

                $sql = "DELETE FROM tbl_products WHERE id=?";
                $stmt= $conn->prepare($sql);
          
             
                $result = $stmt->execute([$id]);
                if ($result) {
                    echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "ลบสินค้าสำเร็จ",
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

}


<?php
$name= $_POST['name'];
// $img= $_POST['img'];
$status= $_POST['status'];



if (!$name) {

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    echo '<script>
    setTimeout(function() {
     swal({
         title: "เกิดข้อผิดพลาด",
          text: "หมายเลขเครื่องคอมพิวเตอร์",
         type: "warning"
     }, function() {
         window.location = "com.php"; //หน้าที่ต้องการให้กระโดดไป
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
            window.location = "com.php"; //หน้าที่ต้องการให้กระโดดไป
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
            window.location = "com.php"; //หน้าที่ต้องการให้กระโดดไป
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

            $stmt = $conn->prepare("SELECT id FROM tbl_categories WHERE name = :name");
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
                            window.location = "../../pages/category.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                </script>';
            } else { //ถ้า username ไม่ซ้ำ เก็บข้อมูลลงตาราง
                //sql insert
                $stmt = $conn->prepare("INSERT INTO tbl_categories (name, image, status)
              VALUES (:name, :image, :status)");
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':image', $filename, PDO::PARAM_STR);
                $stmt->bindParam(':status', $status, PDO::PARAM_STR);
               
                $result = $stmt->execute();
                if ($result) {
                    echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "เพิ่มประเภทสินค้าสำเร็จ",
                            text: "กรุณารอระบบ show Category",
                            type: "success"
                        }, function() {
                            window.location = "../../pages/category.php"; //หน้าที่ต้องการให้กระโดดไป
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
                            window.location = "../../pages/category.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
                }
                $conn = null; //close connect db
            } //else chk dup
        }
    

} else {
         
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    echo '<script>
    setTimeout(function() {
     swal({
         title: "เกิดข้อผิดพลาด",
          text: "กรอกข้อมูล ไม่ถูกต้อง ลองใหม่อีกครั้ง",
         type: "warning"
     }, function() {
         window.location = "com.php"; //หน้าที่ต้องการให้กระโดดไป
     });
        }, 1000);
    </script>';
$conn = null; //close connect db
}
}

 ?>
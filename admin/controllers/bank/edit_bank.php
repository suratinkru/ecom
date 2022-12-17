

<?php
$bank_code= $_POST['bank_code'];
$bank_name= $_POST['bank_name'];
$bank_account= $_POST['bank_account'];
$bank_account_name= $_POST['bank_account_name'];
$id= $_POST['id'];

if(!empty($_POST['status'])) { 
    $status= 'on';
 }else {
    $status= 'off';
 }





if (!$bank_code) {

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    echo '<script>
    setTimeout(function() {
     swal({
         title: "เกิดข้อผิดพลาด",
          text: "ชื่อบัญชีธนาคาร",
         type: "warning"
     }, function() {
         window.location = "../../pages/bank.php"; //หน้าที่ต้องการให้กระโดดไป
     });
        }, 1000);
    </script>';
}else {


if($_FILES['bank_logo']['error'] == 0){
  $filename = $_FILES['bank_logo']['name'];

$destination = '../../uploads/' . $filename;
// echo $destination;
// get the file extension
$extension = pathinfo($filename, PATHINFO_EXTENSION);

// the physical file on a temporary uploads directory on the server
$file = $_FILES['bank_logo']['tmp_name'];
$size = $_FILES['bank_logo']['size'];
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
            window.location = "../../pages/bank.php"; //หน้าที่ต้องการให้กระโดดไป
        });
            }, 1000);
        </script>';
    } elseif ($_FILES['bank_logo']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
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
            window.location = "../../pages/bank.php"; //หน้าที่ต้องการให้กระโดดไป
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

            $stmt = $conn->prepare("SELECT id FROM tbl_banks WHERE bank_code = :bank_code");
            //$stmt->bindParam(':username', $username , PDO::PARAM_STR);
            $stmt->execute(array(':bank_code' => $bank_code));

            if ($stmt->rowCount() < 0) {
                echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "เกิดข้อผิดพลาด !! ",  
                            text: "กรุณากรอกใหม่อีกครั้ง",
                            type: "warning"
                        }, function() {
                            window.location = "../../pages/bank.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                </script>';
            } else { //ถ้า username ไม่ซ้ำ เก็บข้อมูลลงตาราง
                //sql update bank
           
              
                $data = [
                    'bank_code' => $bank_code,
                    'bank_logo' => $filename,
                    'bank_name' => $bank_name,
                    'bank_account' => $bank_account,
                    'bank_account_name' => $bank_account_name,
                    'status' => $status,
                    'id' => $id,
                ];
                $sql = "UPDATE tbl_banks SET bank_code=:bank_code,bank_logo=:bank_logo,bank_name=:bank_name,bank_account=:bank_account,bank_account_name=:bank_account_name, status=:status WHERE id=:id";
                $stmt= $conn->prepare($sql);
               
                $result = $stmt->execute($data);
                if ($result) {
                    echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "แก้ไขบัญชีธนาคารสำเร็จ",
                            text: "กรุณารอระบบ show bank",
                            type: "success"
                        }, function() {
                            window.location = "../../pages/bank.php"; //หน้าที่ต้องการให้กระโดดไป
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
                            window.location = "../../pages/bank.php"; //หน้าที่ต้องการให้กระโดดไป
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


    $stmt = $conn->prepare("SELECT id FROM tbl_banks WHERE bank_code = :bank_code");
    //$stmt->bindParam(':username', $username , PDO::PARAM_STR);
    $stmt->execute(array(':bank_code' => $bank_code));

    if ($stmt->rowCount() < 0) {
        echo '<script>
               setTimeout(function() {
                swal({
                    title: "เกิดข้อผิดพลาด !! ",  
                    text: "กรุณากรอกใหม่อีกครั้ง",
                    type: "warning"
                }, function() {
                    window.location = "../../pages/bank.php"; //หน้าที่ต้องการให้กระโดดไป
                });
              }, 1000);
        </script>';
    } else { //ถ้า username ไม่ซ้ำ เก็บข้อมูลลงตาราง
        //sql update bank
    
      
        $data = [
            'bank_code' => $bank_code,
            'bank_name' => $bank_name,
            'bank_account' => $bank_account,
            'bank_account_name' => $bank_account_name,
            'status' => $status,
            'id' => $id,
        ];
        $sql = "UPDATE tbl_banks SET bank_code=:bank_code,bank_name=:bank_name,bank_account=:bank_account,bank_account_name=:bank_account_name ,status=:status WHERE id=:id";
        $stmt= $conn->prepare($sql);
     
       
        $result = $stmt->execute($data);
        if ($result) {
            echo '<script>
               setTimeout(function() {
                swal({
                    title: "แก้ไขบัญชีธนาคารสำเร็จ",
                    text: "กรุณารอระบบ show bank",
                    type: "success"
                }, function() {
                    window.location = "../../pages/bank.php"; //หน้าที่ต้องการให้กระโดดไป
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
                    window.location = "../../pages/bank.php"; //หน้าที่ต้องการให้กระโดดไป
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
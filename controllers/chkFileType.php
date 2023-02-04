<?php
session_start();

if (isset($_POST["id"])) {
    $id = $_SESSION['orderid'];



    if ($_FILES['slip']['error'] == 0) {
        $filename = $_FILES['slip']['name'];
        //   print_r($_SESSION['orderid']);
        $destination = '../admin/uploads/' . $filename;
        // echo $destination;
        // get the file extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        // the physical file on a temporary uploads directory on the server
        $file = $_FILES['slip']['tmp_name'];
        $size = $_FILES['slip']['size'];
        $allowd_file_ext = array("jpg", "jpeg", "png");

        if (!in_array($extension, $allowd_file_ext)) {
            echo '
          <You file extension must be .zip, .pdf or .docx 22';
        } else if ($_FILES['slip']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
            // echo "File too large!";
            echo '
          File too large!';
        } else {



            //-- 2. เชื่อมต่อฐานข้อมูล
            include("../config/connectdb.php");
            // //-- 3. เขียนคำสั่ง SQL พร้อมทั้งสั่งรันคำสั่ง SQL


            if (move_uploaded_file($file, $destination)) {




                $data = [

                    'slip' => $filename,
                    'id' => $id,
                    'status' => 'รอการตรวจสอบสลิป',
                ];
                $sql = "UPDATE tbl_order SET slip=:slip ,status=:status WHERE o_id=:id";
                $stmt = $conn->prepare($sql);

                $result = $stmt->execute($data);
                if ($result) {
                    echo 'แนบสลิปสำเร็จ';
                } else {
                    echo 'เกิดข้อผิดพลาด';
                }
                $conn = null; //close connect db

            }


            $conn = null; //close connect db
        }
    }
}



<?php
$messages= $_POST['messages'];
$response= $_POST['response'];
// $img= $_POST['img'];




if (!$messages) {

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    echo '<script>
    setTimeout(function() {
     swal({
         title: "เกิดข้อผิดพลาด",
          text: "กรุณากรอกข้อมูลให้ถูกต้อง",
         type: "warning"
     }, function() {
         window.location = "../../pages/chat-bot.php"; //หน้าที่ต้องการให้กระโดดไป
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
     

            $stmt = $conn->prepare("SELECT id FROM chatbot WHERE messages = :messages");
            //$stmt->bindParam(':username', $username , PDO::PARAM_STR);
            $stmt->execute(array(':messages' => $messages));

            if ($stmt->rowCount() > 0) {
                echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "messages ซ้ำ !! ",  
                            text: "กรุณากรอกใหม่อีกครั้ง",
                            type: "warning"
                        }, function() {
                            window.location = "../../pages/chat-bot.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                </script>';
            } else { //ถ้า username ไม่ซ้ำ เก็บข้อมูลลงตาราง
                //sql insert
                $stmt = $conn->prepare("INSERT INTO chatbot (messages, response)
                VALUES (:messages, :response)");
                $stmt->bindParam(':messages', $messages, PDO::PARAM_STR);
                $stmt->bindParam(':response', $response, PDO::PARAM_STR);
         
               
                $result = $stmt->execute();
                if ($result) {
                    echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "เพิ่ม messages สำเร็จ",
                            text: "กรุณารอระบบ show messages",
                            type: "success"
                        }, function() {
                            window.location = "../../pages/chat-bot.php"; //หน้าที่ต้องการให้กระโดดไป
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
                            window.location = "../../pages/chat-bot.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
                }
                $conn = null; //close connect db
            } //else chk dup

            $conn = null; //close connect db
        }
    





 ?>
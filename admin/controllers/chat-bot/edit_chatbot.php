

<?php

$id= $_POST['id'];

$messages= $_POST['messages'];
$response= $_POST['response'];



if (!$messages) {

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    echo '<script>
    setTimeout(function() {
     swal({
         title: "เกิดข้อผิดพลาด",
          text: "messages",
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

    print_r($stmt->rowCount());
    if ($stmt->rowCount() < 0) {
        echo '<script>
               setTimeout(function() {
                swal({
                    title: "เกิดข้อผิดพลาด !! ",  
                    text: "กรุณากรอกใหม่อีกครั้ง",
                    type: "warning"
                }, function() {
                    window.location = "../../pages/chat-bot.php"; //หน้าที่ต้องการให้กระโดดไป
                });
              }, 1000);
        </script>';
    } else { //ถ้า username ไม่ซ้ำ เก็บข้อมูลลงตาราง
        //sql update chat-bot
    
      
        $data = [
            'messages' => $messages,
            'response' => $response,
            'id' => $id,
        ];
        $sql = "UPDATE chatbot SET messages=:messages ,response=:response WHERE id=:id";
        $stmt= $conn->prepare($sql);
     
       
        $result = $stmt->execute($data);
        if ($result) {
            echo '<script>
               setTimeout(function() {
                swal({
                    title: "แก้ไขสำเร็จ",
                    text: "กรุณารอระบบ show chat-bot",
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
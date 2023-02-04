<?php 



require_once '../../../config/connectdb.php';


if (isset($_POST['id'])) { 

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    $data = [
        'status' => $_POST['o_status'],
        'track' => $_POST['track'],
        'o_id' => $_POST['id'],
    ];
    $sql = "UPDATE tbl_order SET status=:status , track=:track WHERE o_id=:o_id";
    $stmt= $conn->prepare($sql);
    $result = $stmt->execute($data);

    if ($result) {
        echo '<script>
           setTimeout(function() {
            swal({
                title: "แก้ไขสำเร็จ",
                text: "กรุณารอระบบ show order",
                type: "success"
            }, function() {
                window.location = "../../pages/order.php"; //หน้าที่ต้องการให้กระโดดไป
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
                window.location = "../../pages/order.php"; //หน้าที่ต้องการให้กระโดดไป
            });
          }, 1000);
      </script>';
    }
    $conn = null; //close connect db
}
?>



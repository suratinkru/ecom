<?php

session_start();
include("../config/connectdb.php");
// print_r($_POST['name']);	
// print_r($_POST['address']);
// print_r($_POST['email']);
// print_r($_POST['phone']);
// print_r($_SESSION['cart']);
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$total=0;
$rows = array();
$total_qty = 0;
foreach($_SESSION['cart'] as $p_id=>$qty)
	{

        $stmt = $conn->prepare("SELECT * FROM tbl_products WHERE id = :id");
        $stmt->execute(array(':id' => $p_id));
        $row = $stmt->fetch();
        $row['qty_item'] = $qty;
        array_push($rows, $row);
        // $rows = array_merge($rows, $row);
		$sum = $row['price'] * $qty;
		$total += $sum;
        $total_qty += $qty;
      
    }


   
    // print_r($total_qty);
    // print_r($total);
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';


    $stmt2 = $conn->prepare("INSERT INTO tbl_order (o_name,o_address, o_email, o_phone,o_qty,o_total,user_id)
    VALUES (:o_name, :o_address, :o_email, :o_phone, :o_qty, :o_total,:user_id)");
      $stmt2->bindParam(':o_name', $name, PDO::PARAM_STR);
      $stmt2->bindParam(':o_address', $address, PDO::PARAM_STR);
      $stmt2->bindParam(':o_email', $email, PDO::PARAM_STR);
      $stmt2->bindParam(':o_phone', $phone, PDO::PARAM_STR);
      $stmt2->bindParam(':o_qty', $total_qty, PDO::PARAM_STR);
      $stmt2->bindParam(':o_total', $total, PDO::PARAM_STR);
      $stmt2->bindParam(':user_id', $_SESSION['id'], PDO::PARAM_INT);
     
      $result = $stmt2->execute();

      if ($result) {

        $id = $conn->lastInsertId();
     


    $stmt3 = $conn->prepare("INSERT INTO tbl_order_detail 
    (o_id, p_id,p_name,price,d_qty,d_subtotal)
    VALUES 
    (:o_id, :p_id,:p_name,:price, :d_qty,:d_subtotal)");

  //แยก key & value ด้วย foreach
        foreach ($rows as $row => $item) {
     
        $sumprice = (float)($item['price'] *  $item['qty_item']);
        $qty = (int)$item['qty_item'];
        unset($_SESSION['cart'][$item['id']]);

        $stmt3->bindParam(':o_id', $id , PDO::PARAM_INT);
        $stmt3->bindParam(':p_id', $item['id'] , PDO::PARAM_INT);
        $stmt3->bindParam(':p_name', $item['name'] , PDO::PARAM_STR);
        $stmt3->bindParam(':price', $item['price'] , PDO::PARAM_INT);
        $stmt3->bindParam(':d_qty',  $qty, PDO::PARAM_INT);
        $stmt3->bindParam(':d_subtotal',$sumprice, PDO::PARAM_INT);
        $result = $stmt3->execute();


        //Dumps the information contained by a prepared statement directly on the output แปลเป็นชาวบ้านๆ คือ แสดง sql statment 
        
        // echo 'debugDumpParams <br>';  
        // echo '<hr>';  
        // $stmt3->debugDumpParams();
        // echo '</pre>';


        } //foreach



        $conn = null; //close connect db

        

          echo '<script>
             setTimeout(function() {
              swal({
                  title: "แจ้งชำระเงิน",
                  text: "แจ้งชำระเงิน ต่อไป",
                  type: "success"
              }, function() {
                  window.location = "../pay.php"; //หน้าที่ต้องการให้กระโดดไป
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
                  window.location = "../confirm.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
      }
      $conn = null; //close connect db
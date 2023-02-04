<?php 


require_once '../config/connectdb.php';

if (isset($_POST['id'])) {

$selectOrderd = $conn->prepare("SELECT * FROM tbl_order_detail as d LEFT JOIN  tbl_products as p ON d.p_id = p.id  where d.o_id = :id");//Query
$selectOrderd->bindParam(':id',  $_POST['id'] , PDO::PARAM_STR);
$selectOrderd->execute();

$order = $selectOrderd->fetchAll(PDO::FETCH_ASSOC);
if (!empty($order)) {

    foreach ($order as $row => $item) { 
   
   echo      ' <li id="order"  class="list-group-item d-flex justify-content-between align-items-start" >';
   echo         ' <img src="./admin/uploads/' . $item['image'] . '" class="card-img-top" alt="..." style="height: 100px; width: 100px; object-fit: cover;">';
   echo      '         <div class="ms-5 me-auto ">';
   echo      '             <div class="fw-bold"> ขื่อสินค้า :<span style="font-size: 14; font-weight: 100;"> '. $item['p_name']  .'</span></div>';
   echo      '             <div class="fw-bold"> ราคา : <span style="font-size: 14; font-weight: 100;">' .number_format($item['price'],2) .'</span></div>';
   echo      '            <div class="fw-bold"> จำนวนที่สั่งซื้อ : <span style="font-size: 14; font-weight: 100;">'. $item['d_qty']  .'</span></div>';
   echo      '             <div class="fw-bold"> ราคารวม :<span style="font-size: 14; font-weight: 100;"> '. number_format($item['d_subtotal'],2) .'</span></div>';
               

   echo      '          </div>';
   echo      '         <div>';
          
   echo      '     </li>';
   echo      '     <hr />';
     
 }
} 

}
?>
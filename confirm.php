<?php

include_once "./layouts/header.php";


echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
//เช็คว่ามีตัวแปร session อะไรบ้าง
//print_r($_SESSION);
//exit();
//สร้างเงื่อนไขตรวจสอบสิทธิ์การเข้าใช้งานจาก session
if(empty($_SESSION['id']) && empty($_SESSION['name']) && empty($_SESSION['username'])){
            echo '<script>
                setTimeout(function() {
                swal({
                title: "กรุณาเข้าสู่ระบบ",
                type: "error"
                }, function() {
                window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
                });
                }, 1000);
                </script>';
            exit();
}

?>

<div class="container ">
<div class="row mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-3">
                <li class="breadcrumb-item"><a href="cart.php">ตะกร้าสินค้า</a></li>
                <li class="breadcrumb-item active" aria-current="page">ยืนยันการสั่งซื้อ</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container bg-white mb-5 rounded">

<div class="row ">


<form id="frmcart" name="frmcart" method="post" action="./controllers/confirm.php">

<div class="table-responsive">
<div class="d-flex justify-content-center mb-3 mt-3"><b>ยืนยันการสั่งซื้อ</b></div>
  <table width="600" border="0" align="center" class="table table-striped table-hover">
  <thead class="table-Info">
    <!-- <tr style="background-color: white;">
      <td colspan="6" bgcolor="#CCCCCC">
      <b>ตะกร้าสินค้า</span></td>
    </tr> -->
 
    <tr>
      <td bgcolor="#EAEAEA">รูปภาพสินค้า</td>
      <td bgcolor="#EAEAEA">สินค้า</td>
      <td align="center" bgcolor="#EAEAEA">ราคา</td>
      <td align="center" bgcolor="#EAEAEA">จำนวน</td>
      <td align="center" bgcolor="#EAEAEA">รวม(บาท)</td>
      
    </tr>
    </thead>
<?php
$total=0;
if(!empty($_SESSION['cart']))
{
	include("./config/connectdb.php");
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{

        $stmt = $conn->prepare("SELECT * FROM tbl_products WHERE id = :id");
        $stmt->execute(array(':id' => $p_id));
        $row = $stmt->fetch();
		$sum = $row['price'] * $qty;
		$total += $sum;
        echo "<tbody>";
		echo "<tr>";
        // echo "<td width='200'>" . $row["name"] . "</td>";
        echo '<td width="100" >  <img class="img-upload-preview " width="50" height="50" src="./admin/uploads/'. $row["image"] . '" alt="preview" style="object-fit: cover;"></td> ';
		echo "<td width='200'>" . $row["name"] . "</td>";
		echo "<td width='46' align='center'>" .number_format($row["price"],2) . "</td>";
		echo "<td width='46' align='center'>" .$qty . "</td>";
		echo "<td width='93' align='center'>".number_format($sum,2)."</td>";
		//remove product
		
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='4' bgcolor='#CEE7FF' align='lerft'><b>ราคารวม</b></td>";
  	echo "<td align='center' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  
	echo "</tr>";
    echo "</tbody>";
}
?>

</table>
</div>

<div class="table-responsive">
<table width="600" border="0" align="center" class="table table-striped table-hover">
<tr>
	<td colspan="2" bgcolor="#CCCCCC">รายละเอียดในการติดต่อ</td>
</tr>
<tr>
    <td bgcolor="#EEEEEE">ชื่อ</td>
    <td><input name="name" type="text" id="name" class="form-control" required/></td>
</tr>
<tr>
    <td width="22%" bgcolor="#EEEEEE">ที่อยู่</td>
    <td width="78%">
    <!-- <textarea name="address" cols="35" rows="5" id="address" required></textarea> -->
    <textarea class="form-control" id="exampleFormControlTextarea1"  rows="5" id="address" name="address" required></textarea>
    </td>
</tr>
<tr>
  	<td bgcolor="#EEEEEE">อีเมล</td>
  	<td><input name="email" type="email" id="email" class="form-control" required/></td>
</tr>
<tr>
  	<td bgcolor="#EEEEEE">เบอร์ติดต่อ</td>
  	<td><input name="phone" type="text" id="phone" class="form-control" required /></td>
</tr>
<tr>
	<td colspan="2" align="center" bgcolor="#CCCCCC">
	<input type="submit" name="Submit2" class="btn btn-success" value="สั่งซื้อ" />
</td>
</tr>
</table>
</div>
</form>
</div>
</div>


<?php

include_once "./layouts/footer.php"

?>
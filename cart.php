<?php

    include_once "./layouts/header.php";




?>

<div class="container">
<div class="row mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-3">
                <li class="breadcrumb-item"><a href="product.php">สินค้า</a></li>
                <li class="breadcrumb-item active" aria-current="page">ตะกร้าสินค้า</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container bg-white rounded mb-5">

<div class="row mt-2">


<form id="frmcart" name="frmcart" method="post" action="./controllers/cart.php?act=update">

<div class="table-responsive">
<div class="d-flex justify-content-center mb-3 mt-3"><b>ตะกร้าสินค้า</b></div>
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
      <td align="center" bgcolor="#EAEAEA"><i class="fa-regular fa-trash-can"></i></td>
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
		echo "<td width='57' align='center'>";  
		echo "<input type='number' name='amount[$p_id]' value='$qty' class='form-control form-control-sm' /></td>";
		echo "<td width='93' align='center'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td width='46' align='center'><a href='./controllers/cart.php?p_id=$p_id&act=remove'><i class='fa-regular fa-trash-can' style='color: red;'></i></a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='4' bgcolor='#CEE7FF' align='lerft'><b>ราคารวม</b></td>";
  	echo "<td align='center' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
    echo "</tbody>";
}
?>
<tr>
<!-- <td><a href="product.php">กลับหน้ารายการสินค้า</a></td> -->
<td colspan="6" align="right">
    <input type="submit" name="button" id="button" value="ปรับปรุง" class="btn btn-light" />
    <input type="button" name="Submit2" value="สั่งซื้อ" class="btn btn-success" onclick="window.location='confirm.php';" />
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
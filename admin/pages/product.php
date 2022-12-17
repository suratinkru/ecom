<?php include_once "../layouts/header.php" ?>


<?php include_once "../layouts/leftbar.php" ?>

<?php include("../controllers/category/list_category.php");
include("../controllers/promotion/list_promotion.php");


$rowc = $select->fetch(PDO::FETCH_ASSOC);
$rowp = $selectPromotion->fetch(PDO::FETCH_ASSOC);

function Categoryfk($dt,$rowp) {

	print_r($rowp);
	return "rowp";
}
?>

<style>

	.description{
		display: -webkit-box; 
		-webkit-line-clamp: 3;
		-webkit-box-orient: vertical ;
		text-overflow: ellipsis;
		overflow: hidden;
	}
</style>


<!-- main-content -->
<div class="main-panel">
	<div class="container">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Dashboard</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">รายการสินค้า</a>
					</li>

				</ul>
			</div>
			<div class="row">


				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">รายการสินค้า</h4>
								<a href="add-product.php" class="btn btn-primary btn-round ml-auto">
									<i class="fa fa-plus"></i>
									เพิ่มสินค้า
									</a>
							</div>
						</div>
						<div class="card-body">
							<!-- Modal -->
							
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th  class="text-nowrap">ลำดับ</th>
											<th  class="text-nowrap">รูปภาพสินค้า</th>
											<th  class="text-nowrap">ชื่อสินค้า</th>
											<th  class="text-nowrap">รหัสสินค้า</th>
											<th  class="text-nowrap">หมวดหมู่สินค้า</th>
											<th  class="text-nowrap">โปรโมชั่นสินค้า</th>
											<th  class="text-nowrap">รายละเอียดสินค้า</th>
											<th  class="text-nowrap">ราคา</th>
											<th  class="text-nowrap">จำนวน</th>
											<th  class="text-nowrap">สถานะ</th>
											<th  class="text-nowrap">Created_At</th>
                                            <th  class="text-nowrap">Updated_At</th>
											<th  class="text-nowrap" style="width: 10%">จัดการ</th>
										</tr>
									</thead>

									<tbody>
									<?php
										include("../../config/connectdb.php");
										$selectProducts = $conn->prepare("SELECT * ,pro.id as product_id,pro.name as product_name,pro.image as product_image, cate.name as category_name,promo.name as promoton_name FROM tbl_products as pro LEFT JOIN tbl_categories as cate ON pro.category_id=cate.id LEFT JOIN tbl_promotions as promo ON pro.promotion_id=promo.id GROUP BY pro.id"); //Query
										$selectProducts->execute();
										while ($row = $selectProducts->fetch(PDO::FETCH_ASSOC)) {
											echo '<tr>';
											echo '<td>' . $row["product_id"] . '</td>';
											echo '<td >  <img class="img-upload-preview " width="50" height="50" src="../uploads/'. $row["product_image"] . '" alt="preview" style="object-fit: cover;"></td> ';
											echo '<td>' . $row["product_name"] . '</td>';
											echo '<td>' . $row["code"] . '</td>';
										

											
	                                        echo '<td>' . $row["category_name"]  . '</td>';			            		
											echo '<td>' . $row["promoton_name"] . '</td>';		
												
									

							       
										
											// echo '<td>' . $promotion_name . '</td>';
											echo '<td class="description">' . $row["description"] . '</td>';
											echo '<td>' . $row["price"] . '</td>';
											echo '<td>' . $row["qty"] . '</td>';
											echo '<td>' . $row["status"] . '</td>';
											echo '<td>' . $row["created_at"] . '</td>';
											echo '<td>' . $row["updated_at"] . '</td>';
											echo '<td>
												<div class="form-button-action">
													<a href="edit-product.php?id='. $row["product_id"] .'" data-toggle="tooltip"  title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
														<i class="fa fa-edit"></i>
													</a>
													<a href="../controllers/products/delete_product.php?id='. $row["product_id"] .'" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
														<i class="fa fa-times"></i>
													</a>
												</div>
											</td>';
											echo '</tr>';
										}
										?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">
		<div class="container-fluid">
			<nav class="pull-left">
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link" href="http://www.themekita.com">
							ThemeKita
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
							Help
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
							Licenses
						</a>
					</li>
				</ul>
			</nav>
			<div class="copyright ml-auto">
				2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="http://www.themekita.com">ThemeKita</a>
			</div>
		</div>
	</footer>
</div>
<!-- main-content closed -->

<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<!-- jQuery UI -->
<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<!-- Bootstrap Toggle -->
<script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<!-- jQuery Scrollbar -->
<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Datatables -->
<script src="../assets/js/plugin/datatables/datatables.min.js"></script>
<!-- Atlantis JS -->
<script src="../assets/js/atlantis.min.js"></script>
<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="../assets/js/setting-demo2.js"></script>
<script>
	$(document).ready(function() {
		$('#basic-datatables').DataTable({});

		$('#multi-filter-select').DataTable({
			"pageLength": 5,
			initComplete: function() {
				this.api().columns().every(function() {
					var column = this;
					var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo($(column.footer()).empty())
						.on('change', function() {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);

							column
								.search(val ? '^' + val + '$' : '', true, false)
								.draw();
						});

					column.data().unique().sort().each(function(d, j) {
						select.append('<option value="' + d + '">' + d + '</option>')
					});
				});
			}
		});

		// Add Row
		$('#add-row').DataTable({
			"pageLength": 5,
		});

		var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

		$('#addRowButton').click(function() {
			$('#add-row').dataTable().fnAddData([
				$("#addName").val(),
				$("#addPosition").val(),
				$("#addOffice").val(),
				action
			]);
			$('#addRowModal').modal('hide');

		});
	});
</script>
<?php include_once "../layouts/footer.php" ?>
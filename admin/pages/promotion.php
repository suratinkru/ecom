<?php include_once "../layouts/header.php" ?>


<?php include_once "../layouts/leftbar.php" ?>
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
						<a href="#">รายการโปรโมชั่น</a>
					</li>

				</ul>
			</div>
			<div class="row">


				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">รายการโปรโมชั่น</h4>
								<a href="add-promotion.php" class="btn btn-primary btn-round ml-auto" >
									<i class="fa fa-plus"></i>
									เพิ่มโปรโมชั่น
								</a>
							</div>
						</div>
						<div class="card-body">
							<!-- Modal -->
							<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header border-0">
											<h5 class="modal-title">
												<span class="fw-mediumbold">
													เพิ่ม</span>
												<span class="fw-light">
													โปรโมชั่น
												</span>
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">

											<form action="../controllers/promotion/add_promotion.php" method="post" >
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group form-group-default">
															<label>ชื่อโปรโมชั่น</label>
															<input id="addName" type="text" name="name" class="form-control" placeholder="name" required>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group form-group-default">
															<label>สถานะ</label>
															<input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="btn-round" name="status" class="mt-1">
														</div>
													</div>
												</div>
												<div class="modal-footer border-0">
													<button type="submit"  class="btn btn-primary">ยินยัน</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
												</div>
											</form>
										</div>

									</div>
								</div>
							</div>

							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th  class="text-nowrap">ลำดับ</th>
											<th  class="text-nowrap">รูปโปรโมชั่นสินค้า</th>
											<th  class="text-nowrap">โปรโมชั่น</th>
											
											<th  class="text-nowrap">สถานะ</th>
											<th  class="text-nowrap">Created_At</th>
                                            <th  class="text-nowrap">Updated_At</th>
											<th  class="text-nowrap" style="width: 10%">จัดการ</th>
										</tr>
									</thead>

									<tbody>

									<?php
									include("../../config/connectdb.php");
									$select = $conn->prepare("SELECT * FROM `tbl_promotions` ORDER BY `id`;");//Query
									$select->execute();
									while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
										echo '<tr>';
										echo '<td>' . $row["id"] . '</td>';
										echo '<td><img class="img-upload-preview " width="50" height="50" src="../uploads/'. $row["image"] . '" alt="preview" style="object-fit: cover;"></td>';
										echo '<td>' . $row["name"] . '</td>';
										echo '<td>' . $row["status"] . '</td>';
										echo '<td>' . $row["created_at"] . '</td>';
										echo '<td>' . $row["updated_at"] . '</td>';
										echo '<td>
												<div class="form-button-action">
													<a href="edit-promotion.php?id='. $row["id"] .'" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
														<i class="fa fa-edit"></i>
													</a>
													<a href="../controllers/promotion/delete_promotion.php?id='. $row["id"] .'" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
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
<!-- Moment JS -->
<script src="../assets/js/plugin/moment/moment.min.js"></script>
<!-- Bootstrap Toggle -->
<script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<!-- jQuery Scrollbar -->




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
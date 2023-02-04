<?php include_once "../layouts/header.php" ?>


<?php include_once "../layouts/leftbar.php" ?>

<?php

include("../../config/connectdb.php");

$id = $_GET['id'];

if ($id) {
    $stmt = $conn->prepare("SELECT * FROM chatbot WHERE id = :id");
    $stmt->execute(array(':id' => $id));

    $bot = $stmt->fetch();

}



?>


<style>
	.switch {
		position: relative;
		display: inline-block;
		width: 60px;
		height: 34px;
	}

	.switch input {
		display: none;
	}

	.slider {
		position: absolute;
		cursor: pointer;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #ccc;
		-webkit-transition: .4s;
		transition: .4s;
		border-radius: 30px;
	}

	.slider:before {
		position: absolute;
		content: "";
		height: 26px;
		width: 26px;
		left: 4px;
		bottom: 4px;
		background-color: white;
		-webkit-transition: .4s;
		transition: .4s;
		border-radius: 30px;
	}

	input:checked+.slider {
		background-color: #2196F3;
		border-radius: 30px;
	}

	input:focus+.slider {
		box-shadow: 0 0 1px #2196F3;
		border-radius: 30px;
	}

	input:checked+.slider:before {
		-webkit-transform: translateX(26px);
		-ms-transform: translateX(26px);
		transform: translateX(26px);
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
						<a href="#">รายการบอท</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">เพิ่มบอท</a>
					</li>

				</ul>
			</div>
			<div class="row">


				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title"> เพิ่มบอท</h4>

								<!-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
									<i class="fa fa-plus"></i>
									เพิ่มบัญชีธนาคาร
								</button> -->
							</div>
						</div>
						<div class="card-body">


							<form action="../controllers/chat-bot/edit_chatbot.php" method="post" >
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group ">
											<label>คำสำคัญ</label>
											<input id="messages" type="text" name="messages" value="<?= $bot['messages']; ?>" class="form-control" placeholder="คำสำคัญ" required>
										</div>
									</div>
                                    <div class="col-sm-12">
										<div class="form-group ">
											<label>คำตอบ</label>
										
                                            <textarea name="response" class="form-control" rows="5"  placeholder="คำตอบ" required><?php echo htmlspecialchars(stripslashes($bot['response'])); ?></textarea>
										</div>
									</div>
                      
                 

								
								</div>
								<div class="modal-footer border-0">
									<button type="submit" name="id" value="<?= $bot['id'] ; ?>" class="btn btn-primary">ยินยัน</button>
									<a href="category.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>
								</div>
							</form>
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
    document.addEventListener('DOMContentLoaded', function() {
        var checkbox = document.querySelector('input[type="checkbox"]');

        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                // do this
                console.log(checkbox.checked);
                console.log('Checked');
                document.getElementById("status").value = checkbox.checked;
            } else {
                // do that
                console.log(checkbox.checked);
                console.log('Not checked');
                document.getElementById("status").value = checkbox.checked;
            }
        });
    });
</script>

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
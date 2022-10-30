	<!-- Sidebar -->
	<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="https://via.placeholder.com/50" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Suratin
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item <?php echo $_SERVER['REQUEST_URI'] === '/ecommerce/admin/pages/index.php' ? 'active' : ''  ?>">
							<a  href="index.php" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							
							</a>
						
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						<li class="nav-item <?php echo $_SERVER['REQUEST_URI'] === '/ecommerce/admin/pages/category.php' || $_SERVER['REQUEST_URI'] === '/ecommerce/admin/pages/add-category.php' || str_contains($_SERVER['REQUEST_URI'], '/ecommerce/admin/pages/edit-category.php')  ? 'active' : ''  ?>">
							<a  href="category.php">
								<i class="fas fa-layer-group"></i>
								<p>หมวดหมู่สินค้า</p>
								
							</a>
						
						</li>
						<li class="nav-item <?php echo $_SERVER['REQUEST_URI'] === '/ecommerce/admin/pages/product.php' || $_SERVER['REQUEST_URI'] === '/ecommerce/admin/pages/add-product.php' ? 'active' : ''  ?>">
							<a  href="product.php">
								<i class="fas fa-th-list"></i>
								<p>ข้อมูลรายการสินค้า</p>
								
							</a>
							
						</li>
						<li class="nav-item <?php echo $_SERVER['REQUEST_URI'] === '/ecommerce/admin/pages/promotion.php' ? 'active' : ''  ?>" >
							<a  href="promotion.php">
							<i class="fab fa-product-hunt"></i>
								<p>ตั้งค่าโปรโมชั่น</p>
								
							</a>
							
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
							<i class="fas fa-users-cog"></i>
								<p>จัดการผู้ใช้งาน</p>
								
							</a>
						
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
							<i class="fas fa-user-circle ml-1"></i>
								<p>ตั้งค่าธนาคารโอนชำระเงิน</p>
								
							</a>
							
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#maps">
							<i class="fab fa-jedi-order"></i>
								<p>ข้อมูลการสั่งซื้อสินค้า</p>
								
							</a>
							
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#charts">
							<i class="far fa-calendar-alt"></i>
								<p>ข้อมูลการจัดส่งสินค้า</p>
								
							</a>
							
						</li>
						<li class="nav-item">
							<a href="calendar.html">
								
								<i class="far fa-chart-bar"></i>
								<p>สรุปรายงานการขาย</p>
								
							</a>
						</li>
						
					
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->
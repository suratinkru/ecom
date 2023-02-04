<?php include_once "../layouts/header.php" ?>


<?php include_once "../layouts/leftbar.php" ?>




<?php

include("../../config/connectdb.php");

$id = $_GET['id'];

if ($id) {
    $stmt = $conn->prepare("SELECT * FROM tbl_order WHERE o_id = :o_id");
    $stmt->execute(array(':o_id' => $id));

    $order = $stmt->fetch();
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
                        <a href="#">รายการสั่งซื้อ</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">แก้ไขรายการสั่งซื้อ</a>
                    </li>

                </ul>
            </div>
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title"> แก้ไขรายการสั่งซื้อ</h4>

                             
                            </div>
                        </div>
                        <div class="card-body">


                            <form action="../controllers/orders/edit_order.php" method="post" >
                                <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group ">
                                            <label>รหัสสั่งซื้อ</label>
                                            <input id="addName" type="text" name="o_id" value="<?= $order['o_id']; ?>" class="form-control" placeholder="code" disabled>
                                        </div>
                                    </div>
                                <div class="col-md-12">
                                        <div class="form-group ">
                                            <label>ชื่อลูกค้า</label>
                                            <input id="addName" type="text" name="o_name" value="<?= $order['o_name']; ?>" class="form-control" placeholder="code" disabled>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group ">
                                            <label>สถานะรายการสั่งซื้อ</label>
                                   

                                            <select name="o_status" id="o_status" class="form-control rounded-0" required="required">
                                                <option disabled>กรุณาเลือก</option>
                                                <?php
                                         $arrstatus = array('รอชำระเงิน', 'รอการตรวจสอบสลิป', 'กำลังเตรียมการจัดส่ง', 'รอรับสินค้า','สำเร็จ');
                                   
                                            foreach ($arrstatus as &$value) {

                                              
                                                    if ($value == $order['status']) {
                                                ?>
                                                        <option value="<?php echo $value ?>" selected><?php echo $value ?></option>

                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="<?php echo $value; ?>"> <?php echo $value; ?></option>



                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                            <label>Track (เลขพัสดุ ติดตาม)</label>
                                            <input id="track" type="text" name="track" value="<?= $order['track']; ?>" class="form-control" placeholder="track" >
                                        </div>
                                    </div>
                        
                                    <input id="status" type="hidden" name="id" value="<?= $order['o_id']; ?>"  >

                                </div>
                                <div class="modal-footer border-0">
                                    <button type="submit"  class="btn btn-primary">ยินยัน</button>
                                    <a href="order.php" class="btn btn-danger" data-dismiss="modal">ยกเลิก</a>
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









<?php include_once "../layouts/footer.php" ?>
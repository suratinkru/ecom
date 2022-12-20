<?php 


require_once './config/connectdb.php';

    $selectBank = $conn->prepare("SELECT * FROM `tbl_banks` ORDER BY id");//Query
    $selectBank->execute();

    $selectOrder = $conn->prepare("SELECT * FROM `tbl_order` where status = 'รอชำระเงิน'  ");//Query
    $selectOrder->execute();
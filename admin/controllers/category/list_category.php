<?php 

include("../../config/connectdb.php");

    $select = $conn->prepare("SELECT * FROM `tbl_categories` ORDER BY `id`;");//Query
    $select->execute();

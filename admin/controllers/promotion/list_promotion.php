<?php 

include("../../config/connectdb.php");

    $selectPromotion = $conn->prepare("SELECT * FROM `tbl_promotions` ORDER BY `id`;");//Query
    $selectPromotion->execute();

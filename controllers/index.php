<?php 

require_once './config/connectdb.php';

    $selectProduct = $conn->prepare("SELECT * FROM `tbl_products` ORDER BY RAND() LIMIT 20");//Query
    $selectProduct->execute();

    $selectCategory = $conn->prepare("SELECT * FROM `tbl_categories` ORDER BY RAND() LIMIT 3");//Query
    $selectCategory->execute();


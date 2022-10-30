<?php


     session_start();
   
  
	$act = $_GET['act'];

   
	if($act=='update')
	{

        if (isset($_POST['amount'])) {
            $amount_array = $_POST['amount'];
            foreach($amount_array as $p_id=>$amount)
            {
                $_SESSION['cart'][$p_id]=$amount;
            }
        }
		
	}else {
        $p_id = $_GET['p_id']; 
        if($act=='add' && !empty($_GET['p_id']))
            
        {
          
            if(isset($_SESSION['cart'][$p_id]))
            {
                // $_SESSION['cart'][$p_id]++;
            }
            else
            {
                $_SESSION['cart'][$p_id]=1;
            }
    
          
        }
    
        if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
        {
            unset($_SESSION['cart'][$p_id]);
        }
    
    }

    header( "location: ../cart.php" );
    exit(0);


?>

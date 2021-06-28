<?php
    session_start();
    require_once "../config/db.php";
    require_once "../config/actions.php";
    
    if(isset($_POST['generateToken'])){
        $planId = $_POST['plans'];
        if (empty($planId)) {
            $msg = "Please Select A Plan";
            $msgClass = "warning";
        }else{
            $planDetails = packageDetail($conn, $planId);
            $plan_name = $planDetails['name'];
            $amount = $planDetails['amount'];
            // echo $planId;
            $token = bin2hex(random_bytes(10));
            // echo $token;
            $generateToken = generateToken($conn, $token, $planId, $plan_name, $amount);
            // var_dump($generateToken);
            if($generateToken){
                $msgClass = "success";
                $msg = "Token Generate Successfully";
                header("Location:listing.php");
            }
        }
        
    }
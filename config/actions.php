<?php

    function testInput($data){
        $data = trim($data);
        $data = stripslashes($data); 
        $data = htmlspecialchars($data);
        return $data;
    }

        // Message 
        function displayMessage($type,$msg){
            return '<div class="alert alert-'.$type.' alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong class="text-center">'.$msg.'</strong>
            </div>';
        }

    function register($conn,$name,$email,$password, $token, $token_verify, $earning)
    {
        $sql = "INSERT INTO users(name,email,password, token, token_verify, earning) VALUES(:name,:email,:password,:token, :token_verify, :earning)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['name'=>$name, 'email'=>$email,'password'=>$password, 'token'=>$token, "token_verify"=>$token_verify, "earning"=>$earning]);
        return true;
    }

    function checkToken($conn, $token) {
        $sql = "SELECT token FROM tokens WHERE token=:token";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['token'=>$token]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // check if email exist
    function userExist($conn,$email, $token)
    {
        $sql = "SELECT email, token FROM users WHERE email = :email OR token =:token ";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email'=>$email, 'token'=>$token]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // login existing user
    function login($conn,$email)
    {
        $sql = "SELECT email, password FROM users WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    // retreiving current users detatil
    function currentUser($conn,$email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

 // retreiving current users detatil
    function checkTokenVerify($conn,$token)
    {
        $sql = "SELECT * FROM users WHERE token = :token";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['token'=>$token]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    // loggedIn user
    function loggedInUser($conn,$id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    // forgot password
    function forgot_password($conn,$token,$email)
    {
        $sql='UPDATE users SET token_verify = :token WHERE email = :email';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['token'=>$token,'email'=>$email]);
        return true;
    }

    //reset password
    function resetPassword($conn,$email,$token)
    {
        $sql = "SELECT id FROM users WHERE email =:email AND token_verify =:token AND token !=''";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email'=>$email,'token'=>$token]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    // Update Password
    function updatePassword($conn,$pass,$email)
    {
        $sql = 'UPDATE users SET token_verify = "", password=:pass WHERE email=:email';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['pass'=>$pass,'email'=>$email]);
        return true;
    
    }
    function afterVerify($conn,$email)
    {
        
        $sql = 'UPDATE users SET token_verify = "", verified = 1, isActive = 1 WHERE email=?';
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$email]);
        // var_dump( $result ); exit;
        return true;
    
    }

    function fetchPackages($conn){
        $sql = "SELECT * FROM package_plans";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    function packageDetail($conn, $id) {
        $sql = "SELECT * FROM package_plans WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $result = $stmt->fetch();
        return $result;
    }

    function generateToken($conn, $token, $plan, $plan_name, $amount) {
        $sql = "INSERT INTO tokens(token, plan, plan_name, amount) VALUES(:token, :plan, :plan_name, :amount)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['token'=>$token, 'plan'=>$plan, 'plan_name'=>$plan_name, 'amount'=>$amount]);
        return true;
    }

    function fetchAllGeneratedTokens($conn) {
        $sql = "SELECT * FROM tokens";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function getAllUsers($conn) {
        $sql = "SELECT * FROM users";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function getPlanName($conn, $token) {
        $sql = "SELECT id, plan_name, amount FROM tokens WHERE token =:token";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['token'=>$token]);
        $result = $stmt->fetch();
        $newArr = ["id"=>$result['id'],'planName'=>$result['plan_name'], 'planPrice'=>$result['amount']];
        return $newArr;
    }

    function subscribe($conn, $uid, $planId) {
        $sql = "INSERT INTO subscriptions(userId, planId) VALUES(:uid, :planId)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['uid'=>$uid, 'planId'=>$planId]);
        return true;
    }
?>
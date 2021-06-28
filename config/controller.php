<?php
    session_start();
    require_once "actions.php";
    require_once "db.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require 'vendor/autoload.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    if(isset($_POST['action']) && $_POST['action'] === 'register'){
        // print_r($_POST);
        $name = testInput($_POST['name']);
        $email = testInput($_POST['email']);
        $token = testInput($_POST['token']);
        $password = testInput($_POST['password']);
        $password2 = testInput($_POST['password2']);
        $earning = 0;

        $token_verify = bin2hex(random_bytes(50));

        

        // Hash password
        $hashPwd = password_hash($password,PASSWORD_DEFAULT);

        // check if email is already registered
        if(!checkToken($conn,$token)){
            echo "Wrong Token, Contact the administrator!";
        }else{
            if (currentUser($conn,$email)) {
                echo "This E-mail is already registered!";
            }else{
                if(checkTokenVerify($conn,$token)){
                    echo "Token Has been Used!";
                }else{
                    $register = register($conn,$name,$email,$hashPwd, $token, $token_verify, $earning);
                    if($register){
                        $user = currentUser($conn,$email);
                        $uid = $user['id'];
                        $plan = getPlanName($conn, $token);
                        $planId = $plan['id'];
                        
                        subscribe($conn, $uid, $planId);
                        
                        $_SESSION['user'] = $email;
                        try{
                            $mail->isSMTP();
                            $mail->Host = 'smtp.mailtrap.io';
                            $mail->SMTPAuth = true;
                            $mail->SMTPDebug  = 0;
                            $mail->Username   = "1e544c5e5f7d79";                    
                            $mail->Password   = "e841d92282037e";                              
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
                            $mail->Port       = 587;

                            $mail->setFrom("XpressManiac@mail.com",'Xpress Website');
                            $mail->addAddress($email);

                            $mail->isHTML(true);
                            $mail->Subject = 'Email Verification';
                            $mail->Body = '<h3>Click the link below to Verify your E-mail. <br>
                                <a href="http://localhost/upInvest/work/verify.php?email='.$email.'&token='.$token_verify.'">Click here to verify your E-mail</a>
                                <br>Regards<br>Xpress Website</h3>';
                            $mail->send();
                            echo "Registered SuccessFully";
                        }catch(Exception $e){
                            echo 'Oops something went wrong! please try again';
                        }
                    }else{
                        echo "Server Error";
                    }
                }
           }
        }
    }

    // handle login
    if(isset($_POST['action']) && $_POST['action'] === 'login'){
        // print_r($_POST);
        $email = testInput(($_POST['username']));
        $pass = testInput(($_POST['login-password']));

        $loggedInUser = login($conn,$email);
        if($loggedInUser != null){
            if(password_verify($pass,$loggedInUser['password'])){
                echo 'login';
                $_SESSION['user'] = $email;
            }else{
                echo 'Password is incorrect';
            }
        }else{
            echo 'User not found!';
        }
    }

    // forgot password
    if(isset($_POST['action']) && $_POST['action'] === 'forgot'){
        // print_r($_POST);
        $email = testInput($_POST['email']);
        $userFound = currentUser($conn,$email);
        if($userFound != null){
            $token = bin2hex(random_bytes(50));
            forgot_password($conn,$token,$email);
            try{
                $mail->isSMTP();
                $mail->Host = 'smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->SMTPDebug  = 0;
                $mail->Username   = "1e544c5e5f7d79";                    
                $mail->Password   = "e841d92282037e";                              
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
                $mail->Port       = 587;

                $mail->setFrom("XpressManiac@mail.com",'Xpress Website');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Reset Password';
                $mail->Body = '<h3>Click the link below to reset your password. <br>
                    <a href="http://localhost/upInvest/work/reset-pass.php?email='.$email.'&token='.$token.'">Click here to Reset Password</a>
                    <br>Regards<br>Xpress Website</h3>';
                $mail->send();
                echo 'A resest link has been sent to your email!';

            }catch(Exception $e){
                echo 'Oops something went wrong! please try again';
            }
        }else{
            echo 'This Email is not registered!';
        }
    }

?>
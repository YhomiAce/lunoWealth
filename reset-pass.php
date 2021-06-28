<?php
    require_once "config/header2.php";
    require_once "config/actions.php";
    require_once "config/db.php";

    $msg ="";
    if(isset($_GET['email']) && isset($_GET['token'])){
        $email = testInput($_GET['email']);
        $token = testInput($_GET['token']);
        $auth_user = resetPassword($conn, $email,$token);
        if($auth_user != null){
            if(isset($_POST['submit'])){
                $newPass = $_POST['password'];
                $CPass = $_POST['password2'];

                if($newPass == $CPass){
                    $hashPwd = password_hash($newPass,PASSWORD_DEFAULT);
                    updatePassword($conn, $hashPwd,$email);
                    $msg= 'Password changed successfully<br><a href="login.php">Login Here</a>';
                }else{
                    $msg="Passwords do not match!";
                }
            }
        }else{
            header('location:index.php');
            exit();
        }
    }else{
        header('location:index.php');
        exit();
    }
?>

<section id="inner_page_infor" class="innerpage_banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="full">
                        <div class="inner_page_info wow bounceIn">
                            <h3>Reset <span>Password</span></h3>
                        </div>
                    </div>
                </div>
                <form method=post name=mainform id="login-form">
                    <div style="color:#fff;" class="text-center text-light lead mb-2"><?= $msg; ?></div>
                    
                        <div class="form_block">
                            <span>                                  
                                <i class="fa fa-key"></i>
                                <input placeholder="New Password" type=password required name=password value='' class="inpts" size=20>
                            </span>
                        </div>
                    </div>

                <div class="col-md-12">
                    <div class="form_block">
                        <span>                                   
                            <i class="fa fa-key"></i>
                            <input placeholder="Password" type=password required name="password2" value='' class=inpts size=30>
                        </span>
                    </div>
                </div>
                <input type="submit" name="submit" value="Create New Passwoord" class=sbmt>
               
            </div>
        </div>
</section>

<?php
    require_once "config/footer.php";
?>
<?php
    require_once "config/header2.php";
    require_once "config/actions.php";
    require_once "config/db.php";

    $isverify;

    if (isset($_GET['email']) || isset($_GET['token'])) {
        $email = $_GET['email'];
        $token = $_GET['token'];
        
        $verify = afterVerify($conn,$email);
        if ($verify) {
            $isverify = true;
        }else{
            $isverify = false;
        }
    }else{
        
        header("Location: index.php");
    }
?>

<section id="inner_page_infor" class="innerpage_banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="full">
                        <div class="inner_page_info wow bounceIn">
                            <h3>Verify <span>Account</span></h3>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($isverify) : ?>
            <div class="row">
                <div class="col-md-8"> 
                    <h3 class="text-center text-light">Congratulations Your Account has been verified</h3>
                    <a href="index.php" class="btn btn-primary">Go to Homapage</a>
                </div>
            </div>
            <?php else : ?>
                <div class="col-md-8"> 
                    <h3 class="text-center text-light">An Error occured Contact Administrator</h3>
                    <a href="support.php" class="btn btn-primary">Support</a>
                </div>
            <?php endif; ?>
        </div>
</section>

<?php
    require_once "config/footer.php";
?>
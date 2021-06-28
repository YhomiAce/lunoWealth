<?php 
    include('adminHeader.php');
    require_once "../config/db.php";
    require_once "../config/actions.php";

    $plans = fetchPackages($conn);
    $msg = "";
    $msgClass = "";
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
            
            $generateToken = generateToken($conn, $token, $planId, $plan_name, $amount);
            
            if($generateToken){
                $msgClass = "success";
                $msg = "Token Generate Successfully";
            }
        }
        
    }
    $tokens = fetchAllGeneratedTokens($conn);
?>

<div class="container">
<h3 class="text-center text-primary">Create Tokens</h3>
    <div class="row justify-content-center">
        <?php if (!empty($msg)): ?>
            <div class="alert alert-<?=$msgClass; ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong class="text-center"><?= $msg; ?></strong>
            </div>
            
        <?php endif; ?>
        
        <div class="col-md-8">
            
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-inline">
            
                <div class="form-group mb-4">
                    <select name="plans" id="plans" class="form-control flex-grow-0 w-auto">
                        <option value="" disabled selected>Select Package</option>
                        <?php foreach($plans as $plan): ?>
                        <option value="<?= $plan['id']; ?>"><?= $plan['name']; ?></option>
                        <?php endforeach; ?>
                        
                    </select>
                    <button type="submit" name="generateToken" class="btn btn-primary mx-3">Generate Token</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <table class="table table-stripe">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Token</th>
                    <th>Plan Name</th>
                    <th>Plan Price</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($tokens) <= 1 ): ?>
                <h3 class="text-center">No Token Generated</h3>
                <?php else : ?>
                <?php foreach($tokens as $index=> $key): ?>
                <tr>
                    <td><?= $index +1; ?></td>
                    <td><?= $key['token']; ?></td>
                    <td><?= $key['plan_name']; ?></td>
                    <td><?= number_format($key['amount']); ?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('adminFooter.php') ?>
<?php 
    include('adminHeader.php');
    require_once "../config/db.php";
    require_once "../config/actions.php";

    $users = getAllUsers($conn);


?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Users</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Plan</th>
                                            <th>Amount</th>
                                            <th>Date Joined</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php foreach($users as $key=> $user): ?>
                                        <tr>
                                            <td><?= $key+1; ?></td>
                                            <td><?= $user['name']; ?></td>
                                            <td><?= $user['email']; ?></td>
                                            <td><?= getPlanName($conn,$user['token'])['planName']; ?></td>
                                            <td><?= getPlanName($conn,$user['token'])['planPrice']; ?></td>
                                            <td><?= $user['created_At']; ?></td>
                                            <td><i class="fas fa-edit"></i></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            
<?php include('adminFooter.php') ?>
<?php 
// Start session 
session_start(); 
 
// Get data from session 
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
 
// Get status from session 
if(!empty($sessData['status']['msg'])){ 
    $statusMsg = $sessData['status']['msg']; 
    $status = $sessData['status']['type']; 
    unset($_SESSION['sessData']['status']); 
} 
 
// Include and initialize DB class 
require_once '../database/DB.php'; 
$db = new DB(); 
 
// Fetch the users data 
$users = $db->getRows('user', array('order_by'=>'id DESC')); 
 
// Retrieve status message from session 
if(!empty($_SESSION['statusMsg'])){ 
    echo '<p>'.$_SESSION['statusMsg'].'</p>'; 
    unset($_SESSION['statusMsg']); 
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
<div class="container-fluid col-8">


<div class="row">
    <div class="col-6 head">
        <h5>Users</h5>
        <!-- Add link -->
        <div class="float-right">
            <a href="add.php" class="btn btn-success"><i class="plus"></i> New User</a>
        </div>
    </div>
    
    <!-- Status message -->
    <?php if(!empty($statusMsg)){ ?>
        <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
    <?php } ?>

    <!-- List the users -->
    <table class="table table-striped table-bordered col-6 m-auto">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th >Name</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($users)){ $i=0; foreach($users as $row){ $i++; ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">edit</a>
                    <a href="action.php?action_type=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?');">delete</a>
                </td>
            </tr>
            <?php } }else{ ?>
            <tr><td colspan="5">No user(s) found...</td></tr>
            <?php }  ?>
        </tbody>
    </table>
</div>

</div>

    
</body>
</html>
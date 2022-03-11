

<?php
  
  // Include database file
  include 'category.php';

  $categoryObj = new Category();

  // Edit category record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $category = $categoryObj->displyaRecordById($editId);
  }

  // Update Record in category table
  if(isset($_POST['update'])) {
    $categoryObj->updateRecord($_POST);
  }  
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update records</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
  <h4>Update</h4>
</div><br> 

<div class="container">
  <form action="edit_category.php" method="POST">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="uname" value="<?php echo $category['name']; ?>" required="">
    </div>

    <div class="form-group">
      <label for="details">details:</label>
      <input type="text" class="form-control" name="udetails" value="<?php echo $category['details']; ?>" required="">
    </div>

   
    <div class="form-group">
      <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Update">
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


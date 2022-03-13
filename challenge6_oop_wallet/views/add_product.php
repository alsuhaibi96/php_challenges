

<?php

include ('../http/middleware/authentication.php');

// Include database file
include 'Product.php';

$productObj = new product();

// Insert Record in product table
if(isset($_POST['submit'])) {
  $file = $_FILES['img'];
  $productObj->insertData($_POST,$file);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Add product</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">
<h4>Adding a new prodcut</h4>
</div><br> 

<div class="container">
<form action="add_product.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" placeholder="Enter name" required="">
  </div>
  <div class="form-group">
    <label for="name">Product image:</label>
    <input type="file" class="form-control" name="img" placeholder="Upload an image" id="img" required="">
  </div>
  <div class="form-group">
    <label for="price">Price:</label>
    <input type="price" class="form-control" name="price" placeholder="Enter price" required="">
  </div>
  <div class="form-group">
    <label for="detials">detials:</label>
    <textarea type="text" class="form-control" name="details" placeholder="Enter detials" required=""></textarea>
  </div>
  <div class="form-group">

  <select name="category_id">
  <?php 
          $categories = $productObj->displayCatData(); 
          foreach ($categories as $category) {
      
                                echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
                            }
                        ?>
                    </select>
                          </div>  
  <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>





<?php

include ('../http/middleware/authentication.php');
//include cart checking
include ('../config/cart/cart_config.php');

//include product class for crud operations
include ('product.php');
$productObj=new Product();


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>

<?php include ('./partials/header.php');?>


<div class="container">
        <div class="row text-center py-5">
                     
        <?php
$products=$productObj->displayData();
foreach($products as $product){
$id=$product['id'];
?>
        <div class="col-md-3 col-sm-6 my-3 my-md-0\">
   
        <form action="index.php" method="post">
                    <div class="card shadow">
                        <div>
                            <img src="<?php echo '../public/images/uploads/'.$product['img']?>" alt="Image1" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['id']?></h5>
                            <h6>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </h6>
                            <p class="card-text">
                                <?php echo $product['details'];?>
                            </p>
                            <h5>
                                <small><s class="text-secondary">$519</s></small>
                                <span class="price">      <?php echo '$'. $product['price'];?></span>
                            </h5>

                            <button type="submit" class="btn btn-warning my-3" name="add">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                             <input type='hidden' name="id" value="<?php echo $id?>">
                        </div>
                    </div>
                </form>

            </div>
            
            <?php }?>
        </div>
</div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
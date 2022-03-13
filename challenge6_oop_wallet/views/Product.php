
<?php

	class Product
	{
		private $servername = "localhost";
		private $username   = "root";
		private $password   = "";
		private $database   = "library";
		public  $con;


		// Database Connection 
		public function __construct()
		{
		    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
		    if(mysqli_connect_error()) {
			 trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
		    }else{
			return $this->con;
		    }
		}

		// Insert product data into product table
		public function insertData($post, $file)
		{
		


			$name = $this->con->real_escape_string($_POST['name']);
			$price = $this->con->real_escape_string($_POST['price']);
			$details = $this->con->real_escape_string($_POST['details']);
			$category_id = $this->con->real_escape_string($_POST['category_id']);
		
	
	//img uploading 
	$allow = array('jpg', 'jpeg', 'png');
	$exntension = explode('.', $file['name']);
	$fileActExt = strtolower(end($exntension));
	$fileNew = rand() . "." . $fileActExt;  // rand function create the rand number
	$filePath = '../public/images/uploads/'.$fileNew;
 
 if (in_array($fileActExt, $allow)) {
				if ($file['size'] > 0 && $file['error'] == 0) {
			 if (move_uploaded_file($file['tmp_name'], $filePath))
				$query="INSERT INTO product(name,price,details,category_id,img) VALUES('$name','$price','$details','$category_id','$fileNew')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:show_product.php?msg1=insert");
			}else{
			    echo "Adding failed try again!";
			}
		}
	}}

		// Fetch prodcut records for show listing
		public function displayData()
		{
		    $query = "SELECT * FROM product ";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 echo "No found records";
		    }
		}

// Fetch categories records for show listing
public function displayCatData()
{
	$query = "SELECT * FROM categories ";
	$result = $this->con->query($query);
if ($result->num_rows > 0) {
	$data = array();
	while ($row = $result->fetch_assoc()) {
		   $data[] = $row;
	}
	 return $data;
	}else{
	 echo "No found records";
	}
}
  // get product from the database
  public function getData(){
	$sql = "SELECT * FROM product";

	$result = mysqli_query($this->con, $sql);

	if(mysqli_num_rows($result) > 0){
		return $result;
	}
}
		// // Fetch single data for edit from product table
		public function displyaRecordById($id)
		{
		    $query = "SELECT * FROM product WHERE id = '$id'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Record not found";
		    }
		}

		// Update product data into product table
		public function updateRecord($postData)
		{
		    $name = $this->con->real_escape_string($_POST['uname']);
		    $price = $this->con->real_escape_string($_POST['uprice']);
		    $details = $this->con->real_escape_string($_POST['udetails']);
			$category_id = $this->con->real_escape_string($_POST['ucategory_id']);

		    $id = $this->con->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE product SET name = '$name', price = '$price', details = '$details',category_id='$category_id' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:show_product.php?msg2=update");
			}else{
			    echo "Registration updated failed try again!";
			}
		    }
			
		}


		// Delete product data from product table
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM product WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:show_product.php?msg3=delete");
		}else{
			echo "Record does not delete try again";
		    }
		}

	}
?>
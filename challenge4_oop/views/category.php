<?php
class Category {
private $server_name="localhost";
private $password="";
private $user="root";
private $database_name="library";

public $con;

//connect to db
public function __construct(){
    $this->con=new mysqli($this->server_name,$this->user,$this->password,$this->database_name);
if(mysqli_connect_error()){
    trigger_error("Can't connect to database".mysqli_connect_error());
}
else
{

    return $this->con;
}
}


// Insert category data into category table
public function insertData($post)
{
    $name = $this->con->real_escape_string($_POST['name']);
    $details = $this->con->real_escape_string($_POST['details']);
    
    $query="INSERT INTO categories(name,details) VALUES('$name','$details')";
    $sql = $this->con->query($query);
    if ($sql==true) {
        header("Location:show_category.php?msg1=insert");
    }else{
        echo "Adding failed try again!";
    }
}

// Fetch category records for show listing
public function displayData()
{
    $query = "SELECT * FROM categories";
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

// // Fetch single data for edit from category table
public function displyaRecordById($id)
{
    $query = "SELECT * FROM categories WHERE id = '$id'";
    $result = $this->con->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    return $row;
    }else{
    echo "Record not found";
    }
}

// Update category data into category table
public function updateRecord($postData)
{
    $name = $this->con->real_escape_string($_POST['uname']);
    $details = $this->con->real_escape_string($_POST['udetails']);
    $id = $this->con->real_escape_string($_POST['id']);
if (!empty($id) && !empty($postData)) {
    $query = "UPDATE categories SET name = '$name' , details = '$details' WHERE id = '$id'";
    $sql = $this->con->query($query);
    if ($sql==true) {
        header("Location:show_category.php?msg2=update");
    }else{
        echo "Update failed try again!";
    }
    }
    
}


// Delete category data from category table
public function deleteRecord($id)
{
    $query = "DELETE FROM categories WHERE id = '$id'";
    $sql = $this->con->query($query);
if ($sql==true) {
    header("Location:show_category.php?msg3=delete");
}else{
    echo "Record does not delete try again";
    }
}
}
?>
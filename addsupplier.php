<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<?php


// initializing variables
$supplier_name = "";
$contact_number    = "";
$address    = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'inventorymanagement');
if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

// Add item
if (isset($_POST['add'])) {
  // receive all input values from the form
  echo "connect";
  $supplier_name=mysqli_real_escape_string($db, $_POST['supplier_name']);
  $contact_number=mysqli_real_escape_string($db, $_POST['contact_number']);
  $address=mysqli_real_escape_string($db, $_POST['address']);
  
    $query = "INSERT INTO supplier (supplier_name,contact_number,address) 
  			  VALUES('$supplier_name','$contact_number','$address')";
      if(mysqli_query($db, $query))
      {
      echo "<script>alert('Successfully stored');</script>";
				
    }
    else{
        echo"<script>alert('Somthing wrong!!!');</script>";
    }
  	
  	header('location: supplier.php');
  
}
?>

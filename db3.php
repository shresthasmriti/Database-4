<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="navbar-header">
<a class="navbar-brand" href="#">VEHICLE</a>
</div>
<ul class="nav navbar-nav">
<li class="active"><a href="#">Home</a></li>
<li><a href="#">BOOKING</a></li>
<li><a href="#">VEHICLE</a></li>
<li><a href="#">CUSTOMERS</a></li>

</ul>
</div>
</nav> 

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Vehicle_rental";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Name, CreditCard_Info, contact_number, License_number, Customer_ID FROM Customer";

$result = $conn->query($sql);
print ("<br/>");
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo " ";
    echo "  Name: " . $row["Name"]. "<br>";
    echo "  Credit Card Info: " . $row["CreditCard_Info"]. "<br>";
    echo "  Contact number: " . $row["contact_number"]. " <br>";
    echo "  License No.: " . $row["License_number"]. "<br>";
    echo "  ID: " . $row["Customer_ID"]."<br>";

  }
$sql = "SELECT * FROM Customers WHERE ID > 0";
$result = $conn->query($sql);
} else {
  echo "0 results";
}

$conn->close();
?>

  

<form method=\"post\" action=\"$_SERVER[PHP_SELF]\">
Enter customer name: <input type=\"text\" name=\"Name\">

<input type="submit">
</form>

<?php


if ($_POST['Name'])
 {  
    $id = $_POST['Name'];
 }

 $sql = "SELECT * FROM Customer";
 $result = $conn->query($sql);

 while($row = $result->fetch_assoc()) {
     if ($row["Name"] == $id)
     {
    echo "  Name: " . $row["Name"]. "<br>";
    echo "  Credit Card Info: " . $row["CreditCard_Info"]. "<br>";
    echo "  Contact number: " . $row["contact_number"]. " <br>";
    echo "  License No.: " . $row["License_number"]. "<br>";
    echo "  ID: " . $row["Customer_ID"]."<br>";
     }
 }
 if (empty($name)) {
    echo "Field is empty";
  } else {
    $sql = "SELECT * FROM Customer WHERE Customer_ID = {'$name'}";
  }

  $sql = $conn->prepare("SELECT * FROM Customer WHERE Customer_ID = ? ");
  $sql->bind_param("i", $name);
  $sql->execute();
  $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

$sql->close();
$conn->close();

?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<label>Doctor Name</label>
   <input type = "text" name = "name">
   <br>
   <label> ID</label>
   <input type = "number" name = "id">
   <br>
   <label>Payment</label>
   <input type = "number" name = "creditcard"> 
   <br>
   <label>Information</label>
   <input type = "number" name = "license">
   <br>
   <label>Contact</label>
   <input type = "number" name = "contactNumber">
   <br>
   <button>
  </form>
  <?php
    
	$name = $_POST['Name'];
	$ID = $_POST['Customer_ID'];
	$Payment = $_POST['CreditCard_Info'];
	$Information = $_POST['License_number'];
	$Contact = $_POST['contact_number'];

	
	$query = "INSERT into Customers(Name,CreditCard_Info, contact_number, License_number, Customer_ID,'$code')";
	
	$run = mysqli_query($conn, $query) or die (mysqli_error());
 
         if($run)
         {
             echo "Data added successfully";
         }
         else 
         {
             echo "Data could not be added";
         }
 ?>

</body>
</html>


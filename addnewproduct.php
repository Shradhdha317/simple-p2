<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$product = $price = $designer = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Get values 
        $product = trim($_POST["ProductName"]);
        $price = trim($_POST["Price"]);
        $designer = trim($_POST["DesignerName"]);   
        
    // Prepare an insert statement
    $sql = "INSERT INTO products (product, price, designer) VALUES (?, ?, ?)";
         
        // Use DB info in $link from config.php to construct MySQL message/command
        if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_product, $param_price, $param_designer);
            
            // Set parameters
            $param_product = $product;
            $param_price = $price; 
            $param_designer = $designer; 
            
            // Attempt to EXECUTE the prepared statement
            mysqli_stmt_execute($stmt);            

            // Close statement
            mysqli_stmt_close($stmt);
            $message = "Congratulations! Your product has been Successfully Registered!";

        } else {
                 $message = "Problems with inserting your product to Database";            
        }

    // Close connection
    mysqli_close($link);
}
?>

<html>
<head>
    <title>Add Products Page</title>
<style>
body {
  	background-image: url('checkproduct_menu_background.jpg');
  	background-repeat: no-repeat;
  	background-attachment: fixed;
  	background-size: cover;
	}

h3{
	color: white;
	text-shadow: 0 0 3px #FF0000, 0 0 10px black;
	font-size:70px;
	}
</style>
</head>
<body>
<center>
<h3>
<?php echo $message; ?>
</h3>
</center>
</body>
</html>


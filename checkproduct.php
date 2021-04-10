<?php
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$product = $price = $designer = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

        $product = trim($_POST["ProductName"]);
        $price = trim($_POST["Price"]);
	$designer = trim($_POST["DesignerName"]);
  
    // Validate credentials

        // Prepare a select statement
        $sql = ("SELECT product, price, designer FROM products WHERE product = '?'");
        
                if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_product);
            
            // Set parameters
            $param_product = $product;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $product, $h_price, $h_designer);
                    if(mysqli_stmt_fetch($stmt)){
                        if($price == $h_price && $designer == $h_designer){
		    // match both values price and designer with databse if it is correct then print successful message 
                            $message = "The data you entered is successfully found from the database!";

                        } else{
                            $message = "The data you entered is not matched with the database. Please check your data and try again!";
                        }
                    }
                } else{
                    $message = "No data found with this given product name.";
                }           
            } 

            // Close statement
            mysqli_stmt_close($stmt);
        }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<html>
<head>
    <title>Check Products Page</title>
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


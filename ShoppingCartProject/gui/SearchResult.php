<?php include '..\controller\SearchController.php';
$itemName = $_GET['searchCriteria'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../style/style.css">
<title>Search Result</title>
</head>
<body>
    
        <div id="header">
            <h1>Displaying results for... <?php echo $itemName; ?></h1>
        </div>
    
    <div class="container">
        <div id="nav">
        <ul>
          <li><a href="../index.html">Home</a></li>
          <li><a href="../gui/ManageShoppingCart.php">Shopping Cart</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="#about">About</a></li>
        </ul>
        </div>
    

        <div id="section">
	<?php
        $searchItem = new SearchController();
	$searchItem->actionPerformed($itemName);      
	?>
        </div>

        <div id="footer">
        Copyright © 2015, Leonardo Farinha, Robert Krall
        </div>
    </div>
</body>
</html>

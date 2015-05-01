<?php include '..\controller\SearchController.php';?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../style/style.css">
<title>Search Result</title>
</head>
<body>
    
        <div id="header">
            <h1>Shop-a-ton!</h1>
        </div>
    
            
        <div id="nav">
        <ul>
            <li><a href="/ShoppingCartProject/index.html">Home</a></li>
          <li><a href="gui/ManageShoppingCart.php">Shopping Cart</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="#about">About</a></li>
        </ul>
        </div>
    

        <div id="section">
	<?php
        $params = $_GET['searchCriteria'];
        $searchItem = new SearchController();
	$searchItem->actionPerformed($params);      
	?>
        </div>

        <div id="footer">
        Copyright © 2015, Leonardo Farinha, Robert Krall
        </div>
</body>
</html>

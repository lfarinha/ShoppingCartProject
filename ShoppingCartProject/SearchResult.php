<?php include 'SearchController.php';?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Search Result</title>
</head>
<body>
    
        <div id="header">
        <h1>Welcome!</h1>
        </div>
    
            
        <div id="nav">
        </div>
    

        <div id="section">
	<?php

        $params = $_POST["searchCriteria"];
        $searchItem = new SearchController();
	$searchItem->searchParams($params);
                
	$name = $searchItem->getItemName();
        $brand = $searchItem->getItemBrand();
        $price = $searchItem->getItemPrice();
        $qtty = $searchItem->getItemQtty();
        $location = $searchItem->getItemLocation();
                
        echo'<div id="box">
            <form action="ItemView.php" method="post">
            <table id="t01">
            <tr>
                <th><a>Name</a></th>
                <th><a>Brand</a></th>
                <th><a>Price</a></th>
                <th><a>Qtty in Stock</a></th>
                <th><a>Img Location</a></th>
            <tr>
            <tr>
                <td><a href="ItemView.php" name="'.$name.'" onclick="form.submit()">'.$name.'</a></td>
                <td>'.$brand.'</td>
                <td>'.$price.'</td>
                <td>'.$qtty.'</td>
                <td>'.$location.'</td>
            <tr>
            </table>
            </form>
            </div>';
        
        
	?>
        </div>

        <div id="footer">
        Copyright © 2015, Leonardo Farinha, Robert Krall
        </div>
</body>
</html>

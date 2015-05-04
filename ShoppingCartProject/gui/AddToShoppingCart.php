<?php include '..\controller\ShoppingCartController.php';
        if (isset($_GET['qtty']) and isset($_GET['addtoshoppingcart'])) {
                $qtty = $_GET['qtty'];
                $itemName = $_GET['addtoshoppingcart'];
        }else {
                $qtty = null;
                $itemName = null;        
        }
        ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../style/style.css">
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        <div id="header">
            <h1>The item was successfully added to your shopping cart!</h1>
        </div>
    
            
        <div id="nav">
          <ul>
          <li><a href="../index.html">Home</a></li>
          <li><a href="../gui/ManageShoppingCart.php">Shopping Cart</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="#about">About</a></li>
        </ul>
        </div>
    
        <form method="get" action="ManageShoppingCart.php">
        <div id="section">
            <div id="searchBox">
            <?php $lookUpItem = new ShoppingCartController(); $lookUpItem->addToCartHandler($itemName, $qtty); ?>
            </div>
        </div>
        
        <div id="aside">
            <div id="asideButtonBox">
            <button type="submit" name="manageshoppingcart" id="sideButtonDecor">Manage your Cart</button>
            </div>
        </div>
        </form>
        <div id="footer">
        Copyright © 2015, Leonardo Farinha, Robert Krall
        </div>

    </body>
</html>
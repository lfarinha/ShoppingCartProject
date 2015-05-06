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
        <title>Manage Shopping Cart</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <script src="../ajax/Javascript/jQuery-1.11.2.js"></script>
        
    </head>
    <body>
        <div id="header">
            <h1>Manage your shopping cart!</h1>
        </div>
    
            
        <div id="nav">
          <ul>
          <li><a href="../index.html">Home</a></li>
          <li><a href="ManageShoppingCart.php">Shopping Cart</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="#about">About</a></li>
        </ul>
        </div>
    

        <div id="section">
            <div id="searchBox">
            <?php $lookUpItem = new ShoppingCartController(); $lookUpItem->displayItemsFromCartHandler(); ?>
            </div>
        </div>
        <div id="aside">
            <div id="asideButtonBox">
            <form method="get" action="checkout.php">
                <button type="submit" name="checkout" id="sideButtonDecor">Check Out</button>
            </form>
            </div>
        </div>

        <div id="footer">
        Copyright © 2015, Leonardo Farinha, Robert Krall
        </div>
    </body>
</html>
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
            <h1>Welcome!</h1>
        </div>
    
            
        <div id="nav">
        </div>
    

        <div id="section">
            <?php 
                    $lookUpItem = new ShoppingCartController();
                    $lookUpItem->displayItemsFromCartHandler();
            ?>
        </div>
        <div id="aside">
            <form method="get" action="checkout.php">
                <button type="submit" name="checkout">Check Out</button>
            </form>
        </div>

        <div id="footer">
        Copyright © 2015, Leonardo Farinha, Robert Krall
        </div>
    </body>
</html>
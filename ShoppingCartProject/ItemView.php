<?php include 'ItemViewController.php';
if (isset($_GET['itemName'])) {
                $itemToShow = $_GET['itemName'];
            }else {
                $itemToShow = null;
                    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title><?php echo $itemToShow; ?></title>
</head>
<body>
        <div id="header">
        <h1>Welcome!</h1>
        </div>
    
            
        <div id="nav">
        </div>
    

        <div id="section">
            <div id="itemInfoBox">
            <?php
            
            $showItemInfo = new ItemViewController();
            $showItemInfo->actionPerformed($itemToShow);
                                
              ;?>
            </div>
        </div>
    
        <div id="aside">
            <input type="submit" name="shoppingCart" value="Add to shopping cart" id="shoppingCartButton">
        </div>

        <div id="footer">
        Copyright © 2015, Leonardo Farinha, Robert Krall
        </div>  
</body>
</html>



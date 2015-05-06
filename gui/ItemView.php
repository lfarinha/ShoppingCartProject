<?php include '..\controller\ItemViewController.php';
if (isset($_GET['itemName'])) {
                $itemToShow = $_GET['itemName'];
            }else {
                $itemToShow = null;
                    }?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <title><?php echo $itemToShow; ?></title>
</head>
<body>
        
        <div id="header">
        <h1>Review your quantities!</h1>
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
    
        <form method="get" action="AddToShoppingCart.php">
        <div id="section">
            <div id="searchBox">
            <?php $showItemInfo = new ItemViewController(); $showItemInfo->actionPerformed($itemToShow);?>
            </div>
        </div>
    
        <div id="aside">
            <div id="asideButtonBox">
            <button type="submit" name="addtoshoppingcart" id="sideButtonDecor" value="<?php echo $itemToShow; ?>">Add to Cart</button>
            </div>
        </div>
        </form>
        <div id="footer">
        Copyright © 2015, Leonardo Farinha, Robert Krall
        </div>
    </div>
</body>
</html>



<?php include '..\controller\ReceiptController.php';
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
            <h1>Welcome!</h1>
        </div>
    
            
        <div id="nav">
        </div>
    

        <div id="section">
<!--            Just outputting the receipt per order.-->
            
            <b>Order Number</b>: <?php echo rand() ?>
            <br/>
            Total Price: <?php echo htmlspecialchars($_GET["price"]); ?>
            <br/>
            First Name: <?php echo htmlspecialchars($_GET["fname"]); ?>
            <br/>
            Last Name: <?php echo htmlspecialchars($_GET["lname"]); ?>
            <br/>
            Address Line 1: <?php echo htmlspecialchars($_GET["AddressLine1"]); ?>
            <br/>
            Address Line 2 : <?php echo htmlspecialchars($_GET["AddressLine2"]); ?>
            <br/>
            City: <?php echo htmlspecialchars($_GET["City"]); ?>
            <br/>
            State: <?php echo htmlspecialchars($_GET["State"]); ?>
            <br/>
            Zip: <?php echo htmlspecialchars($_GET["Zip"]); ?>
            <br/>
            Phone: <?php echo htmlspecialchars($_GET["Phone"]); ?>
            <br/>
            Email: <?php echo htmlspecialchars($_GET["email"]); ?>
            <br/>
            <br/>
            <b>Items purchased</b>
            <br/>
            <br/>
             <?php 
                    $updateInventory = new ReceiptController();
                    $updateInventory->displayItemsFromCartHandler();
                    $updateInventory->uptdateInventorytHandler();
            ?>
        
        </div>
        
       

        <div id="footer">
        Copyright © 2015, Leonardo Farinha, Robert Krall
        </div>
    </body>
</html>
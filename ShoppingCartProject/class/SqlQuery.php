<?php include 'SqlConnection.php'; include_once"PrintValues.php";

class SqlQuery{
    
    function searchFromItemTable($itemName){
        $mysqli=new SqlConnection();
        $printSelectedItem = new PrintValues();
        $query = "SELECT * FROM item WHERE itemName='$itemName'";       
        if ($result = mysqli_query($mysqli->mysqliConnect(), $query)) {
			$row = mysqli_fetch_assoc($result);
			$printSelectedItem->printItemInfo($row['itemImageLocation'], $row['itemName'], $row['itemBrand'], $row['itemPrice'], $row['itemQtty']);
                        //echo $row['itemName'].' '.$row['itemBrand'].' '.$row['itemPrice'].' '.$row['itemQtty'].' '.$row['itemImageLocation'];      
        }
                $mysqli->mysqliConnect()->close();
    }
    
    function selectFromItemTable($itemName){
        $connection = new SqlConnection(); $mysqli = $connection->mysqliConnect();
        $printSelectedItem = new PrintValues();
        $query = "SELECT * FROM item WHERE itemName='$itemName'";       
        if ($result = $mysqli->query($query)) {
			$row = mysqli_fetch_assoc($result);
                        $printSelectedItem->printItemInfoQtty($row['itemImageLocation'], $row['itemName'], $row['itemBrand'], $row['itemPrice'], $row['itemQtty']);
        }
                $mysqli->close();
    }
    
    function selectFromTempCartTable($itemName, $qtty){
        $connection = new SqlConnection();
        $mysqli = $connection->mysqliConnect();
        $query = "SELECT * FROM item WHERE itemName='$itemName'";
        $result = $mysqli->query($query);
        if($row = mysqli_fetch_assoc($result)){
        $this->insertIntoTempCartTable($row['itemName'], $row['itemBrand'], $row['itemPrice'], $qtty, $row['itemImageLocation']);
        }else{
            echo 'There is no data on table Item';
        }
        $mysqli->close();
    }
    
    function createTableTempCart(){
        $connection = new SqlConnection();
		
		$sql_query = "CREATE TABLE IF NOT EXISTS `tempcart` (
                              `itemName` varchar(100) NOT NULL,
                              `itemBrand` varchar(100) NOT NULL,
                              `itemPrice` int(100) NOT NULL,
                              `itemQtty` int(100) NOT NULL,
                              `itemImageLocation` varchar(100) NOT NULL
                               ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

                if ($connection->mysqliConnect()->query($sql_query) === TRUE) {
                    //echo "Table tempCart created successfully";
                } else {
                    echo "Error creating CARTTEMP table: ".$connection->mysqliConnect()->error;
                }
                $connection->mysqliConnect()->close();
    }
    
    function insertIntoTempCartTable($itemName, $brand, $price, $qtty, $img){
        $connection = new SqlConnection(); 
        $mysqli = $connection->mysqliConnect(); 
        $query = "SELECT * FROM tempcart WHERE itemName='$itemName'";
        $result= $mysqli->query($query);
        $row = mysqli_fetch_assoc($result);
        if ($row['itemName'] === $itemName) {
                $queryUpdate = "UPDATE `tempCart` SET itemQtty=$qtty WHERE itemName='$itemName'";
                $mysqli->query($queryUpdate);
         } else { $queryInsert = "INSERT INTO `tempCart` (`itemName`, `itemBrand`, `itemPrice`, `itemQtty`, `itemImageLocation`) VALUES ('$itemName', '$brand', '$price', '$qtty', '$img')";
                    $mysqli->query($queryInsert);
         }
        $mysqli->close();
    }
    
    function selectFromTempCartToPrint($itemName){
        $connection = new SqlConnection();
        $mysqli = $connection->mysqliConnect();
        $printAddedItem = new PrintValues();
        $query = "SELECT * FROM tempcart WHERE itemName='$itemName'";
        $result = $mysqli->query($query);
        $row = mysqli_fetch_assoc($result);
        $printAddedItem->printItemAddedToCart($row['itemImageLocation'], $row['itemName'], $row['itemBrand'], $row['itemPrice'], $row['itemQtty']);
    }
    
    function selectAllFromTempCart(){
        $connection = new SqlConnection();
        $printValue = new PrintValues();
        $mysqli = $connection->mysqliConnect();
        $sql_query = "SELECT * FROM tempcart";
        $result = $mysqli->query($sql_query);
        $printValue->printAllFromCart($result);
        $printValue->printReceiptItems($result);
        $connection->mysqliConnect()->close();
    }
    
    function selectReceiptItems(){
        $connection = new SqlConnection();
        $printValue = new PrintValues();
        $mysqli = $connection->mysqliConnect();
        $sql_query = "SELECT * FROM tempcart";
        $result = $mysqli->query($sql_query);
        $printValue->printReceiptItems($result);
        $connection->mysqliConnect()->close();
    }
    
    function GetTotalFromTempCart(){
        $connection = new SqlConnection();
        $printTotalPrice = new PrintValues();
        $mysqli = $connection->mysqliConnect();
        $sql_query = "Select sum(Price) as totalprice from (Select itemName, itemQtty * itemPrice as Price from inventorydb.tempcart)a";
        if($result = $mysqli->query($sql_query)){
            $row = mysqli_fetch_assoc($result);
            $printTotalPrice->printTotal($row['totalprice']);
        }else{
                    echo "There is a problem in the table ".$mysqli->errno;
        }
        
        $connection->mysqliConnect()->close();
    }
    
    function updateItemFromInventory(){
        $connection = new SqlConnection();
        $mysqli = $connection->mysqliConnect();
        $query = "UPDATE inventorydb.Item  a inner join  inventorydb.tempcart b on a.itemName = b.itemName and a.itemBrand = b.itemBrand set a.itemQtty = a.itemQtty - b.itemQtty where b.itemName is not null";
        if($mysqli->query($query)){
            echo "Success, inventory updated!";
        }else{
            echo "There is a problem updating the inventory, ".$mysqli->errno;;
        }
        $mysqli->close();
    }
    
    function dropTempCart(){
        $connection = new SqlConnection();
        $mysqli = $connection->mysqliConnect();
        $query = "DELETE FROM TABLE inventorydb.tempcart";
        if($mysqli->query($query)){
            echo "Success, shopping cart empty!";
        }else{
            echo "There is a problem deleting the cart!, ".$mysqli->errno;;
        }
        $mysqli->close();
    }
}

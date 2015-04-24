<?php include 'SqlConnection.php';

class SqlQuery{
    
    function searchFromItemTable($itemName){
        $mysqli=new SqlConnection();
        include 'PrintValues.php';
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
                echo 'UPDATE';
                $queryUpdate = "UPDATE `tempCart` SET itemQtty=$qtty WHERE itemName='$itemName'";
                $mysqli->query($queryUpdate);
         } else { $queryInsert = "INSERT INTO `tempCart` (`itemName`, `itemBrand`, `itemPrice`, `itemQtty`, `itemImageLocation`) VALUES ('$itemName', '$brand', '$price', '$qtty', '$img')";
                    $mysqli->query($queryInsert);
                     echo 'INSERT';
         }
        $mysqli->close();
    }
    
    function selectFromTempCartToPrint($itemName){
        $connection = new SqlConnection();
        $mysqli = $connection->mysqliConnect();
        include 'PrintValues.php';
        $printAddedItem = new PrintValues();
        $query = "SELECT * FROM tempcart WHERE itemName='$itemName'";
        $result = $mysqli->query($query);
        $row = mysqli_fetch_assoc($result);
        $printAddedItem->printItemAddedToCart($row['itemImageLocation'], $row['itemName'], $row['itemBrand'], $row['itemPrice'], $row['itemQtty']);
    }
    
    function selectAllFromTempCart(){
        $connection = new SqlConnection();
        include 'PrintValues.php';
        $printValue = new PrintValues();
        $mysqli = $connection->mysqliConnect();
        $sql_query = "SELECT * FROM tempcart";
        $result = $mysqli->query($sql_query);
        $printValue->printAllFromCart($result);
        $connection->mysqliConnect()->close();
    }
    
}

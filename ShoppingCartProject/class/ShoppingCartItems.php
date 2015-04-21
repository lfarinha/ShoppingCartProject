<?php

class ShoppingCartItems {
    
    private $nRows;
    
    function createCartTable(){
        
        //creates a new table to shopping cart
        $connection = new SqlConnection();
		
		$sql_query = "CREATE TABLE IF NOT EXISTS `tempcart` (
                              `itemName` varchar(100) NOT NULL,
                              `itemBrand` varchar(100) NOT NULL,
                              `itemPrice` int(100) NOT NULL,
                              `itemQtty` int(100) NOT NULL
                               ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

                if ($connection->mysqliConnect()->query($sql_query) === TRUE) {
                    echo "Table tempCart created successfully";
                } else {
                    echo "Error creating table: " . $connection->mysqliConnect()->error;
                }         
    }
    
    function addItemsToTable($name, $brand, $price, $qtty){
        
        $connection = new SqlConnection();
        
        $sql_query_select = "SELECT * FROM tempCart WHERE itemName='$name'";
        
        $result = $connection->mysqliConnect()->query($sql_query_select);
        $row = mysqli_fetch_assoc($result);
        
        if ($row["itemName"] === $name) {
                        $sql_query = "UPDATE `tempCart` SET itemQtty=$qtty WHERE itemName='$name'";
                        if ($connection->mysqliConnect()->query($sql_query) === TRUE) {
                            echo "<br>Data inserted successfully1";
                        } else {
                            echo "<br>Error inerting in table 1: " . $connection->mysqliConnect()->error;
                        }
                    echo "<br>Item quatities for the item ".$name." have been updated to ".$qtty;
        } else {
                    $sql_query = "INSERT INTO `tempCart` (`itemName`, `itemBrand`, `itemPrice`, `itemQtty`) VALUES ('$name', '$brand', '$price', '$qtty')";
                        if ($connection->mysqliConnect()->query($sql_query) === TRUE) {
                            echo "<br>Data inserted successfully2";
                        } else {
                            echo "<br>Error inerting in table 2: " . $connection->mysqliConnect()->error;
                        }
        }
        }
    
    function deleteItemsFromTable($name){
        $connection = new SqlConnection();
     
        $sql_query = "DELETE FROM `tempCart` WHERE itemName=$name";
        
        if ($connection->mysqliConnect()->query($sql_query) === TRUE) {
                    echo "Item Deleted successfully";
                } else {
                    echo "Error deleting item: " . $connection->error;
                }
    }
    
    function getItemsFromCart(){
        
        $connection = new SqlConnection();
        $nRows = $this->getCartRows();
        
        $sql_query = "SELECT * FROM tempcart";
        
        $result = $connection->mysqliConnect()->query($sql_query);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
         for($i=0; $i<=$nRows; $i++){
             //$row[$i];
            echo ''.$row[$i].' -- '.$i;
            }
    }
    
    function queryTempCart(){
        $connection = new SqlConnection();
        $mysqli = $connection->mysqliConnect();
        $sql_query = "SELECT * FROM tempCart";
        $result = $mysqli->query($sql_query);
        $nRows = mysqli_num_rows($result);
        $this->setCartRows($nRows);
    }
    
    function setCartRows($nRows){
        $this->nRows=$nRows;
    }
    
    function getCartRows(){
        return $this->nRows;
    }
       
    }//EOF


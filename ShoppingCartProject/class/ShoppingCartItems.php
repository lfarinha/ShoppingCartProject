<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ShoppingCartItems
 *
 * @author Leonardo
 */
class ShoppingCartItems {
    
    function createCartTable(){
        
        //creates a new table to shopping cart
        $connection = new SqlConnection();
		
		$sql_query = "CREATE TABLE IF NOT EXISTS `tempCart` (
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
        
        $sql_query_select = "SELECT * FROM tempCart WHERE itemName=$name";
        
        if ($connection->mysqliConnect()->query($sql_query_select) === TRUE) {
                        $sql_query = "INSERT INTO `tempCart` (`itemQtty`) VALUES ('$qtty') WHERE itemName=$name";
                        if ($connection->mysqliConnect()->query($sql_query) === TRUE) {
                            echo "Data inserted successfully";
                        } else {
                            echo "Error inerting in table: " . $connection->mysqliConnect()->error;
                        }
                    echo "Item quatities for the item ".$name." have been updated to ".$qtty;
        } else {
                    $sql_query = "INSERT INTO `tempCart` (`itemName`, `itemBrand`, `itemPrice`, `itemQtty`) VALUES ('$name', '$brand', '$price', '$qtty')";
                        if ($connection->mysqliConnect()->query($sql_query) === TRUE) {
                            echo "Data inserted successfully";
                        } else {
                            echo "Error inerting in table: " . $connection->mysqliConnect()->error;
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
    
    function getAllItemsFromTable(){
        
        $connection = new SqlConnection();
        $numberOfRows = $connection->getNumberOfRows();
        
        for($id=1; $id<=$numberOfRows; $id++){
            echo 'id '.$id.' '.$numberOfRows;
        $sql_query = "SELECT * FROM `tempCart` WHERE cartID=$id";

        if ($result = mysqli_query($connection->mysqliConnect(), $sql_query)) {
                $row = mysqli_fetch_assoc($result);
                echo '$row '.$row[$id];
                }
        }
        
    }
       
    }


<?php

class ShoppingCartItems {
    
    private $itemName="";
    private $itemBrand="";
    private $itemPrice=0;
    private $itemQtty=0;
 
    
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
                $connection->mysqliConnect()->close();
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
         } else {
                $sql_query = "INSERT INTO `tempCart` (`itemName`, `itemBrand`, `itemPrice`, `itemQtty`) VALUES ('$name', '$brand', '$price', '$qtty')";
                        if ($connection->mysqliConnect()->query($sql_query) === TRUE) {
                            echo "<br>Data inserted successfully2";
                        } else {
                            echo "<br>Error inerting in table 2: " . $connection->mysqliConnect()->error;
         }
        }
        $connection->mysqliConnect()->close();
        }
    
    function deleteItemsFromTable($name){ //NOT DONE YET
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
        $mysqli = $connection->mysqliConnect();

        $sql_query = "SELECT * FROM tempcart";
        $result = $mysqli->query($sql_query);
        
        
        $rows = mysqli_num_rows($result);
        $cols = mysqli_num_fields($result);
        
        $count=0;
        while ($row= mysqli_fetch_assoc($result)){
           $item=array();
           $item[$count]=$row;
           //echo var_dump($item);
           $count++;
        }             
            $connection->mysqliConnect()->close();
            return $item;
    }
    
    function queryTempCart(){
        $connection = new SqlConnection();
        $mysqli = $connection->mysqliConnect();
        $sql_query = "SELECT * FROM tempCart";
        $result = $mysqli->query($sql_query);
        $nRows = mysqli_num_rows($result);
        $this->setCartRows($nRows);
        $mysqli->mysqliConnect()->close();
    }
    
//    function setCartEntry($name, $brand, $price, $qtty){
//        $this->arrayOfItems['name']=$name;
//        $this->arrayOfItems['brand']=$brand;
//        $this->arrayOfItems['price']=$price;
//        $this->arrayOfItems['qtty']=$qtty;
//    }
//    
//    function getNameCartEntry(){
//        return $this->arrayOfItems['name'];
//    }
//    function getBrandCartEntry(){
//        return $this->arrayOfItems['brand'];
//    }
//    function getPriceCartEntry(){
//        return $this->arrayOfItems['price'];
//    }
//    function getQttyCartEntry(){
//        return $this->arrayOfItems['qtty'];
//    }

    
    
    }//EOF


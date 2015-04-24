<?php

class ShoppingCartItems {
    
        private $arrayName=array();
        private $arrayBrand=array();
        private $arrayPrice=array();
        private $arrayQtty=array();
        private $arrayImgLocation=array();
    
    
    function createCartTable(){
        
        //creates a new table to shopping cart
        $connection = new SqlConnection();
		
		$sql_query = "CREATE TABLE IF NOT EXISTS `tempcart` (
                              `itemName` varchar(100) NOT NULL,
                              `itemBrand` varchar(100) NOT NULL,
                              `itemPrice` int(100) NOT NULL,
                              `itemQtty` int(100) NOT NULL,
                              `itemImgLocation` varchar(100) NOT NULL
                               ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

                if ($connection->mysqliConnect()->query($sql_query) === TRUE) {
                    echo "Table tempCart created successfully";
                } else {
                    echo "Error creating CARTTEMP table: ".$connection->mysqliConnect()->error;
                }
                $connection->mysqliConnect()->close();
    }
    
    function addItemsToTable($name, $brand, $price, $qtty, $img){
        
        $connection = new SqlConnection();
        $mysqli = $connection->mysqliConnect();
        
        $sql_query_select = "SELECT * FROM tempCart WHERE itemName='$name'";
        
        $result = $mysqli->query($sql_query_select);
        $row = mysqli_fetch_assoc($result);

        if ($row["itemName"] === $name) {
                $sql_query = "UPDATE `tempCart` SET itemQtty=$qtty WHERE itemName='$name'";
                        if ($connection->mysqliConnect()->query($sql_query) === TRUE) {
                            echo "<br>Data inserted successfully1";
                        } else {
                            echo "<br>Error inerting in table 1: " . $connection->mysqliConnect()->error;
                        }
         } else {
                $sql_query = "INSERT INTO `tempCart` (`itemName`, `itemBrand`, `itemPrice`, `itemQtty`, `itemImgLocation`) VALUES ('$name', '$brand', '$price', '$qtty', '$img')";
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
  
        $this->setArray($result);
        $connection->mysqliConnect()->close();
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
    
    
    function setArray($result){
        $c=0;
        while ($row = mysqli_fetch_array($result)){
            $this->arrayName[$c]=$row[0]; $this->arrayBrand[$c]=$row[1]; $this->arrayPrice[$c]=$row[2]; $this->arrayQtty[$c]=$row[3]; $this->arrayImgLocation[$c]=$row[4];
            echo'<table id="t01">
            <tr>
                <th></th>
                <th><p align="center">Name</p></th>
                <th><p align="center">Brand</p></th>
                <th><p align="center">Price</p></th>
                <th><p align="center">Quantity</p></th>
            <tr>
            <tr>
                <td><img src="'.$this->arrayImgLocation[$c]=$row[4].'" alt="'.$this->arrayName[$c].'" width="350" height="250"></td> 
                <td><p align="center">'.$this->arrayName[$c].'</p></td>
                <td><p align="center">'.$this->arrayBrand[$c].'</p></td>
                <td><p align="center">'.$this->arrayPrice[$c].'</p></td>
                <td><p align="center">'.$this->arrayQtty[$c].'</p></label></td>
            <tr>
            </table>';
        $c++;}
    }
        
    }//EOF


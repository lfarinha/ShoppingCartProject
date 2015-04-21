<?php

class SqlConnection{
    
        private $numOfRows=0;
    
	function mysqliConnect(){
             
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "inventorydb";
            
            // Create connection
            $mysqli = new mysqli($servername, $username, $password, $dbname);
            
            // Check connection
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }
            
            if($result = $mysqli->query("SELECT * FROM item")){
                $row = mysqli_fetch_assoc($result);
                $this->setNumberOfRows(mysqli_num_rows($result));
                //echo $row['itemId'].' '.$row['itemName'].' '.$row['itemBrand'].' '.$row['itemPrice'].' '.$row['itemQtty'].' '.$row['itemImageLocation'].' number of rows: '.$this->getNumberOfRows();
            }
            return $mysqli;
	}
       
        function setNumberOfRows($nRows){
            $this->numOfRows=$nRows;
        }
        
        function getNumberOfRows(){
            return $this->numOfRows;
        }
}

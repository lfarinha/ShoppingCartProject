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
            return $mysqli;
	}
       
        function setNumberOfRows($nRows){
            $this->numOfRows=$nRows;
        }
        
        function getNumberOfRows(){
            return $this->numOfRows;
        }
}

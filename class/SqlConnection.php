<?php

class SqlConnection{

        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "inventorydb";
    
        function SqlConnection(){
            
        }
        
	function mysqliConnect(){
             
            // Create connection
            $connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            
            // Check connection
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }
            return $connection;
	}
       
}

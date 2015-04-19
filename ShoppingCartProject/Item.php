<?php include 'SqlConnection.php';
class Item {
    
 	private $itemName="";
 	private $itemBrand="";
 	private $itemPrice="";
 	private $itemQtty="";
        private $itemLocation="";

	function __construct(){
		
	}
	
	function setItemName($ItemName, $itemBrand, $itemPrice, $itemQtty, $itemLocation){
		$this->itemName=$ItemName;
                $this->itemBrand=$itemBrand;
                $this->itemPrice=$itemPrice;
                $this->itemQtty=$itemQtty;
                $this->itemLocation=$itemLocation; 
        }
	
	function getItemName(){
            return $this->itemName;
	}
        
        function getItemBrand(){
            return $this->itemBrand;
        }
        
        function getItemPrice(){
            return $this->itemPrice;
        }
        
        function getItemQtty(){
            return $this->itemQtty;
        }
        
        function getItemLocation(){
            return $this->itemLocation;
        }
		
	function searchItemByName($itemName){
		
		$connection = new SqlConnection();
		
		$sql_query = "SELECT * FROM item WHERE itemName='$itemName'";
		
		if ($result = mysqli_query($connection->mysqliConnect(), $sql_query)) {
			$row = mysqli_fetch_assoc($result);
			//echo 'value = ' . $row['itemName'];
			$this->setItemName($row['itemName'], $row['itemBrand'], $row['itemPrice'], $row['itemQtty'], $row['itemImageLocation']);
                        
                        //echo $row['itemName'].' '.$row['itemBrand'].' '.$row['itemPrice'].' '.$row['itemQtty'].' '.$row['itemImageLocation'];
                        
		}
	}

}
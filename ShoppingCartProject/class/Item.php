<?php include 'SqlConnection.php';
class Item {
    
        private $itemId=0;
        private $itemName="";
 	private $itemBrand="";
 	private $itemPrice="";
 	private $itemQtty="";
        private $itemLocation="";

	function setItemName($id, $name, $brand, $price, $qtty, $location){
            $this->itemId=$id;
            $this->itemName=$name;
            $this->itemBrand=$brand;
            $this->itemPrice=$price;
            $this->itemQtty=$qtty;
            $this->itemLocation=$location;
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
		
		$mysqli = new SqlConnection();
                
		$sql_query = "SELECT * FROM item WHERE itemName='$itemName'";
		
		if ($result = mysqli_query($mysqli->mysqliConnect(), $sql_query)) {
			$row = mysqli_fetch_assoc($result);
			//echo 'value = ' . $row['itemName'];
			$this->setItemName($row['itemId'], $row['itemName'], $row['itemBrand'], $row['itemPrice'], $row['itemQtty'], $row['itemImageLocation']);
                        
                        //echo $row['itemName'].' '.$row['itemBrand'].' '.$row['itemPrice'].' '.$row['itemQtty'].' '.$row['itemImageLocation'];
                        
		}
                $mysqli->mysqliConnect()->close();
	}

}
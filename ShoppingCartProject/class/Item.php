<?php include 'SqlQuery.php'; include 'PrintValues.php';
class Item {
    
        private $itemName="";
 	private $itemBrand="";
 	private $itemPrice="";
 	private $itemQtty="";
        private $itemLocation="";

        function __construct($name, $brand, $price, $qtty, $location) {
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
		
	function searchItemByName($itemName){//move to another class          
		
	}
        
}
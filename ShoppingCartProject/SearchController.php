<?php include 'Item.php';
class SearchController{
	
 	private $itemName="";
 	private $itemBrand="";
 	private $itemPrice="";
 	private $itemQtty="";
        private $itemLocation="";
        
        function __construct() {
            
        }
	
	function searchParams($params){

		$searchItem = new Item();
		$searchItem->searchItemByName($params);
		
		$this->itemName=$searchItem->getItemName();
                $this->itemBrand=$searchItem->getItemBrand();
                $this->itemPrice=$searchItem->getItemPrice();
                $this->itemQtty=$searchItem->getItemQtty();
                $this->itemLocation=$searchItem->getItemLocation();
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
}
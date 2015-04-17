<?php include 'Item.php';
class Controller{
	
	private $itemName="";
	private $itemLocation="";
	
	function searchParams($params){

		$searchItem = new Item();
		$searchItem->searchItemByName($params);
		
		$this->itemName=$searchItem->getItemName();
		
		echo "$this->itemName";
		
		
		
	}	
}
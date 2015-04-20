<?php include 'Item.php';
class SearchController{
	
 	private $itemName="";
 	private $itemBrand="";
 	private $itemPrice="";
 	private $itemQtty="";
        
        function __construct() {
            
        }
	
	function actionPerformed($params){

		$searchItem = new Item();
		$searchItem->searchItemByName($params);	
              
                $this->itemName = $searchItem->getItemName();
                $this->itemBrand = $searchItem->getItemBrand();
                $this->itemPrice = $searchItem->getItemPrice();
                $this->itemQtty = $searchItem->getItemQtty();
                
                $this->printItemInfo($this->itemName, $this->itemBrand, $this->itemPrice, $this->itemQtty);
        }

        
        function printItemInfo($name, $brand, $price, $qtty){
           
             echo'
            <script type="text/javascript">
                function submitform(){
                    document.myform.submit();
                }
            </script>                 

            <div id="searchBox">
            <form action="ItemView.php" method="get">
            <table id="t01">
            <tr>
                <th><a>Name</a></th>
                <th><a>Brand</a></th>
                <th><a>Price</a></th>
                <th><a>Qtty in Stock</a></th>
            <tr>
            <tr>
                <td><input type="submit" name="itemName" value="'.$name.'"></td>
                <td>'.$brand.'</td>
                <td>'.$price.'</td>
                <td>'.$qtty.'</td>
            <tr>
            </table>
            </form>
            </div>';
            
        }
}
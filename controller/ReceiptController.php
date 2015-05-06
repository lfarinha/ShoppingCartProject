<?php include '..\class\SqlQuery.php';

class ReceiptController {
    
    function displayItemsFromCartHandler(){
            $queryItem = new SqlQuery();
            $queryItem->selectReceiptItems();
    }
    
    function uptdateInventorytHandler(){
            $queryItem = new SqlQuery();
            $queryItem->updateItemFromInventory();
            $queryItem->dropTempCart();
    }
}

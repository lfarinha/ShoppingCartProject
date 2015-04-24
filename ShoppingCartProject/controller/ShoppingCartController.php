<?php include'..\class\Item.php'; include '..\class\ShoppingCartItems.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ManageShoppingCartController
 *
 * @author Leonardo
 */
class ShoppingCartController {
        
    function addToCartHandler($itemName, $qtty) {
           $queryItem = new SqlQuery();
           $queryItem->createTableTempCart();
           $queryItem->selectFromTempCartTable($itemName, $qtty);
           $queryItem->selectFromTempCartToPrint($itemName);
    }

    function displayItemsFromCartHandler(){
            $queryItem = new SqlQuery();
            $queryItem->selectAllFromTempCart();
    }
}

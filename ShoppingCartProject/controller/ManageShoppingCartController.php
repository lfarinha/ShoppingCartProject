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
class ManageShoppingCartController {
    

    
    function getItemsHandler($params, $qtty) {
            $infoToShow = new Item();
            $infoToShow->searchItemByName($params);

            $this->addToCart($infoToShow->getItemName(), $infoToShow->getItemBrand(), $infoToShow->getItemPrice(), $qtty);
            $this->printItemInShoppingCart($infoToShow->getItemLocation(), $infoToShow->getItemName(), $infoToShow->getItemBrand(), $infoToShow->getItemPrice(), $qtty);
    }
    
    function printItemInShoppingCart($imageLocation, $name, $brand, $price, $qtty){
        echo' 
            <table id="t01">
            <tr>
                <th></th>
                <th><p align="center">Name</p></th>
                <th><p align="center">Brand</p></th>
                <th><p align="center">Price</p></th>
                <th><p align="center">Quantity</p></th>
            <tr>
            <tr>
                <td><img src="'.$imageLocation.'" alt="'.$name.'" width="350" height="250"></td> 
                <td><p align="center">'.$name.'</p></td>
                <td><p align="center">'.$brand.'</p></td>
                <td><p align="center">'.$price.'</p></td>
                <td><p align="center">'.$qtty.'</p></label></td>
            <tr>
            </table>
            ';
    }
    
        function printAllItemInShoppingCart(){
            
            $getAllItems = new ShoppingCartItems();
            $getAllItems->getItemsFromCart();
 
    }
    
    function addToCart($name, $brand, $price, $qtty){
        $tempCart = new ShoppingCartItems();
        $tempCart->createCartTable();
        $tempCart->addItemsToTable($name, $brand, $price, $qtty);
    }
    
    function updateCartQtty(){
        
    }
    
    function removeFromCart(){
        
    }
}

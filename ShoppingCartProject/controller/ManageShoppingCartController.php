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
    

    
    function addToCartReviewHandler($params, $qtty) {
            $infoToShow = new Item();
            $infoToShow->searchItemByName($params);

            $this->addToCartHandler($infoToShow->getItemName(), $infoToShow->getItemBrand(), $infoToShow->getItemPrice(), $qtty);
            $this->printItemAddedToCart($infoToShow->getItemLocation(), $infoToShow->getItemName(), $infoToShow->getItemBrand(), $infoToShow->getItemPrice(), $qtty);
    }
    
    function addToCartHandler($name, $brand, $price, $qtty){
        $tempCart = new ShoppingCartItems();
        $tempCart->createCartTable();
        $tempCart->addItemsToTable($name, $brand, $price, $qtty);
    }
    
    function displayItemsFromCartHandler(){
        return $this->printItemsFromCart();
    }
    
    function printItemsFromCart(){
            $displayItems = new ShoppingCartItems();
            $displayItems->getItemsFromCart();

            

//            echo' 
//            <table id="t01">
//            <tr>
//                <th></th>
//                <th><p align="center">Name</p></th>
//                <th><p align="center">Brand</p></th>
//                <th><p align="center">Price</p></th>
//                <th><p align="center">Quantity</p></th>
//            <tr>
//            <tr>
//                <td><img src="" alt="'.$displayItems->getNameCartEntry().'" width="350" height="250"></td> 
//                <td><p align="center">'.$displayItems->getNameCartEntry().'</p></td>
//                <td><p align="center">'.$displayItems->getBrandCartEntry().'</p></td>
//                <td><p align="center">'.$displayItems->getPriceCartEntry().'</p></td>
//                <td><p align="center">'.$displayItems->getQttyCartEntry().'</p></label></td>
//            <tr>
//            </table>
//            ';
 
    }
    
    function printItemAddedToCart($imageLocation, $name, $brand, $price, $qtty){
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
    
    

    
    function updateCartQtty(){
        
    }
    
    function removeFromCart(){
        
    }
}

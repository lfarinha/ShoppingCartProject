<?php include 'class/Item.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class ItemViewController{
    
     	private $itemName="";
 	private $itemBrand="";
 	private $itemPrice="";
 	private $itemQtty="";
        private $itemIamgeLocation="";
    
    function __contruct(){
                  
    }
    
    function actionPerformed($params){
        
            $infoToShow = new Item();
            $infoToShow->searchItemByName($params);
            
            $this->itemName = $infoToShow->getItemName();
            $this->itemBrand = $infoToShow->getItemBrand();
            $this->itemPrice = $infoToShow->getItemPrice();
            $this->itemQtty = $infoToShow->getItemQtty();
            $this->itemIamgeLocation = $infoToShow->getItemLocation();
            $this->printItemInfo($this->itemIamgeLocation, $this->itemName, $this->itemBrand, $this->itemPrice, $this->itemQtty);
    }
    
    function printItemInfo($imageLocation, $name, $brand, $price, $qtty){            
           echo'
            <form action="ItemView.php" method="get">
            <table id="t01">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Qtty in Stock</th>
            <tr>
            <tr>
                <td><img src="'.$imageLocation.'" alt="'.$name.'" width="350" height="250"></td> 
                <td>'.$name.'</td>
                <td>'.$brand.'</td>
                <td>'.$price.'</td>
                <td>'.$qtty.'</td>
            <tr>
            </table>
            </form>
            ';
        }
    
}


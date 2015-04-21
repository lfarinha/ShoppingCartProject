<?php include '..\class\Item.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class ItemViewController extends Item {
    

    function actionPerformed($params){
            $infoToShow = new Item();
            $infoToShow->searchItemByName($params);
            $this->printItemInfo($infoToShow->getItemLocation(), $infoToShow->getItemName(), $infoToShow->getItemBrand(), $infoToShow->getItemPrice(), $infoToShow->getItemQtty());
    }
    
    function printItemInfo($imageLocation, $name, $brand, $price){            
           echo' 
            <table id="t01">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Brand</th>
                <th>Price</th>
                <th></th>
            <tr>
            <tr>
                <td><img src="'.$imageLocation.'" alt="'.$name.'" width="350" height="250"></td> 
                <td>'.$name.'</td>
                <td>'.$brand.'</td>
                <td>'.$price.'</td>
                <td><label>Quatities<input type="text" name="qtty"></label></td>
            <tr>
            </table>
            ';
        }
}//End of Class


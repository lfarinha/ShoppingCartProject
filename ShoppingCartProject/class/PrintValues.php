<?php

class PrintValues {
    //put your code here
    
function printItemInfo($imageLocation, $name, $brand, $price, $qtty){
        echo'<div id="searchBox">
            <form action="ItemView.php" method="get">
            <table id="t01">
            <tr>
                <th></th>
                <th><a>Name</a></th>
                <th><a>Brand</a></th>
                <th><a>Price</a></th>
                <th><a>Qtty in Stock</a></th>
            <tr>
            <tr>
                <td><img src="'.$imageLocation.'" alt="'.$name.'" width="350" height="250"></td>
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

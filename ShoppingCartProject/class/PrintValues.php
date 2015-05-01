<?php

class PrintValues {
    
    function printItemInfo($imageLocation, $name, $brand, $price, $qtty){
        echo'<div id="searchBox">
            <form action="ItemView.php" method="get">
            <table id="t01">
            <tr>
                <th></th>
                <th width="200"><p align="center">Name</p></th>
                <th width="200"><p align="center">Brand</p></th>
                <th width="200"><p align="center">Price</p></th>
                <th width="500"><p align="center">Available Quantities</p></th>
            </tr>
            <tr>
                <td><img src="'.$imageLocation.'" alt="'.$name.'" width="350" height="250"></td>
                <td><input type="submit" name="itemName" value="'.$name.'"></td>
                <td>'.$brand.'</td>
                <td>'.$price.'</td>
                <td>'.$qtty.'</td>
            </tr>
            </table>
            </form>
            </div>';
    }
    
    function printItemInfoQtty($imageLocation, $name, $brand, $price){            
           echo' 
            <table id="t01">
            <tr>
                <th></th>
                <th><p align="center">Name</p></th>
                <th><p align="center">Brand</p></th>
                <th><p align="center">Price</p></th>
                <th><p align="center">Quantity</p></th>
            </tr>
            <tr>
                <td><img src="'.$imageLocation.'" alt="'.$name.'" width="350" height="250"></td> 
                <td>'.$name.'</td>
                <td>'.$brand.'</td>
                <td>'.$price.'</td>
                <td><label>Quatities<input type="text" name="qtty"></label></td>
            </tr>
            </table>
            ';
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
            </tr>
            <tr>
                <td><img src="'.$imageLocation.'" alt="'.$name.'" width="350" height="250"></td> 
                <td><p align="center">'.$name.'</p></td>
                <td><p align="center">'.$brand.'</p></td>
                <td><p align="center">'.$price.'</p></td>
                <td><p align="center">'.$qtty.'</p></label></td>
            </tr>
            </table>
            ';
    }
    
    function printAllFromCart($result){
        $c=0;
        while ($row = mysqli_fetch_array($result)){
            $this->arrayName[$c]=$row[0]; $this->arrayBrand[$c]=$row[1]; $this->arrayPrice[$c]=$row[2]; $this->arrayQtty[$c]=$row[3]; $this->arrayImgLocation[$c]=$row[4];
            //include "DeleteRow.php";
            echo '<script type="text/javascript">
                 $(document).ready(function() {
                    $("#btn'.$c.'").click(function() {
                            var name = $("input#remove'.$c.'").val();
                            var dataString = "itemName="+ name;
                            $.ajax({//2
                                type: "GET",
                                url: "../class/DeleteRow.php",
                                data: {"itemName": name},
                                success: function(data){
                                    console.log("success", data);
                                    $("table.cart'.$c.'").remove();
                                    alert("The Item Removed From Your Cart!");},
                                error: function() {
                                alert("An error occurred.");},});});});
            </script><br><form method="get" name="deleteItem"><table id="t02" class="cart'.$c.'">
            <tr class="cart'.$c.'">
                <th class="cart'.$c.'"></th>
                <th class="cart'.$c.'"><p align="center">Name</p></th>
                <th class="cart'.$c.'"><p align="center">Brand</p></th>
                <th class="cart'.$c.'"><p align="center">Price</p></th>
                <th class="cart'.$c.'"><p align="center">Quantity</p></th>
            </tr>
            <tr class="cart'.$c.'">
                <td class="cart'.$c.'"><img src="'.$this->arrayImgLocation[$c]=$row[4].'" alt="'.$this->arrayName[$c].'" width="350" height="250"></td> 
                <td class="cart'.$c.'"><p align="center"><input type="hidden" name="itemName" id="remove'.$c.'" value="'.$this->arrayName[$c].'">'.$this->arrayName[$c].'</p></td>
                <td class="cart'.$c.'"><p align="center">'.$this->arrayBrand[$c].'</p></td>
                <td class="cart'.$c.'"><p align="center">'.$this->arrayPrice[$c].'</p></td>
                <td class="cart'.$c.'"><p align="center">'.$this->arrayQtty[$c].'</p></label></td>
            </tr>
            <tr class="cart'.$c.'">
                <td colspan="5" class="cart'.$c.'"><button type="button" id="btn'.$c.'">Remove Item</button></td>
            </tr></table></form>';
        $c++;}
    }
    
    function printReceiptItems($result){
        $c=0;
        while ($row = mysqli_fetch_array($result)){
            $this->arrayName[$c]=$row[0]; $this->arrayBrand[$c]=$row[1]; $this->arrayPrice[$c]=$row[2]; $this->arrayQtty[$c]=$row[3]; $this->arrayImgLocation[$c]=$row[4];
            //include "DeleteRow.php";
            echo '<table id="t02" class="cart'.$c.'">
            <tr class="cart'.$c.'">
                <th class="cart'.$c.'"></th>
                <th class="cart'.$c.'"><p align="center">Name</p></th>
                <th class="cart'.$c.'"><p align="center">Brand</p></th>
                <th class="cart'.$c.'"><p align="center">Price</p></th>
                <th class="cart'.$c.'"><p align="center">Quantity</p></th>
            </tr>
            <tr class="cart'.$c.'">
                <td class="cart'.$c.'"><img src="'.$this->arrayImgLocation[$c]=$row[4].'" alt="'.$this->arrayName[$c].'" width="350" height="250"></td> 
                <td class="cart'.$c.'"><p align="center"><input type="hidden" name="itemName" id="remove'.$c.'" value="'.$this->arrayName[$c].'">'.$this->arrayName[$c].'</p></td>
                <td class="cart'.$c.'"><p align="center">'.$this->arrayBrand[$c].'</p></td>
                <td class="cart'.$c.'"><p align="center">'.$this->arrayPrice[$c].'</p></td>
                <td class="cart'.$c.'"><p align="center">'.$this->arrayQtty[$c].'</p></label></td>
            </tr>
            </table><br>';
        $c++;}
    }
    
    function printTotal($totalPrice){
        echo $totalPrice;
    }
    
}



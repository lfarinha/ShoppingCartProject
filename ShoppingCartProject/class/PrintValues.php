<?php

class PrintValues {
    
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
                <th>image</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Price</th>
                <th></th>
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
            echo '<script type="text/javascript">
            $(document).ready(function() {
            $("#btn'.$c.'").click(function() {
            $("table.cart'.$c.'").remove();
            });
            });
            </script><br><table id="t02" class="cart'.$c.'">
            <tr class="cart'.$c.'">
                <th class="cart'.$c.'"></th>
                <th class="cart'.$c.'"><p align="center">Name</p></th>
                <th class="cart'.$c.'"><p align="center">Brand</p></th>
                <th class="cart'.$c.'"><p align="center">Price</p></th>
                <th class="cart'.$c.'"><p align="center">Quantity</p></th>
            </tr>
            <tr class="cart'.$c.'">
                <td class="cart'.$c.'"><img src="'.$this->arrayImgLocation[$c]=$row[4].'" alt="'.$this->arrayName[$c].'" width="350" height="250"></td> 
                <td class="cart'.$c.'"><p align="center">'.$this->arrayName[$c].'</p></td>
                <td class="cart'.$c.'"><p align="center">'.$this->arrayBrand[$c].'</p></td>
                <td class="cart'.$c.'"><p align="center">'.$this->arrayPrice[$c].'</p></td>
                <td class="cart'.$c.'"><p align="center">'.$this->arrayQtty[$c].'</p></label></td>
            </tr>
            <tr class="cart'.$c.'">
                <td colspan="5" class="cart'.$c.'"><button id="btn'.$c.'">Remove Item</button></td>
            </tr></table>';
        $c++;}
    }
    
}

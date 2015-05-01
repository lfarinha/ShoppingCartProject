<?php include '..\class\SqlQuery.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CheckOutController {

    function displayItemsFromCartHandler(){
            $queryItem = new SqlQuery();
            $queryItem->selectAllFromTempCart();
    }
    
        function GetTotalFromCartHandler(){
            $queryItem = new SqlQuery();
            $queryItem->GetTotalFromTempCart();
    }
}

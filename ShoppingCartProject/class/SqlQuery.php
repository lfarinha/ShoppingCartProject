<?php include 'SqlConnection.php';

class SqlQuery{
    //put your code here
    
    function selectFromItemTable($itemName){
        $mysqli=new SqlConnection();
        $printSelectedItem = new PrintValues();
        $query = "SELECT * FROM item WHERE itemName='$itemName'";       
        if ($result = mysqli_query($mysqli->mysqliConnect(), $query)) {
			$row = mysqli_fetch_assoc($result);
			$printSelectedItem->printItemInfo($row['itemImageLocation'], $row['itemName'], $row['itemBrand'], $row['itemPrice'], $row['itemQtty']);
                        //echo $row['itemName'].' '.$row['itemBrand'].' '.$row['itemPrice'].' '.$row['itemQtty'].' '.$row['itemImageLocation'];      
        }
                $mysqli->mysqliConnect()->close();
    }
    
    function selectFromTempCartTable(){
        
    }
}

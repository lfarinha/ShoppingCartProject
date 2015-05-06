<?php include 'SqlConnection.php';
        $connection = new SqlConnection();
        $mysqli=$connection->mysqliConnect();
        
        if($_GET['itemName']){
        $itemName = $_GET['itemName'];
        $query = "DELETE FROM tempcart WHERE itemName='$itemName'";
        if ($result = $mysqli->query($query)){
            echo 'Item '.$itemName.' was succesfully deleted from your cart!';
        }else{
            echo 'your item could not be deleted!'.$mysqli->error;
        }
}

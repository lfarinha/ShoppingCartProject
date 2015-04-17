<?php include 'SqlConnection.php';
class Item {

// 	private $itemId="";
 	private $itemName="";
// 	private $itemBrand="";
// 	private $itemPrice="";
// 	private $itemQtty="";

	function __construct(){
		
	}
	
	function setItemName($ItemName){
		$this->itemName=$ItemName;
	}
	
	function getItemName(){
		return $this->itemName;
	}
		
	function searchItemByName($itemName){
		
// 		$servername = "localhost";
// 		$username = "root";
// 		$password = "";
// 		$dbname = "inventorydb";
		
// 		// Create connection
// 		$conn = new mysqli($servername, $username, $password, $dbname);
		
// 		// Check connection
// 		if ($conn->connect_error) {
// 			die("Connection failed: " . $conn->connect_error);
// 		}
		$connection = new SqlConnection();
		
		$sql_query = "SELECT * FROM item WHERE itemName='$itemName'";
		
		if ($result = mysqli_query($connection->mysqliConnect(), $sql_query)) {
			$row = mysqli_fetch_assoc($result);
			//echo 'value = ' . $row['itemName'];
			$this->setItemName($row['itemName']);
		}
	}
	

}
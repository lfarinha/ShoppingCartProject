<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Search Result</title>
</head>
<body>
	<?php include 'Controller.php';
			
		$params = $_POST["searchCriteria"];
		
		$search = new Controller();
		$search->searchParams($params);
		
// 		echo "Item Name: $search";
		
	?>
	 <br>
</body>
</html>

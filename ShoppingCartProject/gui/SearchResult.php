<?php include '..\controller\SearchController.php';?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../style/style.css">
<title>Search Result</title>
</head>
<body>
    
        <div id="header">
        <h1>Welcome!</h1>
        </div>
    
            
        <div id="nav">
        </div>
    

        <div id="section">
	<?php
        $params = $_GET['searchCriteria'];
        $searchItem = new SearchController();
	$searchItem->actionPerformed($params);      
	?>
        </div>

        <div id="footer">
        Copyright © 2015, Leonardo Farinha, Robert Krall
        </div>
</body>
</html>

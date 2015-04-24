<?php include '..\class\Item.php';

class SearchController{      
        
	function actionPerformed($params){
		$queryItem = new SqlQuery();
                $queryItem->selectFromItemTable($params);
        }
        
}
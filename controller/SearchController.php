<?php include '..\class\SqlQuery.php';

class SearchController{      
        
	function actionPerformed($params){
		$queryItem = new SqlQuery();
                $queryItem->searchFromItemTable($params);
        }
        
}
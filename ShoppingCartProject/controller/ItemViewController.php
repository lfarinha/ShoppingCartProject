<?php include_once '..\class\SqlQuery.php';


Class ItemViewController{
    
    function actionPerformed($params){
           $queryItem = new SqlQuery();
           $queryItem->selectFromItemTable($params);    
    }
    

}//End of Class


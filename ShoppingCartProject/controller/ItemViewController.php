<?php include '..\class\Item.php';


Class ItemViewController{
    
    function actionPerformed($params){
           $queryItem = new SqlQuery();
           $queryItem->selectFromItemTable($params);    
    }
    

}//End of Class


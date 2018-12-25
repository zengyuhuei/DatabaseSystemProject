<?php
    include_once "connect_sql.php";
    if( array_key_exists("table_type",$_GET) && array_key_exists("id",$_GET) ){
        $table_type = $_GET["table_type"];
        $id = $_GET["id"];
       

        //echo "table : ".$table_type." / id :".$id." / value :".$value;
        $query = ("DELETE FROM ".$table_type." WHERE id=".$id);
        echo $query;
        $stmt = $db->prepare($query);
		$stmt->execute();

        

    }
    else {
        echo "參數錯誤";
    }
    

?>
<?php
    include_once "connect_sql.php";
    if( array_key_exists("table_type",$_GET) && array_key_exists("id",$_GET) && array_key_exists("value",$_GET) ){
        $table_type = $_GET["table_type"];
        $id = $_GET["id"];
        $value = $_GET["value"];

        //echo "table : ".$table_type." / id :".$id." / value :".$value;
        $query = ("UPDATE ".$table_type." SET name='".$value."' WHERE id=".$id);
        echo $query;
        $stmt = $db->prepare($query);
		$stmt->execute();

        

    }
    else {
        echo "參數錯誤";
    }
    

?>
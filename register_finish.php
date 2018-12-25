<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("connect_sql.php");

$id = $_POST['id'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];


//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($id != null && $pw != null && $pw2 != null && $pw == $pw2)
{
        //新增資料進資料庫語法
        $query = "insert into account (username, password) values ('".$id."', '".$pw."')";
        
        try
        {
            $stmt = $db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();
            echo '新增成功!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
        }
        catch(Exception $e)
        {
            
            echo '新增失敗!';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
        }
        
        
}
else
{
        echo '輸入資料錯誤';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>
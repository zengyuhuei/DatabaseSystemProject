<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
include("connect_sql.php");
$id = $_POST['id'];
$pw = $_POST['pw'];

//搜尋資料庫資料
$query = "SELECT password FROM account where username = '$id'";
$stmt = $db->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();

//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
if($id != null && $pw != null && $result != null)
{
    if($result[0]['password'] == $pw)
    {
            //將帳號寫入session，方便驗證使用者身份
            $_SESSION['username'] = $id;
            echo '登入成功!';
            echo '<meta http-equiv=REFRESH CONTENT=1;url="life.php">';
    }
    else
    {
            echo '登入失敗!';
            echo '<meta http-equiv=REFRESH CONTENT=1;url="index.html">';
    }
}
else
{
    echo '登入失敗!';
    echo '<meta http-equiv=REFRESH CONTENT=1;url="index.html">';
}

?>
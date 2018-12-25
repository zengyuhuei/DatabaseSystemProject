<?php
		$user = 'tseng';//資料庫使用者名稱
		$password = '10081009';//資料庫的密碼
		try
		{     
			$db = new PDO('mysql:host=localhost;dbname=project;charset=utf8',$user,$password);//之後若要結束與資料庫的連線，則使用「$db = null;」
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		}
		catch(PDOException $e)
		{		
			die();
		}
?>
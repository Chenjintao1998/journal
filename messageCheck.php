<?php 
		session_start();
		header("content-type:text/html;charset=utf-8"); 
		$username=$_SESSION['username'];
		$checkbox=$_POST["checkbox"];
		$host = "localhost"; 
		$username1 = "root"; 
		$password1 = "root"; 
		$dbName="journal";
		$dsn="mysql:host=$host;dbname=$dbName";
		$conn = new PDO($dsn, $username1, $password1,array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
		for($i=0;$i<sizeof($checkbox);$i++)
			{
				$conn->exec("delete from  message where id='".$checkbox[$i]."';");
			}
			
		echo "<script>alert('删除成功！');window.location.href='message.php';</script>";
		$conn = null;
?>
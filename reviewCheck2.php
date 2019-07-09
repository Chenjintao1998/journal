<?php
	date_default_timezone_set("PRC");
	session_start();
	error_reporting( E_ALL&~E_NOTICE );
	header("content-type:text/html;charset=utf-8"); 
	$manuscriptid=$_SESSION['manuscriptid'];
	$username=$_SESSION['username'];
	$num=0;
	$gender=$_POST["gender"];
	$spr=$_SESSION['spr'];
	$txzz=$_SESSION['txzz'];
	$host = "localhost"; 
	$username1 = "root"; 
	$password1 = "root"; 
	$dbName="journal";
	$dsn="mysql:host=$host;dbname=$dbName";
	$conn = new PDO($dsn, $username1, $password1,array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
	$sql='SELECT * FROM manuscript';	
	$stmt=$conn->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
	$stmt->execute();
 	while ($row =$stmt->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
		if($manuscriptid==$row[1])
		{		
			if($row[10]!="")
			{
				if($row[11]!="")
				{
					if($row[12]!="")
					{
						echo "<script>alert('稿子已经有三名审稿人审批！');window.location.href='review.php';</script>";
						}
					}
				}
				if($spr==0){
					$conn->exec("update manuscript set one='".$username.",".$gender."'    where manuscriptid = '".$manuscriptid."'"); 
				}
				else if($spr==1){
					$conn->exec("update manuscript set two='".$username.",".$gender."'    where manuscriptid = '".$manuscriptid."'"); 
				}
				else if($spr==2){
					$conn->exec("update manuscript set three='".$username.",".$gender."'    where manuscriptid = '".$manuscriptid."'"); 	
					$psxx=explode(",",$row[10]);				
					if($psxx[1]=="推荐")
						$num++;
					$psxx=explode(",",$row[11]);
					if($psxx[1]=="推荐")
						$num++;
					if($gender=="推荐")
						$num++;
					if($num>=2)
					{
						$time=date('Y-m-d H:i:s');
						$sql="insert INTO message (id,acceptid,content,time) values ('".$manuscriptid."','".$txzz."','恭喜您的稿子".$row[0]."已经被录用!','".$time."')";
						$conn->exec($sql);
						$conn->exec("update manuscript set state='录用'    where manuscriptid = '".$manuscriptid."'");
					}
					else
					{
						$time=date('Y-m-d H:i:s');
						$sql="insert INTO message (id,acceptid,content,time) values ('".$manuscriptid."','".$txzz."','抱歉您的稿子".$row[0]."尚未被录用!','".$time."')";
						$conn->exec($sql);
						$conn->exec("update manuscript set state='未录用'    where manuscriptid = '".$manuscriptid."'");
					}
				}
				else
					echo "<script>alert('稿子已经有三名审稿人审批！');window.location.href='review.php';</script>";
		}
	 }
	 echo "<script>alert('审批完成！');window.location.href='index.php';</script>";
	 $conn = null;
	 ?>
<?php 
header("content-type:text/html;charset=utf-8"); 
error_reporting(E_ALL & ~E_NOTICE);
session_start();

$host = "localhost"; 
$username1 = "root"; 
$password1 = "root"; 
$dbName="journal";
$username=$_POST["username"];
$password=$_POST["password"];
$_SESSION['test']=$username;//直接把用户名赋予test
if($_POST['jizhu']){
        setcookie("username",$username,time()+60*24);
        setcookie("password",$password,time()+60*24);
        
    }
    else{
        setcookie("username","",time()+60*24);
        setcookie("password","",time()+60*24);
        
    }

$authcode=$_POST["authcode"];
if(!(strtolower($authcode) == strtolower($_SESSION['authcode']))){
     	echo "<script>alert('验证码错误！');window.location.href='login.php';</script>";
    }
	
try { 
    $conn = new PDO("mysql:host=$host", $username1, $password1); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
	$sql = "
		CREATE DATABASE journal;
		use journal;
		CREATE TABLE author (
			username char(20) not null comment'用户名',
			password char(20) not null comment'密码',
			id char(20) not null comment'编号',
			name char(20) not null comment'姓名',
			education char(20) not null comment'学历',
			title char(20) not null comment'职称',
			unit char(20) not null comment'单位',
			phone char(20) not null comment'联系电话',
			email char(20) not null comment'邮箱',
			direction char(20) not null comment'研究方向',
			primary key(id)
		);
		CREATE TABLE reviewers (
			username char(20) not null comment'用户名',
			password char(20) not null comment'密码',
			id char(20) not null comment'编号',
			name char(20) not null comment'姓名',
			education char(20) not null comment'学历',
			title char(20) not null comment'职称',
			unit char(20) not null comment'单位',
			phone char(20) not null comment'联系电话',
			email char(20) not null comment'邮箱',
			direction char(20) not null comment'研究方向',
			social char(20) not null comment'社会职务',
			card  char(20) not null comment'银行卡号',
			primary key(id)
		);
		CREATE TABLE manuscript(
			manuscriptname char(20) not null comment'稿件名称',
			manuscriptid char(20) not null comment'稿件编号',
			authorid char(20) not null comment'作者编号',
			sorting char(20) not null comment'作者排序',
			communication char(20) not null comment'通讯作者',
			classification char(20) not null comment'专业分类号',
			keywords char(50) not null comment'关键词',
			chinese char(50) not null comment'中文摘要',
			english char(50) not null comment'英文摘要',
			funded char(50) not null comment'资助项目',
			one char(20) not null comment'第一审稿人',
			two char(20) not null comment'第二审稿人',
			three char(20) not null comment'第三审稿人',
			state char(10) not null comment'状态',
			primary key(manuscriptid)
		);
		CREATE TABLE message(
			id char(50) not null comment'id',
			acceptid char(20) not null comment'接收方id',
			content char(100) not null comment'消息内容',
			time char(100) not null comment'时间',
			primary key(id)
		);
		";
	$conn->exec($sql);
} 
catch(PDOException $e) 
{ 
} 
$flag=-1;
$conn = null; 
$dsn="mysql:host=$host;dbname=$dbName";
try{
	
	$conn = new PDO($dsn, $username1, $password1,array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
	$sql='SELECT * FROM author';	
	$stmt=$conn->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
	$stmt->execute();
 	while ($row =$stmt->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
		if($username==$row[0])
		{
			$flag=1;
			$id=$row[2];
			$name=$row[3];
			$education=$row[4];
			$title=$row[5];
			$unit=$row[6];
			$phone=$row[7];
			$email=$row[8];
			$direction=$row[9];
			$identity="作者";
			if($password!=$row[1])
				echo "<script>alert('账号或密码错误！');window.location.href='login.php';</script>";
			else
			{	
				$_SESSION['username']=$username;
				$_SESSION['id']=$id;
				$_SESSION['name']=$name;
				$_SESSION['education']=$education;
				$_SESSION['title']=$title;
				$_SESSION['unit']=$unit;
				$_SESSION['phone']=$phone;
				$_SESSION['email']=$email;
				$_SESSION['direction']=$direction;
				$_SESSION['identity']=$identity;
				echo "<script>alert('登录成功！');window.location.href='main.php';</script>";
			}
		}

	 }
	 	
	$sql='SELECT * FROM reviewers';	
	$stmt=$conn->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
	$stmt->execute();
 	while ($row =$stmt->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
		if($username==$row[0])
		{
			$flag=1;
			$id=$row[2];
			$name=$row[3];
			$education=$row[4];
			$title=$row[5];
			$unit=$row[6];
			$phone=$row[7];
			$email=$row[8];
			$direction=$row[9];
			$social=$row[10];
			$card=$row[11];
			$identity="审稿人";
			if($password!=$row[1])
				echo "<script>alert('账号或密码错误！');window.location.href='login.php';</script>";
			else
			{
				$_SESSION['username']=$username;
				$_SESSION['id']=$id;
				$_SESSION['name']=$name;
				$_SESSION['education']=$education;
				$_SESSION['title']=$title;
				$_SESSION['unit']=$unit;
				$_SESSION['phone']=$phone;
				$_SESSION['email']=$email;
				$_SESSION['direction']=$direction;
				$_SESSION['identity']=$identity;
				$_SESSION['social']=$social;
				$_SESSION['card']=$card;
				echo "<script>alert('登录成功！');window.location.href='main.php';</script>";
			}
		}

	 }
	 if($flag==-1)
	 	echo "<script>alert('账号或密码错误！');window.location.href='login.php';</script>";
 	$stmt=null;
}catch(Exception $e){
  echo $e->gerMessage()."<br>";
  die();
}
$conn = null;
?>
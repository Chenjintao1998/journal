<?php 
header("content-type:text/html;charset=utf-8"); 
//error_reporting(E_ALL & ~E_NOTICE);
$flag=-1; 
$username=$_POST["username"];
$password=$_POST["password"];
$name=$_POST["name"];
$education=$_POST["education"];
$title=$_POST["title"];
$unit=$_POST["unit"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$direction=$_POST["direction"];
$identity=$_POST["identity"];
$social=$_POST["social"];
$card=$_POST["card"];
$host = "localhost"; 
$username1 = "root"; 
$password1 = "root"; 
$dbName="journal";
			
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
if(!preg_match("/^[\w\x80-\xff]{6,18}|[a-z][A-Z][0-9]{6,20}$/",$username))
  echo "<script>alert('用户名格式不正确');window.location.href='registered.php';</script>";
else if(!preg_match('/^(?![a-zA-Z]+$)(?![A-Z0-9]+$)(?![A-Z\\W_!@#$%^&*`~()-+=]+$)(?![a-z0-9]+$)(?![a-z\\W_!@#.$%^&*`~()-+=]+$)(?![0-9\\W_!@#.$%^&*`~()-+=]+$)[a-zA-Z0-9\\W_!@#.$%^&*`~()-+=]{8,20}$/',$password))
 {
	echo "<script>alert('密码格式不正确');window.location.href='registered.php';</script>";
 }
else if(!preg_match('/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/',$phone))
		echo "<script>alert('手机格式不正确');window.location.href='registered.php';</script>";
else if(!preg_match('/([a-z0-9_\-]+)@([a-z0-9_\-]+\.[a-z0-9\-\._\-]+)/',$email))
		echo "<script>alert('邮箱格式不正确');window.location.href='registered.php';</script>";
else if($name==""||$education==""||$title==""||$unit==""||$phone==""||$email==""||$direction=="")
{
	echo "<script>alert('信息不可为空！');window.location.href='registered.php';</script>";
}
else if($identity=="审稿人"&&($social==""||$card==""))
{
	echo "<script>alert('审稿人社会职务和银行卡号不可为空！');window.location.href='registered.php';</script>";
}
else{
	$conn = null;
	$dsn="mysql:host=$host;dbname=$dbName";
	$id1=0;
	$id2=0;
	
	try{
		
		$conn = new PDO($dsn, $username1, $password1,array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
		$sql='SELECT * FROM author';	
		$stmt=$conn->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
		$stmt->execute();
		while ($row =$stmt->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
			$id1=$row[2];
			if($username==$row[0])
			{
				$flag=1;
				echo "<script>alert('该账号已被注册！');window.location.href='registered.php';</script>";
			}
	
		 }
		$sql='SELECT * FROM reviewers';	
		$stmt=$conn->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
		$stmt->execute();
		while ($row =$stmt->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
			$id2=$row[2];
			if($username==$row[0])
			{
				$flag=1;
				echo "<script>alert('该账号已被注册！');window.location.href='registered.php';</script>";
			}
	
		 }
		$stmt=null;
	}catch(Exception $e){
	  echo $e->gerMessage()."<br>";
	  die();
	}
	$id1=$id1+1;
	$id2=$id2+1;
	$conn = null;
	if($flag==-1)
	{	
	
		try{
			
			$conn = new PDO($dsn, $username1, $password1,array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
			
			if($identity=="作者")
			{	
				$sql="insert INTO author (username,password,id,name,education,title,unit,phone,email,direction) values ('".$username."','".$password."','".$id1."','".$name."','".$education."','".$title."','".$unit."','".$phone."','".$email."','".$direction."')";
			}
			else if($identity=="审稿人")
			{
				$sql="insert INTO reviewers (username,password,id,name,education,title,unit,phone,email,direction,social,card) values ('".$username."','".$password."','".$id2."','".$name."','".$education."','".$title."','".$unit."','".$phone."','".$email."','".$direction."','".$social."','".$card."')";
				
	
			}
			$conn->exec($sql);
		}catch(Exception $e){
	  echo $e->gerMessage()."<br>";
	  die();
	 }
	$conn = null; 	
	}
	echo "<script>alert('注册成功！');window.location.href='login.php';</script>";
}
$conn = null;
?>

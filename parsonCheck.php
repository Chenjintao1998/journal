<?php 
		session_start();
		header("content-type:text/html;charset=utf-8"); 
		$id=$_SESSION['id'];
		$name=$_POST["name"];
		$education=$_POST["education"];
		$title=$_POST["title"];
		$unit=$_POST["unit"];
		$phone=$_POST["phone"];
		$email=$_POST["email"];
		$direction=$_POST["direction"];
		$identity=$_SESSION['identity'];
		$_SESSION['name']=$name;
		$_SESSION['education']=$education;
		$_SESSION['title']=$title;
		$_SESSION['unit']=$unit;
		$_SESSION['phone']=$phone;
		$_SESSION['email']=$email;
		$_SESSION['direction']=$direction;
		if($identity=="审稿人")
		{
			$social=$_POST["social"];
			$card=$_POST["card"];
			$_SESSION['social']=$social;
			$_SESSION['card']=$card;
		}
		
		$host = "localhost"; 
		$username1 = "root"; 
		$password1 = "root"; 
		$dbName="journal";
		$dsn="mysql:host=$host;dbname=$dbName";
		$conn = new PDO($dsn, $username1, $password1,array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
		if(!preg_match('/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/',$phone))
		echo "<script>alert('手机格式不正确');window.location.href='parson.php';</script>";
		else if(!preg_match('/([a-z0-9_\-]+)@([a-z0-9_\-]+\.[a-z0-9\-\._\-]+)/',$email))
		echo "<script>alert('邮箱格式不正确');window.location.href='parson.php';</script>";
		
		if($identity=="审稿人")
		{
			 $conn->exec("update reviewers set name='".$name."'    where id = '".$id."'");
			 $conn->exec("update reviewers set education='".$education."'    where id = '".$id."'");
			 $conn->exec("update reviewers set title='".$title."'    where id = '".$id."'");
			 $conn->exec("update reviewers set unit='".$unit."'    where id = '".$id."'");
			 $conn->exec("update reviewers set phone='".$phone."'    where id = '".$id."'");
			 $conn->exec("update reviewers set email='".$email."'    where id = '".$id."'");
			 $conn->exec("update reviewers set direction='".$direction."'    where id = '".$id."'");
			 $conn->exec("update reviewers set social='".$social."'    where id = '".$id."'");
			 $conn->exec("update reviewers set card='".$card."'    where id = '".$id."'");
		}
		else
		{
			 $conn->exec("update author set name='".$name."'    where id = '".$id."'");
			 $conn->exec("update author set education='".$education."'    where id = '".$id."'");
			 $conn->exec("update author set title='".$title."'    where id = '".$id."'");
			 $conn->exec("update author set unit='".$unit."'    where id = '".$id."'");
			 $conn->exec("update author set phone='".$phone."'    where id = '".$id."'");
			 $conn->exec("update author set email='".$email."'    where id = '".$id."'");
			 $conn->exec("update author set direction='".$direction."'    where id = '".$id."'");
		}
		echo "<script>alert('修改完成！');window.location.href='index.php';</script>";
		$conn = null;
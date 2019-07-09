<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
	session_start();
	if(isset($_SESSION['test'])){//如果已经登录
}else{//否则
echo "<script>alert('请先登录！');window.location.href='login.php';</script>";
exit();//强制中断程序的执行
}
	$username=$_SESSION['username'];
	$host = "localhost"; 
	$username1 = "root"; 
	$password1 = "root"; 
	$dbName="journal";
	$dsn="mysql:host=$host;dbname=$dbName";
	
	?>
    <table align="center" style="width:650px;">
			<tr>
			<td colspan="4" style="text-align: center">消息</td>
			<td colspan="4" style="text-align: center">时间</td>
			</tr>
    
    <?php
	try{
	$conn = new PDO($dsn, $username1, $password1,array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
	$sql='SELECT * FROM message';	
	$stmt=$conn->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
	$stmt->execute();
	
	?>
	<form action="messageCheck.php" method="post">
 	<?php
    while ($row =$stmt->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
		if($row[1]==$username)
		{	
		?>
			<tr>
			<td colspan="4" style="text-align:center"> <?php echo $row[2]?></td>
			<td colspan="4" style="text-align:center"><?php echo $row[3]?></td>
            <td><input type="checkbox" name="checkbox[]" value="<?php echo $row[0]?>"/></td>
			</tr>
            
            <?php
			
		}
	}
}catch(Exception $e){
  echo $e->gerMessage()."<br>";
  die();
}
$conn = null;
?>
 

<tr>
<td colspan="8" align="right"><input type="submit" value="删 除" size="12"></td>
</tr>
</table>
</form>
</body>
</html>
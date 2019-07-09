<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>审稿</title>
</head>

<body>
<?php
	session_start();
	
	if(isset($_SESSION['test'])){//如果已经登录
}else{//否则
echo "<script>alert('请先登录！');window.location.href='login.php';</script>";
exit();//强制中断程序的执行
}
	$host = "localhost"; 
	$username1 = "root"; 
	$password1 = "root"; 
	$dbName="journal";
	$dsn="mysql:host=$host;dbname=$dbName";
	if($_SESSION['identity']=="作者")
		echo "<script>alert('不是审稿人不可参与审稿！');window.location.href='index.php';</script>";
	else
	{
		?>
        <table align="center">
    
            <tr>
                <td >
                    <form action="reviewCheck.php" method="post">
                        <table >
                            <tr>
                                <td>
                                    请选择想要审批的稿子编号
                                </td>
                                <td>
                                    <input type="text" name="sid" size="20"/>
                                </td>
                            </tr>
                            
                            <tr>
                                <td align="left">
                                    <input type="submit" value="审 批" size="12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                 <td align="right">   <input type="reset" value="清 除" size="12">
                                  </td>
                            </tr>
                           
                        </table>
                    </form>
                </td>
            </tr>
        </table>
         <table align="center" style="width:1400px;">
			<tr>
			<td colspan="4" style="text-align: center">稿件名称</td>
			<td colspan="4" style="text-align: center">稿件编号</td>
            <td colspan="4" style="text-align: center">作者编号</td>
			<td colspan="4" style="text-align: center">作者排序</td>
            <td colspan="4" style="text-align: center">通信作者</td>
			<td colspan="4" style="text-align: center">专业分类号</td>
            <td colspan="4" style="text-align: center">关键词</td>
			<td colspan="4" style="text-align: center">中文摘要</td>
            <td colspan="4" style="text-align: center">英文摘要</td>
            <td colspan="4" style="text-align: center">资助项目</td>
			<td colspan="4" style="text-align: center">第一审稿人</td>
            <td colspan="4" style="text-align: center">第二审稿人</td>
            <td colspan="4" style="text-align: center">第三审稿人</td>
			<td colspan="4" style="text-align: center">状态</td>
			</tr>
 <?php       
	try{
	$conn = new PDO($dsn, $username1, $password1,array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
	$sql='SELECT * FROM manuscript';	
	$stmt=$conn->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
	$stmt->execute();
	while ($row =$stmt->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){
		
			?>
			<tr>
            <td colspan="4" style="text-align: center"><?php echo $row[0]?></td>
			<td colspan="4" style="text-align: center"><?php echo $row[1]?></td>
            <td colspan="4" style="text-align: center"><?php echo $row[2]?></td>
			<td colspan="4" style="text-align: center"><?php echo $row[3]?></td>
            <td colspan="4" style="text-align: center"><?php echo $row[4]?></td>
			<td colspan="4" style="text-align: center"><?php echo $row[5]?></td>
            <td colspan="4" style="text-align: center"><?php echo $row[6]?></td>
			<td colspan="4" style="text-align: center"><?php echo $row[7]?></td>
            <td colspan="4" style="text-align: center"><?php echo $row[8]?></td>
            <td colspan="4" style="text-align: center"><?php echo $row[9]?></td>
			<td colspan="4" style="text-align: center"><?php echo $row[10]?></td>
            <td colspan="4" style="text-align: center"><?php echo $row[11]?></td>
            <td colspan="4" style="text-align: center"><?php echo $row[12]?></td>
			<td colspan="4" style="text-align: center"><?php echo $row[13]?></td>
			</tr>
            
            <?php	
		
	}

	}catch(Exception $e){
  echo $e->gerMessage()."<br>";
  die();
}
	}
	$conn = null;
	?>
        
        
        
        
        
</body>
</html>
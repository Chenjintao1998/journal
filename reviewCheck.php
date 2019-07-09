<?php 
		session_start();
		header("content-type:text/html;charset=utf-8"); 
		$flag=-1; 
		$manuscriptid=$_POST["sid"];
		$_SESSION['manuscriptid']=$manuscriptid;
		$username=$_SESSION['username'];
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
			$flag=1;
			$_SESSION['spr']=0;
			$_SESSION['txzz']=$row[4];
			if($row[10]!="")
			{
				$psg=explode(",",$row[10]);
				if($username==$psg[0])
					echo "<script>alert('您已经审批过该稿子！不可重复审批');window.location.href='review.php';</script>";
				$_SESSION['spr']=1;
				if($row[11]!="")
				{
					$psg=explode(",",$row[11]);
					if($username==$psg[0])
					echo "<script>alert('您已经审批过该稿子！不可重复审批');window.location.href='review.php';</script>";
					$_SESSION['spr']=2;
					if($row[12]!="")
					{
						echo "<script>alert('稿子已经有三名审稿人审批！');window.location.href='review.php';</script>";
					}
					else
					echo "<script>alert('现在进行审批！');window.location.href='reviewCheck1.php';</script>";
				}
				else
					echo "<script>alert('现在进行审批！');window.location.href='reviewCheck1.php';</script>";
					
				}
			else
				echo "<script>alert('现在进行审批！');window.location.href='reviewCheck1.php';</script>";
		}

	 }
	 if($flag==-1)
	 {
		 echo "<script>alert('未找到该编号的稿子！');window.location.href='review.php';</script>";
		 }
	$conn = null; 	
 			
		
?>

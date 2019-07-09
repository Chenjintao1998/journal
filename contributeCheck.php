<?php 
		date_default_timezone_set("PRC");
		header("content-type:text/html;charset=utf-8"); 
		if (!file_exists('uploads'))
			mkdir('uploads/', 0777);
		//error_reporting(E_ALL & ~E_NOTICE);
		$flag=-1; 
		$manuscriptname=$_POST["manuscriptname"];
		$authorid=$_POST["authorid"];
		$sorting=$_POST["sorting"];
		$communication=$_POST["communication"];
		$classification=$_POST["classification"];
		$keywords=$_POST["keywords"];
		$chinese=$_POST["chinese"];
		$english=$_POST["english"];
		$funded=$_POST["funded"];
		$key=explode(',', $keywords);
if(sizeof($key)>6)
 	echo "<script>alert('关键词数量大于6个');window.location.href='contribute.php';</script>";

else if($manuscriptname==""||$authorid==""||$sorting==""||$communication==""||$classification==""||$keywords==""||$chinese==""||$english==""||$funded=="")
{
	echo "<script>alert('信息不可为空！');window.location.href='contribute.php';</script>";
}
else{
		$host = "localhost"; 
		$username1 = "root"; 
		$password1 = "root"; 
		$dbName="journal";
		$dsn="mysql:host=$host;dbname=$dbName";
		$countNum=0;
		$time=date("Y-m-d");
		$old_time="";
		$preg = '/^(\d\d\d\d)-(0?[1-9]|1[0-2])-(0?[1-9]|[12]\d|3[0-1])?$/';
		$filepath = 'count.txt';
		if (file_exists($filepath))
		{
			$fp = fopen($filepath,'r');
			 while(!feof($fp))
			 {
               $c = fgets($fp);
			   if(preg_match($preg,$c))
			   {
			   		$old_time=$c;
			   }
				else
				{
					$countNum=$c;
				}
				//echo $c."<br/>";
            }
			fclose($fp);
			unlink($filepath);
		}
 		$fp = fopen($filepath,'w');
		if($time==$old_time)
		{
			$countNum=0;
		}
 		$countNum++;
		fwrite($fp,$time);
		fwrite($fp, "\n");
 		fwrite($fp,$countNum);
		fclose($fp);
		$manuscriptid=$classification."_".$time."_".$countNum;

		try{
			$conn = new PDO($dsn, $username1, $password1,array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
			$sql="insert INTO manuscript (manuscriptname,manuscriptid,authorid,sorting,communication,classification,keywords,chinese,english,funded,state) values ('".$manuscriptname."','".$manuscriptid."','".$authorid."','".$sorting."','".$communication."','".$classification."','".$keywords."','".$chinese."','".$english."','".$funded."','')";
			
			$conn->exec($sql);
			$conn=null;
		}catch(Exception $e){
	  echo $e->gerMessage()."<br>";
	  die();
	 }
	$type = $_FILES['file']['type'];
	$tmp = $_FILES['file']['tmp_name'];
	$path = 'uploads/';                  
	$fileName=$manuscriptid;
	move_uploaded_file($tmp,$path.$fileName.".doc");
	echo "<script>alert('提交成功！');window.location.href='index.php';</script>";
 		
		 	
 			
	$conn = null;	
}
?>
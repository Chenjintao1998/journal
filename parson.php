<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人信息</title>
</head>
<?php
	session_start();
	if(isset($_SESSION['test'])){//如果已经登录
}else{//否则
echo "<script>alert('请先登录！');window.location.href='login.php';</script>";
exit();//强制中断程序的执行
}
	$username=$_SESSION['username'];
	$id=$_SESSION['id'];
	$identity=$_SESSION['identity'];
	$name=$_SESSION['name'];
	$education=$_SESSION['education'];
	$title=$_SESSION['title'];
	$unit=$_SESSION['unit'];
	$phone=$_SESSION['phone'];
	$email=$_SESSION['email'];
	$direction=$_SESSION['direction'];
	if($identity=="审稿人")
	{
		$social=$_SESSION['social'];
		$card=$_SESSION['card'];
	}
?>

<body>
        <table align="center">
            <tr>
                <td >
                    <form action="parsonCheck.php" name="res" method="post">
                        <table >
                            <tr>
                                <td>
                                    用户名
                                </td>
                                <td>
                                    <input type="text" name="username" value="<?php echo $username ?>"  disabled="disabled"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    作者编号
                                </td>
                                <td>
                                    <input type="text" name="id" value="<?php echo $id ?>"  disabled="disabled"/>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    姓名
                                </td>
                                <td>
                                    <input type="text" name="name" size="20" value="<?php echo $name ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    学历
                                </td>
                                <td>
                                    <select name="education" size="1" >
                                    	<option  value="<?php echo $education ?>"><?php echo $education ?></option>
                                        <option  value="博士">博士</option>
                                        <option  value="硕士">硕士</option>
                                        <option  value="本科">本科</option>
                                        <option  value="专科">专科</option>
                                        <option  value="高中">高中</option>
                                        <option  value="初中">初中</option>
                                        <option  value="小学">小学</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    职称
                                </td>
                                <td>
                                    <input type="text" name="title" value="<?php echo $title ?>" size="20"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    单位
                                </td>
                                <td>
                                    <input type="text" name="unit" value="<?php echo $unit ?>" size="20"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    联系电话
                                </td>
                                <td>
                                    <input type="text" name="phone"value="<?php echo $phone ?>" size="20"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    邮箱
                                </td>
                                <td>
                                    <input type="text" name="email" value="<?php echo $email ?>" size="20"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    研究方向
                                </td>
                                <td> 
                                    <input type="text" name="direction" value="<?php echo $direction ?>" size="20"/>
                                </td>
                            </tr>
                            <?php if($identity=="审稿人"){?>
                            <tr id="social" >
                            	<td>社会职称</td>
                                <td><input type="text" name="social" size="20" value="<?php echo $social ?>"/></td>
                            </tr>
                            <br />
                            <tr id="card" >
                            	<td>银行卡号</td>
                                <td><input type="text" name="card" size="20" value="<?php echo $card ?>"/></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td align="left">
                                    <input type="submit" value="进行修改" size="12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                 <td align="right">   <input type="reset" value="重 置" size="12">
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
</head>

<body style="background:url(bj.jpg);">
<?php 
ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
session_start();
session_destroy();

?>
<form  action="loginCheck.php"  method="post">
<table align="center" width="0" border="0" cellspacing="0" cellpadding="0">
<tr>
<td colspan="2" align="center">
<h3><font color="red">期刊在线投稿审批系统</font></h3>
</td>	
</tr>
<tr>
<td>用户名：</td>
<td><input type="text" name="username" value="<?php echo($_COOKIE["username"])?>"/></td>
</tr>
<tr>
<td>密码： </td>
<td><input type="password" name="password" value="<?php echo($_COOKIE["password"])?>"/></td>
<td><input type="checkbox" name="jizhu" value="1">记住账号密码</td>
</tr>

<tr>
<td>验证码:
</td>
<td><img id="captcha_img" border='1' src='captcha.php?r=echo rand(); ?>'  /><a href="#" onclick="document.getElementById('captcha_img').src='captcha.php?r='+Math.random()">换一个?</a></td>
</tr>

<tr>
<td>
请输入验证码:
</td>
<td><input type="text" name='authcode' value=''/></td>
</tr>

<tr>
<td><input type="submit" value="登录"/></td>
<td style="text-align:right"><input type="reset" value="重置"/> 
</td>
</tr>
<tr><td style="text-align:center" colspan="2"><a href="registered.php">还没有注册?现在去</a></td></tr>

 


</table>
</form>
</body>
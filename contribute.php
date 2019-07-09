<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>投稿</title>
</head>

<body>
<?php 
	session_start();
	$username=$_SESSION['username'];
	if($_SESSION['identity']=="审稿人")
		echo "<script>alert('审稿人不可参与投稿！');window.location.href='index.php';</script>";
		
	if(isset($_SESSION['test'])){//如果已经登录
}else{//否则
echo "<script>alert('请先登录！');window.location.href='login.php';</script>";
exit();//强制中断程序的执行
}
?>
<table align="center">
            <tr>
                <td colspan="3" align="center">
                    <h3><font color="red">请填写以下稿件信息</font></h3>
                </td>
            </tr>
            <tr>
                <td >
                    <form action="contributeCheck.php"  method="post" enctype="multipart/form-data">
                        <table >
                            <tr>
                                <td>
                                    稿件名称
                                </td>
                                <td>
                                    <input type="text" name="manuscriptname" size="20"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    作者编号
                                </td>
                                <td>
                                    <input type="text" name="authorid" size="20"/>
                                </td>
                                <td>可以不止一位，用","分隔</td>
                            </tr>
                            <tr>
                                <td>
                                    作者排序
                                </td>
                                <td>
                                    <input type="text" name="sorting" size="20"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    通讯作者
                                </td>
                                <td>
                                    <input type="text" name="communication" value="<?php echo $username?>" readonly="readonly" size="20"/>
                                </td>
                                <td>默认当前作者</td>
                            </tr>
                            <tr>
                                <td>
                                    专业分类号
                                </td>
                                <td>
                                    <input type="text" name="classification" size="20"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    关键词
                                </td>
                                <td>
                                    <input type="text" name="keywords" size="20"/>
                                </td>
                                <td>不超过6个</td>
                            </tr>
                            <tr>
                                <td>
                                    中文摘要
                                </td>
                                <td>
                                    <input type="text" name="chinese" size="20"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    英文摘要
                                </td>
                                <td>
                                    <input type="text" name="english" size="20"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    资助项目
                                </td>
                                <td>
                                    <input type="text" name="funded" size="20"/>
                                </td>
                                <td>可受多个项目资助，用","分隔</td>
                            </tr>
                            <tr>
                                <td>
                                    选择稿件
                                </td>
                                <td colspan="2">
                                    <input type="file" name="file" id="file" accept=".docx,.doc,.txt" /> 
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <input type="submit" id="send" value="投 稿" size="12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                 <td align="right">   <input type="reset" value="清 除" size="12">
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
      
</body>
</html>
<script>
var send=document.getElementById("send");
send.onclick=function(){
var file=document.getElementById("file").value;
if(file.length<1){
alert('请选择稿子');
return false;
}
}
</script>
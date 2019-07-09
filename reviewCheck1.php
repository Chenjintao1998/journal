<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php
session_start();
$manuscriptid=$_SESSION['manuscriptid'];
    
?>

<table align="center">
            <tr>
                <td >
                    <form action="reviewCheck2.php" method="post">
                        <table >
                        	<tr>
                            	<td><a href="./uploads/<?php echo $manuscriptid; ?>.doc">下载稿子</a></td>
                            </tr>
                            <tr>
                                <td>
                                    请选择该稿子的审批结果
                                </td>
                                <td>
                                    <input type="radio" name="gender" value="推荐" checked/>推荐<input type="radio" name="gender" value="不推荐"/>不推荐
                                </td>
                            </tr>
                            
                            <tr>
                                <td align="left">
                                    <input type="submit" value="提 交" size="12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                            </tr>
                           
                        </table>
                    </form>
                </td>
            </tr>
        </table>
</body>
</html>
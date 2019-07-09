<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
</head>
<script>

function checkidentity(){
         var identity = document.res.identity.value; 
         var reviewers = "审稿人";
         if(reviewers==identity){
            document.getElementById("social").style.display='table-row';
			document.getElementById("card").style.display='table-row';
             return ture;
		 }
		 document.getElementById("social").style.display='none';
		 document.getElementById("card").style.display='none';
         return flase;
     }
	 function checkphone(){
         var regstr = /^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/; 
         var phonestr = document.res.phone.value;
         if(!regstr.test(phonestr)){
            document.getElementById("errorphone").innerHTML="无效手机号";

             return false;
             
         }
       document.getElementById("errorphone").innerHTML="√";

         return true;
     }
	 function checkemail(){
         var regstr = /([a-z0-9_\-]+)@([a-z0-9_\-]+\.[a-z0-9\-\._\-]+)/; 
         var emailstr = document.res.email.value;
         if(!regstr.test(emailstr)){
            document.getElementById("erroremail").innerHTML="用户名@服务器名构成。用户名只能由5～20个英文字母a～z(不区分大小写)、数字0～9下划线组成，且起始字符必须是英文字母";

             return false;
             
         }
       document.getElementById("erroremail").innerHTML="√";

         return true;
     }
	 function checkname(){
    	
    	
        var regstr = /^[\w\x80-\xff]{6,18}|[a-z][A-Z][0-9]{6,20}$/; //用户名是由6-18个字符组成，且只能是英文大小写字母、数字、下划线、汉字
        var namestr = document.res.username.value;
        if(!regstr.test(namestr)){
          document.getElementById("errorname").innerHTML="6-18个字符组成，且只能是英文大小写字母、数字、下划线、汉字";

            return false;
            
        }
       document.getElementById("errorname").innerHTML="√";
//        x.style.color="red";
        return true;
    }
	 function checkpass(){
            var regstr = /^(?![a-zA-Z]+$)(?![A-Z0-9]+$)(?![A-Z\\W_!@#$%^&*`~()-+=]+$)(?![a-z0-9]+$)(?![a-z\\W_!@#.$%^&*`~()-+=]+$)(?![0-9\\W_!@#.$%^&*`~()-+=]+$)[a-zA-Z0-9\\W_!@#.$%^&*`~()-+=]{8,20}$/;//   ^匹配开始  $匹配结束     \w表示数字字母下划线
            var passstr = document.res.password.value;
            if(!regstr.test(passstr)){
                document.getElementById("errorpwd").innerHTML="至少包含以下四类字符中的三类：大写字母、小写字母、数字，以及键盘上的符号（如 !、@、#）、长度至少有 8 个字符";
                return false;
            }
            document.getElementById("errorpwd").innerHTML="√";
            return true;
        }
</script>
<body style="background:url(bj.jpg);">
        <table align="left">
            <tr>
                <td colspan="3" >
                    <h3><font color="red">请填写以下注册信息</font></h3>
                </td>
            </tr>
            <tr>
                <td >
                    <form action="resCheck.php" name="res" method="post">
                        <table >
                            <tr>
                                <td>
                                    用户名
                                </td>
                                <td>
                                    <input type="text" name="username"  onblur="checkname()" size="20"/>
                                </td>
                                <td id="errorname"></td>
                            </tr>
                            <tr>
                                <td>
                                    密码
                                </td>
                                <td>
                                    <input type="password" name="password" size="20" onblur="checkpass()"/>
                                </td>
                                <td  id="errorpwd"></td>
                            </tr>
                            <tr>
                                <td>
                                    姓名
                                </td>
                                <td>
                                    <input type="text" name="name" size="20"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    学历
                                </td>
                                <td>
                                    <select name="education" size="1">
                                        <option value="博士">博士</option>
                                        <option value="硕士">硕士</option>
                                        <option value="本科">本科</option>
                                        <option value="专科">专科</option>
                                        <option value="高中">高中</option>
                                        <option value="初中">初中</option>
                                        <option value="小学">小学</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    职称
                                </td>
                                <td>
                                    <input type="text" name="title" size="20"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    单位
                                </td>
                                <td>
                                    <input type="text" name="unit" size="20"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    联系电话
                                </td>
                                <td>
                                    <input type="text" name="phone" onblur="checkphone()" size="20"/>
                                </td>
                                <td id="errorphone"></td>
                            </tr>
                            <tr>
                                <td>
                                    邮箱
                                </td>
                                <td>
                                    <input type="text" name="email" onblur="checkemail()" size="20"/>
                                </td>
                                <td id="erroremail"></td>
                            </tr>
                            <tr>
                                <td>
                                    研究方向
                                </td>
                                <td>
                                    <input type="text" name="direction" size="20"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    身份
                                </td>
                                <td>
                                    <select name="identity" size="1" onblur="checkidentity()">
                                    	<option value="审稿人">审稿人</option>
                                        <option value="作者"> 作者</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="social" >
                            	<td>社会职称</td>
                                <td><input type="text" name="social" size="20" value=""/></td>
                            </tr>
                            <br />
                            <tr id="card" >
                            	<td>银行卡号</td>
                                <td><input type="text" name="card" size="20" value=""/></td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <input type="submit" value="注 册" size="12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                 <td align="right">   <input type="reset" value="重 置" size="12">
                                </td>
                            </tr>
                            <tr>
                            	<td colspan="2" align="center"><a href="login.php">返回登录</a></td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
    </body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">      
        <title>期刊在线</title>  
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">	
        <link rel="stylesheet" href="assets/chartist/css/chartist.min.css"> 
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <?php
		date_default_timezone_set("PRC");
		session_start();
		if(isset($_SESSION['test'])){//如果已经登录
}else{//否则
	echo "<script>alert('请先登录！');window.location.href='login.php';</script>";
exit();//强制中断程序的执行
}
		$username=$_SESSION['username'];
		$time=date('Y-m-d H:i:s');
		?>

    </head>
    <body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand" style="width:200px">
				<a href="index.php" target="main" >
					期刊<span>在线</span>
				</a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth">
						<i class="lnr lnr-arrow-left-circle"></i>
					</button>
				</div>
				<div class="navbar-menu">
                <div style="text-align:center">
               <div id="sj" style=" width:500px;height:10px; float:left"> 
               </div>		
               <div style=" width:500px;height:10px;  margin-left:10px;float:left" > 
			   <?php echo "当前用户:".$username; ?>
               	</div>
               </div>
                
					<ul class="nav navbar-nav navbar-right">
                    
						<li class="dropdown">
                        
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="assets/images/parson.png" class="img-circle" alt="parson-img">
								<i class="icon-submenu fa fa-angle-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li><a href="parson.php" target="main"><i class="lnr lnr-user"></i> <span>个人信息修改</span></a></li>
								<li><a href="message.php" target="main"><i class="lnr lnr-envelope"></i> <span>消息</span></a></li>
								<li><a href="login.php"><i class="lnr lnr-exit"></i>
                                 <span onclick="session_destroy();">退出</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			
		</nav>
		

		
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">

						<li>
							<a href="contribute.php" target="main" >
								<i data-feather="home"></i> <span>投稿</span>
							</a>
						</li>

						<li>
							<a href="review.php" target="main">
								<i data-feather="package"></i> <span>审稿</span>
							</a>
						</li>
				</nav>
			</div>

		</div>
		<div class="main">	
        <iframe frameborder="0" src="index.php"  width="100%" height="728px" name="main">
</iframe>
		</div>
		

		<div class="clearfix"></div>

		

	</div>
	


        
        <script  src="assets/js/jquery.min.js"></script>

		
        <script src="assets/chartist/js/chartist.min.js"></script>
        <script src="assets/chartist/js/chartist-tooltip-plugin.js"></script>
        <script src="assets/chartist/js/chartist-custom.js"></script>
        
        
        <script src="assets/js/bootstrap.min.js"></script>
		
		
        <script src="assets/js/jquery.slimscroll.min.js"></script>
		
		
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

		
        <script src="assets/js/d3.min.js"></script>
        <script src="assets/js/topojson.js"></script>
        <script src="assets/js/datamaps.world.min.js"></script>

        
        <script src="assets/js/fontawesome-all.min.js"></script>
        
        
        <script src="assets/js/custom.js"></script>
        <script>
            setInterval("document.getElementById('sj').innerHTML='当前时间: '+new Date  ().toLocaleString()+' 星期'+'日一二三四五六'.charAt(new Date().getDay  ());",1000); 
        </script>
		
    </body>
</html>

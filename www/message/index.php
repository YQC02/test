<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"> 
		<title>春节介绍</title>
		<link rel="stylesheet" href="../css/bootstrap.css">  
        <link rel="stylesheet" href="../css/css.css">  
        <link rel="stylesheet" href="../css/message.css">
		<script src="../js/bootstrap.js"></script>
	</head>
	<body>
		<div class="container">
		   <div class="row" >
		      <div class="col-lg-12">
		         <h1 class="logo">春节</h1>
		      </div>
		   </div>
		</div>
		<div class="container navbg">
		   <div class="row" >
				<div class="col-lg-12">
					<ul class="nav nav-pills nav-justified">
						<li class="active"><a href="#">春节简介</a></li>
						<li><a href="page1.html">春节习俗</a></li>
						<li><a href="page2.html">春节饮食</a></li>
						<li><a href="page2.html">互动评论</a></li>
					</ul>
				</div>
		   </div>
        </div>
        <div id="content">
			<div id="leftside">
				<b>
					网友留言
				</b><br>
				<?php
				//TODO:此处输入PHP代码，用于从数据库读取留言
				require_once("db.inc.php");
				//从数据库读出并显示留言记录
				$pagesize=4;
				if (@$_REQUEST['pagenumber'])
					$pagenumber = $_REQUEST['pagenumber'];
				else
					$pagenumber=1;

				$re=mysql_fetch_row(mysql_query("select count(*) from message"));
				$totalcount = $rs[ 0 ];
				$exec="select * from message order by id desc limit " .
				(($pagenumber-1)*$pagesize).",4";
				$result=mysql_query($exec);
				while($rs=mysql_fetch_object($result)){
					echo "<p>姓名:".$rs->name;
					echo "<p>留言:".$rs->contents;
					if ($rs->reply == null){
						echo "<br/>";
					}else{
						echo "回复:".$rs->reply;
					}
					echo
					".........................................";
					echo "<br/>";
				}

				if( $pagenumber>1){
					echo "<a href=message.php?pagenumber=" . ($pagenumber - 1).">前一页</a>&nbsp&nbsp";
				}
				else{
					echo "前一页&nbsp&nbsp";
				}
				if(
					$pagenumber< $totalcount/ $pagesize
				){
					echo "<a href=message.php?pagenumber=" . ($pagenumber+1).">后一页</a>";
				}else{
					echo "后一页";
				}

				mysql_close();

				?>
			<div id="rightside">
				<form method="post" action="add.php">
					<table cellspacing="0" border="0" align="center" cellpadding="2">
						<tr>
							<td colspan="3">我要留言</td>
						</tr>
						<tr>
							<td colspan="1">留言人</td>
							<td align="left" colspan="2">
								<input tupe="text" name="user" size="39" maxlength="14">
							</td>
						</tr>
						<tr class="h2">
							<td colspan="1">留言内容</td>
							<td align="left" colspan="2">
								<textarea name="contents" id="contents" cols="33" rows="6" maxlength="90" onkeyup="return isMaxLen(this)"></textarea>
							</td>
						</tr>
						<tr align="center">
							<td colspan="3" style="color:#FF3300">*需要我们联系您时填写，以下信息将保密</td>
						</tr>
						<tr>
							<td class="h2"><span>电子邮箱</span></td>
							<td colspan="2" align="left">
								<input type="text" name="mail" size="39" maxlength="30">
							</td>
						</tr>
						<tr class="h2">
							<td>联系电话：</td>
							<td align="left">
								<input type="text" name="phone" size="24" maxlength="15">
							</td>
							<td><input type="submit" value="提交留言"></td>
						</tr>
					</table>
				</form>
			</div>
			<br>
		
		<div class="container">
		   	<div class="row footer">
		      	<div class="col-lg-12">
		         春节
		    	</div>
		   	</div>
		</div>
	</body>
</html>
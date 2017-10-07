<html>
	<head>
		<title>修改學生資料</title>
		<meta charset="UTF8">
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script type="text/javascript" language="javascript"></script>			
	</head>
	
	<body>		
		<div data-role="header"  style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">
			<h1>修改學生資料</h1>
		</div>
		<br><br>
		<?php
			if ($_POST[ID]==null||$_POST[Name]==null||$_POST[Phone]==null){
				echo("<script>alert('資料不得有空白');</script>");
				?>
				<br><br>
				<a rel="external" href="edit.html #stud" data-role="button"  data-inline="true" data-icon="back" data-theme="a" style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">返回</a>
				<?php
			}
			else{
				$conn = mysql_connect("localhost", "root", "123456");
				mysql_select_db("database") or die("無法連接資料庫時顯示的訊息");
				mysql_query(" set names UTF8");  	
				mysql_query(" SET CHARACTER SET  'UTF8'; ");
				mysql_query('SET CHARACTER_SET_CLIENT=UTF8; ');
				mysql_query('SET CHARACTER_SET_RESULTS=UTF8; ');
				$num=0;
				$data=mysql_query("select * from borrow");
				for($i=0;$i<mysql_num_rows($data);$i++){
					$rs=mysql_fetch_row($data);
					if($_POST[ID]=="$rs[0]")
						{$num++;}
				}
				if($num==0){
					echo("<script>alert('此學生不存在');</script>");
					?>
					<br><br>
					<a rel="external" href="edit.html #stud" data-role="button"  data-inline="true" data-icon="back" data-theme="a" style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">返回</a>
					<?php
				}
				else{
					$str = "update  borrow set Name =  '$_POST[Name] ' where ID =  '$_POST[ID] ' ";
					$str1 ="update  borrow set Phone =  '$_POST[Phone] ' where ID =  '$_POST[ID] ' ";
					mysql_query($str);
					mysql_query($str1);
					echo "修改成功<br>";
					?>
					<br><br>
					<a rel="external" href="home.html" data-role="button"  data-inline="true" data-icon="back" data-theme="a" style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">回首頁</a>
					<?php
				}
			}
		?>
	</body>
</html>
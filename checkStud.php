<html>
	<head>
		<title>查詢學生資料</title>
		<meta charset="UTF8">
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script type="text/javascript" language="javascript"></script>			
	</head>

	<body>
		<div data-role="header"  style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">
			<h1>查詢學生資料</h1>
		</div>	
		<br><br>
		<?php	
			if ($_POST[ID]==null){
				echo("<script>alert('資料不得有空白');</script>");
				?>
				<br><br>
				<a rel="external" href="status.html #stud" data-role="button"  data-inline="true" data-icon="back" data-theme="a" style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">返回</a>
				<?php
			}
			else{
				$conn = mysql_connect("localhost", "root", "123456");
				mysql_select_db("database") or die("無法連接資料庫時顯示的訊息");
				mysql_query(" set names UTF8");  	
				mysql_query(" SET CHARACTER SET  'UTF8'; ");
				mysql_query('SET CHARACTER_SET_CLIENT=UTF8; ');
				mysql_query('SET CHARACTER_SET_RESULTS=big5; ');
				
				$num=0;
				$data=mysql_query("select * from borrow");
				for($i=0;$i<mysql_num_rows($data);$i++)
				{ 
					$rs=mysql_fetch_row($data);
					if($_POST[ID]=="$rs[0]")
						{$num++;}
				}
				if($num==0){
					echo("<script>alert('無此學生');</script>");
					?>
					<br><br>
					<a rel="external" href="status.html #stud" data-role="button"  data-inline="true" data-icon="back" data-theme="a" style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">返回</a>
					<?php
				}
				else{
					?>
					學號：<?php echo $rs[0]?><br>
					姓名：<?php echo $rs[1]?><br>
					電話：<?php echo $rs[2]?><br><br>
					借出器材<br>
					<?php
					$data1=mysql_query("select * from status where BorID ='$_POST[ID]'");
					for($i=0;$i<mysql_num_rows($data1);$i++)
					{ 
						$rs1=mysql_fetch_row($data1);
						$str2 ="select * from equip where EID ='$rs1[1]'";
						$data2 = mysql_query($str2);
						$rs2=mysql_fetch_row($data2);
						?>
						器材編號： <?php echo $rs2[0]?></br>
						器材名稱： <?php echo $rs2[1]?><br>
						數量： <?php echo $rs1[2]?><br><br>
						<?php 
					}
					?>
					<br><br><br>
					<a rel="external" href="home.html" data-role="button"  data-inline="true" data-icon="back" data-theme="a" style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">回首頁</a>
					<?php 
				}
			}
		?>
	</body>
</html>
	
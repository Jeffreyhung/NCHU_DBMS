<html>
	<head>
		<title>查詢剩餘器材</title>
		<meta charset="UTF8">
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script type="text/javascript" language="javascript"></script>			
	</head>

	<body>
		<div data-role="header"  style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">
			<h1>剩餘器材</h1>
		</div>
		<br><br><br><br>
		<?php	
			$conn = mysql_connect("localhost", "root", "123456");
				mysql_select_db("database") or die("無法連接資料庫時顯示的訊息");
				mysql_query(" set names UTF8");  
				mysql_query(" SET CHARACTER SET  'UTF8'; ");
				mysql_query('SET CHARACTER_SET_CLIENT=UTF8; ');
				mysql_query('SET CHARACTER_SET_RESULTS=big5; ');
				$data2=mysql_query("select * from equip");
				for($i=0;$i<mysql_num_rows($data2);$i++)
				{ 
					$rs2=mysql_fetch_row($data2);
					?>
					器材編號： <?php echo $rs2[0]?><br>
					器材名稱： <?php echo $rs2[1]?><br>
					剩餘數量： <?php echo $rs2[2]?><br><br>
					<?php 
				}
				?>
				<br><br><br>
				<a rel="external" href="home.html" data-role="button"  data-inline="true" data-icon="back" data-theme="a" style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">回首頁</a>
				<?php 
			
		?>
	</body>
</html>
	
<html>
	<head>
		<title>查詢器材資料</title>
		<meta charset="UTF8">
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script type="text/javascript" language="javascript"></script>			
	</head>

	<body>
		<div data-role="header"  style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">
			<h1>查詢器材</h1>
		</div>
		<br><br><br><br>
		<?php	
			if ($_POST[EID]==null){
				echo("<script>alert('資料不得有空白');</script>");
				?>
				<br><br>
				<a rel="external" href="status.html #equip" data-role="button"  data-inline="true" data-icon="back" data-theme="a" style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">返回</a>
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
				$data2=mysql_query("select * from equip");
				for($i=0;$i<mysql_num_rows($data2);$i++)
				{ 
					$rs2=mysql_fetch_row($data2);
					if($_POST[EID]=="$rs2[0]")
						{$num++;}
				}
				$num2=0;
				if($num==0){
					echo("<script>alert('無此器材');</script>");
					?>
					<br><br>
					<a rel="external" href="status.html #equip" data-role="button"  data-inline="true" data-icon="back" data-theme="a" style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">返回</a>
					<?php
				}
				else {
					$data2=mysql_query("select * from equip where EID = '$_POST[EID]'");
					$rs2=mysql_fetch_row($data2);
					?>
					編號：<?php echo $rs2[0]?><br>
					名稱：<?php echo $rs2[1]?><br>
					器材室剩餘數量：<?php echo $rs2[2]?><br><br>
					借用人<br>
					<?php
					$data1=mysql_query("select * from status where EquipID ='$_POST[EID]'");
					for($i=0;$i<mysql_num_rows($data1);$i++)
					{ 
						$rs1=mysql_fetch_row($data1);
						$str ="select * from borrow where ID ='$rs1[0]'";
						$data = mysql_query($str);
						$rs=mysql_fetch_row($data);
						?>
						借用人學號： <?php echo $rs[0]?><br>
						借用人姓名： <?php echo $rs[1]?><br>
						借用人電話： <?php echo $rs[2]?><br>
						借用數量： <?php echo $rs1[2]?><br><br>
						<?php 
					}
					?>
					<br><br>
					<a rel="external" href="home.html" data-role="button"  data-inline="true" data-icon="back" data-theme="a" style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">回首頁</a>
					<?php 
				}
			}
		?>
	</body>
</html>
	
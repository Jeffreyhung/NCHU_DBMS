<html>
	<head>
		<title>器材出借</title>
		<meta charset="UTF8">
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script type="text/javascript" language="javascript"></script>			
	</head>
	
	<body>
		<div data-role="header"  style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">
			<h1>借用器材</h1>
		</div>
		<br><br>
		<?php	
			if ($_POST[BorID]==null||$_POST[EquipID]==null||$_POST[BorNum]==null){
				echo("<script>alert('資料不得有空白');</script>");
				?>
				<br><br>
				<a rel="external" href="add.html #borrow" data-role="button"  data-inline="true" data-icon="back" data-theme="a" style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">返回</a>
				<?php
			}
			else{
				$conn = mysql_connect("localhost", "root", "123456");
				mysql_select_db("database") or die("無法連接資料庫時顯示的訊息");
				mysql_query(" set names UTF8");  	
				mysql_query(" SET CHARACTER SET  'UTF8'; ");
				mysql_query('SET CHARACTER_SET_CLIENT=UTF8; ');
				mysql_query('SET CHARACTER_SET_RESULTS=UTF8; ');
				$data2=mysql_query("select * from equip where EID ='$_POST[EquipID]'");
				$rs2=mysql_fetch_row($data2);
				
				if($_POST[BorNum]>$rs2[2]){
					echo("<script>alert('剩餘器材不足');</script>");
					?>
					<br><br>
					<a rel="external" href="add.html #borrow" data-role="button"  data-inline="true" data-icon="back" data-theme="a" style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">返回</a>
					<?php
				}
				else{
					$newnum= $rs2[2]-$_POST[BorNum];
					mysql_query($newnum);
					$str = "update equip set ENum =  ' $newnum ' where EID =  '$_POST[EquipID] ' ";
					mysql_query($str);
					mysql_query("INSERT INTO  status (BorID,EquipID,BorNum)VALUES ('$_POST[BorID]', '$_POST[EquipID]','$_POST[BorNum]'); ");
					echo "<br><br>出借成功<br><br>";
					?>	
					<br><br>
					<a rel="external" href="home.html" data-role="button"  data-inline="true" data-icon="back" data-theme="a" style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">回首頁</a>
					<?php
				}
			}
		?>
	</body>
</html>
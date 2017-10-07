<html>
	<head>
		<title>歸還器材</title>
		<meta charset="UTF8">
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script type="text/javascript" language="javascript"></script>			
	</head>

	<body>
		<div data-role="header"  style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">
			<h1>歸還器材</h1>
		</div>
		<br><br>
		<?php
			if ($_POST[BorID]==null || $_POST[EquipID]==null){
				echo("<script>alert('資料不得有空白');</script>");
				?>
				<br><br>
				<a rel="external" href="delete.html #return" data-role="button"  data-inline="true" data-icon="back" data-theme="a" style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">返回</a>
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
				for($i=0;$i<mysql_num_rows($data);$i++)
				{ 
					$rs=mysql_fetch_row($data);
					if($_POST[BorID]=="$rs[0]")
						{$num++;}
				}
				$num1=0;
				$data2=mysql_query("select * from equip");
				for($i=0;$i<mysql_num_rows($data2);$i++)
				{ 
					$rs2=mysql_fetch_row($data2);
					if($_POST[EquipID]=="$rs2[0]")
						{$num1++;}
				}
				$num2=0;
				$num3=0;
				$data1=mysql_query("select * from status");
				for($i=0;$i<mysql_num_rows($data1);$i++)
				{ 
					$rs1=mysql_fetch_row($data1);
					if($_POST[EquipID]=="$rs1[1]")
					{
						$num2++;
						if($_POST[BorID]!="$rs1[0]")
							{$num3++;}
					}
				}
				if($num==0){
				echo("<script>alert('沒有這個學生');</script>");
				?>
				<br><br>
				<a rel="external" href="delete.html #return" data-role="button"  data-inline="true" data-icon="back" data-theme="a" style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">返回</a>
				<?php
				}
				else if($num1==0){
					echo("<script>alert('沒有此器材');</script>");
					?>
					<br><br>
					<a rel="external" href="delete.html #return" data-role="button"  data-inline="true" data-icon="back" data-theme="a" style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">返回</a>
					<?php
				}
				else if($num2==0){
					echo("<script>alert('此器材沒有被借出');</script>");
					?>
					<br><br>
					<a rel="external" href="delete.html #return" data-role="button"  data-inline="true" data-icon="back" data-theme="a" style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">返回</a>
					<?php
				}
				else if($num3>0){
					echo("<script>alert('此學生沒有借此器材');</script>");
					?>
					<br><br>
					<a rel="external" href="delete.html #return" data-role="button"  data-inline="true" data-icon="back" data-theme="a" style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">返回</a>
				<?php
				}
				else{
					$newnum= $rs2[2] + $rs1[2];
					mysql_query($newnum);
					$str = "update equip set ENum =  ' $newnum ' where EID =  '$_POST[EquipID] ' ";
					mysql_query($str);

					mysql_query("delete from status where BorID = '$_POST[BorID]'");
					echo "歸還成功<br>";
					?>
					<br><br>
					<a rel="external" href="home.html" data-role="button"  data-inline="true" data-icon="back" data-theme="a" style="background-color:#77b3d4; color:#FFFFFF; text-shadow: 0 1px 1px #000000;">回首頁</a>
					<?php
				}
			}
		?>
	</body>
</html>
<?php
include "../public/session.php";
include "../public/db.php";
//include "function.php";
//$obj=new abc();
//$obj->table(0,1,$db,"category");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>gaunli</title>
	<style>
		table{
		width:800px;
		border:1px solid #000;
		margin:0 auto;
		border-bottom:none;
		border-collapse: collapse;
	}
	th,td{
		/*width:150px;*/
		height: 30px;
		border:1px solid #000;
		text-align: center;
		line-height:30px;
	}
	</style>
</head>
<body>
	<form action="">
		<table>
			<tr>
				<th>栏目</th>
				<th>题目</th>
				<th>时间</th>
				<th>作者</th>
				<th>操作</th>
			</tr>
			<tbody>
			<?php  
				$result=$db->query("select * from shows");
				while($row=$result->fetch_assoc()){
					$cid=$row['cid'];
			?>
				<tr>
					<td><?php 
						$result1=$db->query("select * from category where cid=".$cid);
						$row1=$result1->fetch_assoc();
						echo $row1["cname"];
						?></td>
					<td><?php echo $row["stitle"]?></td>
					<td><?php echo $row["stime"]?></td>
					<td><?php echo $row["username"]?></td>
					<td><a href="con_del.php?id=<?php echo $row['sid']?>">删除</a>&nbsp;<a href="con_update.php?id=<?php echo $row['sid']?>">修改</a></td>
				</tr>
				
			<?php 
			}
			?>
			</tbody>
		</table>
	</form>
</body>
</html>
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
		width:500px;
		border:1px solid #000;
		margin:0 auto;
		border-bottom:none;
		border-collapse: collapse;
	}
	th,td{
		width:150px;
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
				<th>cid</th>
				<th>cname</th>
				<th>pid</th>
				<th>操作</th>
			</tr>
			<tbody>
			<?php 
				$result=$db->query("select * from category where pid=0");
				while($row=$result->fetch_assoc()){
					$cid=$row['cid'];
			?>
				<tr>
					<td><?php echo $row["cid"]?></td>
					<td><?php echo $row["cname"]?></td>
					<td><?php echo $row["pid"]?></td>
					<td><a href="class_del.php" =<?php echo $cid?>">删除</a>&nbsp;<a href="class_update.php?id=<?php echo $cid?>">修改</a></td>
				</tr>
				<?php 
					$result1=$db->query("select * from category where pid=".$row['cid']);
					while($row1=$result1->fetch_assoc()){
						$cid=$row1['cid'];
				?>
					<tr>
						<td><?php echo $row1["cid"]?></td>
						<td><?php echo $row1["cname"]?></td>
						<td><?php echo $row1["pid"]?></td>
						<td><a href="class_del.php?id=<?php echo $cid?>">删除</a>&nbsp;<a href="class_update.php?id=<?php echo $cid?>">修改</a></td>
					</tr>
					<?php 
						$result2=$db->query("select * from category where pid=".$row1['cid']);
						while($row2=$result2->fetch_assoc()){
							$cid=$row2['cid'];
					?>
						<tr>
							<td><?php echo $row2["cid"]?></td>
							<td><?php echo $row2["cname"]?></td>
							<td><?php echo $row2["pid"]?></td>
							<td><a href="class_del.php?id=<?php echo $cid?>">删除</a>&nbsp;<a href="class_update.php?id=<?php echo $cid?>">修改</a></td>
						</tr>
					<?php 
					}
					?>
				<?php 
				}
				?>
			<?php 
			}
			?>
			</tbody>
		</table>
	</form>
</body>
</html>
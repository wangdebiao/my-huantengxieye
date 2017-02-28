<?php
include "../public/session.php";
include "../public/db.php";
//include "function.php";
//$tree=new abc();
//$tree->tree(0,1,$db,"category");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<style>
	.box{
		width:250px;
		height: 270px;
		border:1px solid #333;
		position:fixed;
		top:0;bottom:0;left:0;right:0;
		margin:auto;
		background:#fff;
		text-align: center;
		border-radius: 2px;
		box-shadow: 0 0 5px #333;
		color: #5e5e5e;
	}
	.shuru{
		color:#20739B;
		height: 50px;
		line-height: 50px;
		font-size: 18px;
		margin:25px 0 15px;
	}
	.qx{
		color:#666;
		font-size: 13px;
		position: absolute;
		right:0;
		top:0;
	}
	select{
		width: 100px;
	}
	#text{
		width: 100px;
		margin-top: 20px;
	}
	#dl{
		width: 130px;
		height: 28px;
		background: #345BAA;
		color: #fff;
		font-size: 14px;
		border:none;
		position: absolute;
		bottom:50px;
		left:60px;
		cursor: pointer;
	}
</style>
<body>
	<div class="box">
		<form action="class_addinfo.php">
			<div class="shuru">添加分类</div>
			父分类：<select name="pid">
				<option value="0">目录</option>
				<?php 
					$result=$db->query("select * from category where pid=0");
					while($row=$result->fetch_assoc()){
				?>
					<option value="<?php echo $row['cid']?>"><?php echo $row["cname"]?></option>
					<?php 
						$result1=$db->query("select * from category where pid=".$row['cid']);
						while($row1=$result1->fetch_assoc()){
					?>
						<option value="<?php echo $row1['cid']?>">--<?php echo $row1["cname"]?></option>
						<?php 
							$result2=$db->query("select * from category where pid=".$row1['cid']);
							while($row2=$result2->fetch_assoc()){
						?>
							<option value="<?php echo $row2['cid']?>">----<?php echo $row2["cname"]?></option>
						<?php 
						}
						?>
					<?php 
					}
					?>
				<?php 
				}
				?>
			</select><br>
			新分类：<input type="text" name="cname" id="text"/><br>
			<input type="submit" value="添加" id="dl"/>
		</form>
	</div>
</body>
</html>
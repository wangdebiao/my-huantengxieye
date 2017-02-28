<?php
include "../public/session.php";
include "../public/db.php";
$id=$_GET["id"];
//include "function.php";
//$tree=new abc();
//$tree->tree(0,1,$db,"category");
$result=$db->query("select * from category where cid=".$id);
$row=$result->fetch_assoc();
$zhi=$row["cname"];
$fuid=$row["pid"];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
<form action="class_updateinfo.php">
	<select name="pid">
		<option value="0">目录</option>
		<?php 
			$result=$db->query("select * from category where pid=0");
			while($row=$result->fetch_assoc()){
		?>
			<option value="<?php echo $row['cid']?>" 
				<?php if($row['cid']==$fuid){?>
				selected='selected';
				<?php }?>
				><?php echo $row["cname"]?></option>
			<?php 
				$result1=$db->query("select * from category where pid=".$row['cid']);
				while($row1=$result1->fetch_assoc()){
			?>
				<option value="<?php echo $row1['cid']?>" <?php if($row1['cid']==$fuid){?>
				selected="selected"
				<?php }?>>--<?php echo $row1["cname"]?></option>
				<?php 
					$result2=$db->query("select * from category where pid=".$row1['cid']);
					while($row2=$result2->fetch_assoc()){
				?>
					<option value="<?php echo $row2['cid']?>" <?php if($row2['cid']==$fuid){?>
				selected="selected"
				<?php }?>>--<?php echo $row2["cname"]?></option>
				<?php 
				}
				?>
			<?php 
			}
			?>
		<?php 
		}
		?>
	</select>
	<input type="text" name="cname" value="<?php 
		echo $zhi;
		?>"/>
	<input type="hidden" name="cid" value="<?php echo $id?>"/>
	<input type="submit" value="修改"/>
</form>
</body>
</html>
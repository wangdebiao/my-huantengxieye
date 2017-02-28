<?php
include "header.php";
include "headerTwo.php";
?>
	<div class="wdb-content-kj-box">
		<!--左-->
		<div class="wdb-content-kj-left">
			<ul class="wdb-content-kj-left-list">
				<?php
					include "../public/db.php";
					$cid=$_GET["id"];
					$sql="select * from category where pid=".$cid;
					$result=$db->query($sql);
					$row=$result->fetch_assoc();
				?>
				<a href=""  target="_self">
					<li class="wdb-content-kj-left-list-xiao">
						<?php echo $row["cname"]?>
					</li>
				</a>	
			</ul>
		</div>
		<!--右-->
		<div class="wdb-content-kj-right">
			<div class="wdb-content-kj-right-top">
				<div class="wdb-content-kj-right-top-left">
					<?php
						include "../public/db.php";
						$result1=$db->query("select * from category where pid=".$cid);
						$row1=$result1->fetch_assoc();
						$id=$row1["cid"]
					?>
					<span class="wdb-content-kj-left-big"><?php echo $row1["cname"]?></span>
					<span class="wdb-content-kj-left-small">ABOUT</span>
				</div>
				<div class="wdb-content-kj-right-top-right">
					<a href="index.php"><span class="wdb-content-kj-right-world">首页</span></a>
					<span class="wdb-content-kj-right-world">&gt</span>
					<span class="wdb-content-kj-right-world"><?php echo $row1["cname"]?></span>
				</div>
			</div>
			<div class="wdb-content-kj-right-bottom">
				<?php
					$result2=$db->query("select * from shows where cid=".$id);
					$row2=$result2->fetch_assoc();
					echo $row2["scon"];
				?>			
			</div>			
		</div>
	</div>

<?php
include "footer.php";
?>
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
				<a href="product_list.php?id=<?php echo $cid?>"  target="_self">
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
					<span class="wdb-content-kj-left-big">产品展示</span>
					<span class="wdb-content-kj-left-small">PRODUCT</span>
				</div>
				<div class="wdb-content-kj-right-top-right">
					<a href="index.php"><span class="wdb-content-kj-right-world">首页</span></a>
					<span class="wdb-content-kj-right-world">&gt</span>
					<span class="wdb-content-kj-right-world">产品展示</span>
				</div>
			</div>
			<div class="wdb-content-kj-right-bottom">
				<?php
				include "../public/db.php";
				$sql1="select * from category where pid=".$cid;
				$result1=$db->query($sql1);
				$row1=$result1->fetch_assoc();
				$dd=$row1["cid"];
				?>


				<ul class="wdb-cpzs-top">
				<?php
				include "../public/db.php";
				$res=$db->query("select * from shows where cid=14");
				while($row3=$res->fetch_assoc()){
				?>
				<a href="product_show.php">
					<li class="wdb-cpzs-top-xiao">
						<div class="wdb-cpzs-top-xiao-top">
							<img src="<?php echo $row3["image"]?>" alt="">
						</div>
						<div class="wdb-cpzs-top-xiao-bottom">
							<span><?php echo $row3["stitle"]?></span>
						</div>
					</li>
				</a>
				<?php 	
				};
				?>
				</ul>
				
				
				
				
				<?php
				$sql2="select * from category where pid=".$dd;
				$result2=$db->query($sql2);
//				$row2=$result2->fetch_assoc();
				?>
				<div class="wdb-cpzs-bottom">
					<div class="wdb-cpzs-bottom-wenzi">首页</div>
					<div class="wdb-cpzs-bottom-wenzi">上一页</div>
					<?php 
					while($row2=$result2->fetch_assoc()){
					?>
					<div class="wdb-cpzs-bottom-wenzi btn1">
						<a href="product_list.php?id=<?php echo $row2["cid"]?>"><?php echo $row2["cname"]?></a>
					</div>
					<?php 	
					};
					?>

					<div class="wdb-cpzs-bottom-wenzi">下一页</div>
					<div class="wdb-cpzs-bottom-wenzi">尾页</div>
					<div class="wdb-cpzs-bottom-wenzi bianhua">1/3</div>
					<div class="wdb-cpzs-bottom-wenzi">页</div>
				</div>
					
							
			</div>			
		</div>
	</div>

<?php
include "footer.php";
?>
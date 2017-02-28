<?php include "header.php";?>
<!-- banner -->
	<div class="wdb-bannerbox">
		<div class="wdb-banner">
			<div class="wdb-banner-pic first">
				<img src="../images/banner1.jpg" alt="">
			</div>
			<div class="wdb-banner-pic">
				<img src="../images/banner2.jpg" alt="">
			</div>
			<div class="wdb-banner-pic">
				<img src="../images/banner3.jpg" alt="">
			</div>
			<div class="wdb-banner-btnbox-box">
				<ul class="wdb-banner-btnbox">
					<li class="wdb-banner-btn first"></li>
					<li class="wdb-banner-btn"></li>
					<li class="wdb-banner-btn"></li>
				</ul>
			</div>
		</div>
	</div>
<!-- 内容 -->
	<div class="wdb-contentbox">
		<?php include "../public/db.php";
		$result=$db->query("select * from category where posid=1");
		$row=$result->fetch_assoc();
		?>
		<a href="about_category.php?id=<?php echo $row['cid']?>"><div class="wdb-content1"></div></a>
		<?php include "../public/db.php";
		$result1=$db->query("select * from category where posid=2");
		$row1=$result1->fetch_assoc();
		?>
		<a href="product_category.php?id=<?php echo $row1['cid']?>"><div class="wdb-content2"></div></a>
		<?php include "../public/db.php";
		$result2=$db->query("select * from category where posid=3");
		$row2=$result2->fetch_assoc();
		?>
		<a href="category.php?id=<?php echo $row2['cid']?>"><div class="wdb-content3"></div></a>
	</div>
<?php include "footer.php";?>
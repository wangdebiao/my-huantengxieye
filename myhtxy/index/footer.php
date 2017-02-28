<!-- 底部 -->
	<div class="wdb-footbox">
		<div class="wdb-foot">
			<!--<img src="images/di.jpg" alt="">-->
			<div class="wdb-foot-left">
				<img src="../images/foot-left1.jpg" alt="" />
				<img src="../images/foot-left2.jpg" alt="" />
			</div>
			<div class="wdb-foot-center">
				<ul class="wdb-foot-center-top">
					<li class="wdb-foot-wenzi"><a href="index.php">首页</a></li>
					<li class="shu">丨</li>
					<?php
						include "../public/db.php";
						$sql="select * from category where pid=0";
						$result=$db->query($sql);
						while($row=$result->fetch_assoc()){
							if($row["cid"]==1){
					?>
					<li class="wdb-foot-wenzi"><a href="about_category.php?id=1"><?php echo $row["cname"]?></a></li>
					<li class="shu">丨</li>
					<?php
					}else if($row["cid"]==2){
					?>
					<li class="wdb-foot-wenzi"><a href="news_category.php?id=2"><?php echo $row["cname"]?></a></li>
					<li class="shu">丨</li>
					<?php 		
						}else if($row["cid"]==3){
					?>
					<li class="wdb-foot-wenzi"><a href="product_category.php?id=3"><?php echo $row["cname"]?></a></li>
					<li class="shu">丨</li>
					<?php 		
					}else{
					?>
					<li class="wdb-foot-wenzi"><a href="category.php?id=<?php echo $row["cid"]?>"><?php echo $row["cname"]?></a></li>
					<li class="shu">丨</li>
					<?php 		
					};}
					?>
				</ul><br>
				<div class="wdb-foot-center-bottom">版权所有：广州欢腾鞋业有限公司 备案号：晋ICP备*****号 手机：18734563166  固话：400-6505-778</div>
			</div>
			<div class="wdb-foot-right">
				<img src="../images/foot-right.jpg" alt="" />
			</div>
		</div>
	</div>
</body>
<script></script>
</html>
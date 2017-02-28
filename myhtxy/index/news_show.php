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
					$cid=$_GET["cid"];
					$sid=$_GET["id"];
					$sql="select * from category where pid=".$cid;
					$result=$db->query($sql);
					$row=$result->fetch_assoc();
				?>
				<a href="news_list.php?id=<?php echo $cid?>"  target="_self">
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
					?>
					<span class="wdb-content-kj-left-big">
						<?php 
							echo $row1["cname"];
							?>
					</span>
					<span class="wdb-content-kj-left-small">ABOUT</span>
				</div>
				<div class="wdb-content-kj-right-top-right">
					<a href="index.php"><span class="wdb-content-kj-right-world">首页</span></a>
					<span class="wdb-content-kj-right-world">&gt</span>
					<span class="wdb-content-kj-right-world">
					<?php 
						echo $row1["cname"];
						?>
					</span>
				</div>
			</div>
			<div class="wdb-content-kj-right-bottom">
				<?php 
					$result9=$db->query("select * from shows where sid=".$sid);
					$row9=$result9->fetch_assoc();
				?>
				<div class="wdb-xwdt-erji-three-top">
					<span><?php echo $row9["stitle"]?></span><br />
					<span>浏览次数： 23 日期：<?php echo $row9["stime"]?></span>
				</div>
				<div class="wdb-xwdt-erji-three-center">
					<p><?php echo $row9["scon"]?></p>
				</div>
				<div class="wdb-xwdt-erji-three-bottom">
					<!--<span>上一篇：</span><a href="{$previous_page[url]}">{$previous_page[title]}</a><br />
                	<span>下一篇：</span><a href="{$next_page[url]}">{$next_page[title]}</a>-->
					<!--<span><a href="">上一条： 暂无</a> </span><br />
					<span><a href="">下一条： 布鞋保养知识</a></span>-->
				</div>			
			</div>			
		</div>
	</div>

<?php
include "footer.php";
?>
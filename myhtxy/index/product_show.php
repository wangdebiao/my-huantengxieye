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
				<div class="wdb-xwdt-erji-three-top">
					{$content}
				</div>
				
				<div class="../wdb-cpzs-erji" id="wdb-cpzsej-one">
					<span>F0662-1</span>
				</div>
				<div class="wdb-cpzs-erji" id="wdb-cpzsej-two">
					<img src="../images/cpzs01.jpg" alt="" />
				</div>
				<div class="wdb-cpzs-erji" id="wdb-cpzsej-three">
					<img src="../images/cpzs.png" alt="" />
				</div>
				<div class="wdb-cpzs-erji" id="wdb-cpzsej-four">
					<img src="../images/cpzs02.jpg" alt="" />
				</div>
				<div class="wdb-cpzs-erji" id="wdb-cpzsej-five">
					<span>上一篇：</span><a href="{$previous_page[url]}">{$previous_page[title]}</a><br />
                	<span>下一篇：</span><a href="{$next_page[url]}">{$next_page[title]}</a>
				</div>			
			</div>			
		</div>
	</div>

<?php
include "footer.php";
?>
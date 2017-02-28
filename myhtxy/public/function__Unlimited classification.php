<?php
//无极限分类封装函数
 	class abc{
     	function __construct(){
          	$this->str="";
	 	}
		function tree($pid, $flag, $db, $table,$current=null){
		    $currentPid=null;
		    if($current){
		        $sql="select * from $table where cid=".$current;
			   	$result=$db->query($sql);
			   	$row=$result->fetch_assoc();
			   	$currentPid=$row["pid"];
		 	}
			$flag=$flag+1;
		 	$sql = "select * from $table where pid=" . $pid;
		 	$result = $db->query($sql);
		 	while ($row = $result->fetch_assoc()) {
		     	$cid = $row["cid"];
		 		$str=str_repeat('-',$flag);
		 		if($currentPid==$row["cid"]){
		 			$this->str.= "<option value='$cid' selected='selected'>{$str}{$row['cname']}</option>";
		 		}else {
		     		$this->str .= "<option value='$cid'>{$str}{$row['cname']}</option>";
		 		}
		 		$this->tree($row["cid"], $flag, $db, $table,$current);
		    }
		}
		function table($pid, $flag, $db, $table){
		    $flag=$flag+1;
		    $sql = "select * from $table where pid=" . $pid;
		 	$result = $db->query($sql);
		 	while ($row = $result->fetch_assoc()) {
		     	$cid = $row["cid"];
		 		$str=str_repeat('-',$flag);
		 		$cid=$row["cid"];
		 		$cname=$row["cname"];
		 		$pid=$row["pid"];
		 		$this->str.= "<tr>
		 			<td>$cid</td>
		 			<td>{$str}{$cname}</td>
		 			<td>$pid</td>
		 			<td>
		 				<a href='delCategory.php?id={$cid}'>删除</a>
		 				<a href='editCategory.php?id={$cid}'>编辑</a>
		 			</td>
		 			</tr>";
		 		$this->table($row["cid"], $flag, $db, $table);
		    }
		}
		function  del($id,$db,$table){
		    $sql="select * from $table where pid=".$id;
		   	$result=$db->query($sql);
		   	if($result->fetch_assoc()){
		    	$message="包含子类，不能删除，请先删除子类";
		   		$url="showCategory.php";
		   		include "message.html";
		   	}else{
		       	$sql="delete from $table where cid=".$id;
		   		$db->query($sql);
		   		if($db->affected_rows>0){
		       		$message="删除分类成功";
		   			$url="showCategory.php";
		   			include "message.html";
		 		}
		   	}
		}
	}
//	在页面输出的时候
	//上面写这个
	 	include  "../public/functions.php";
	 	$obj=new  abc();
	 	$obj->函数名(0,1,$db,"category");
	//下面echo输出这个
		$obj->str
?>
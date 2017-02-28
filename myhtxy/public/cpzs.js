$(document).ready(function(){
//产品展示
	function cpzs(){
	    var num=0;
	    var nub=0;
	    var arr=["1/3","2/3","3/3"];
	    //第一页包装
	    function one(){
			$(".wdb-cpzs-top").removeClass("first").eq(0).addClass("first");
		    $(".bianhua").eq(0).html(arr[0]);
		    num=0;
		}
	    //第三页包装
	    function three(){
			$(".wdb-cpzs-top").removeClass("first").eq(2).addClass("first");
		    $(".bianhua").eq(0).html(arr[2]);
		    num=2;
		}
	    //首页
		$(".wdb-cpzs-bottom-wenzi").eq(0).on("click",one)
		//1
		$(".wdb-cpzs-bottom-wenzi").eq(2).on("click",one)
		//2
		$(".wdb-cpzs-bottom-wenzi").eq(3).on("click",function(){
			$(".wdb-cpzs-top").removeClass("first").eq(1).addClass("first");
		    $(".bianhua").eq(0).html(arr[1]);
		    num=1;
		})
		//3
		$(".wdb-cpzs-bottom-wenzi").eq(4).on("click",three)
		//尾页
		$(".wdb-cpzs-bottom-wenzi").eq(6).on("click",three);
		//上一页
		$(".wdb-cpzs-bottom-wenzi").eq(1).on("click",function(){
			if(num<=0){
			    num=1;
			}            		$(".wdb-cpzs-top").removeClass("first").eq(num-1).addClass("first");
			$(".bianhua").eq(0).html(arr[num-1]);
			num--;
		})
		//下一页
		$(".wdb-cpzs-bottom-wenzi").eq(5).on("click",function(){
			if(num>=2){
			    num=1;
			}
			$(".wdb-cpzs-top").removeClass("first").eq(num+1).addClass("first");
			$(".bianhua").eq(0).html(arr[num+1]);
			num++;
		})
	}
	cpzs();
})
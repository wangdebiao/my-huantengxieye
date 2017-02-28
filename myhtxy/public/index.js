$(document).ready(function(){
// banner
    function banner(){
		//轮播
		var n=0;
		var t=setInterval(move,2000);
		function move(){
			n++;
			if(n>$(".wdb-banner-pic").length-1){
				n=0;
			}
			$(".wdb-banner-btn").removeClass("first").eq(n).addClass("first");
			$(".wdb-banner-pic").css({opacity:0}).eq(n).css({opacity:1});
		}
		//选项卡
		$(".wdb-banner-btn").on("mouseover",function(){
			$(".wdb-banner-btn").removeClass("first").eq($(this).index()).addClass("first");
			$(".wdb-banner-pic").css({opacity:0}).eq($(this).index()).css({opacity:1});
			n=$(this).index();
		})
		//鼠标移入移出
		$(".wdb-banner").on("mouseover",function(){
			clearInterval(t);
		});
		$(".wdb-banner").on("mouseout",function(){
			t=setInterval(move,2000);
		});
    }
    banner();
//主导航
    function mainbav(){
		$(".wdb-mainbav-right-seven").each(function(index,dom){
			$(".wdb-mainbav-right-seven").eq(index).on("mouseover",function(){
				$(".wdb-mainbav-right-seven .wdb-mainbav-right-seven-js").eq(index).css({display:"block"});
			})
			$(".wdb-mainbav-right-seven").eq(index).on("mouseout",function(){
				$(".wdb-mainbav-right-seven .wdb-mainbav-right-seven-js").eq(index).css({display:"none"});
			})
		})
   }
    mainbav()
//// 在线留言
//  function zxly(){
//      // var sixbox=$(".wdb-form-six");
//      // var input=$("input",sixbox);
//      // var val1=input[0].innerHTML;
//      // var reg=/\s/
//      
//      // for (var i = 0; i < input.length; i++) {
//      //     if(input[i].val==""){
//      //         input[i].focus();
//      //         input[i].val="不能为空"；
//      //         input[i].style.background="red";
//      //     }
//      // };
//  }
//  zxly()
//function drag(obj,father,attrobj){
//  this.box=obj;
//  this.father=father||document;//控制拖拽范围
//  this.attrobj=attrobj||{};
//  this.animate=this.attrobj.animate==undefined?true:this.attrobj.animate;//控制动画有无
//  this.x=this.attrobj.x==undefined?true:this.attrobj.x;//控制x轴是否移动
//  this.y=this.attrobj.y==undefined?true:this.attrobj.y;//控制y轴是否移动
//  this.ox=0;
//  this.oy=0;
//  this.cx=0;
//  this.cy=0;
//  if(this.father.nodeType==9){
//      this.xx=document.documentElement.clientWidth-this.box.offsetWidth;
//      this.yy=document.documentElement.clientHeight-this.box.offsetHeight;
//  }else{
//      this.xx=this.father.offsetWidth-this.box.offsetWidth;
//      this.yy=this.father.offsetHeight-this.box.offsetHeight;
//  }
//  
//  this.startX=0;
//  this.startY=0;
//  this.endX=0;
//  this.endY=0;
//  this.lenX=0;
//  this.lenY=0;
//}
////原型：共有方法
//drag.prototype={
//  drags:function(){
//      this.down();
//  },
//  down:function(){
//      var that=this;//this在事件外部，this指实例化对象
//      this.box.onmousedown=function(e){
//          //this在事件内部，this指事件源
//          var eve=e||window.evevt;
//          //阻止浏览器默认行为的方法
//          if(eve.preventDefault){//现代
//              eve.preventDefault();
//          }else{
//              eve.returnValue=false;
//          }
//          that.move();
//          that.up();
//          //that.ox=eve.offsetX;
//          //that.oy=eve.offsetY;
//          that.ox=eve.clientX-that.box.offsetLeft;
//          that.oy=eve.clientY-that.box.offsetTop;
//          //缓冲
//             that.startX=that.ox;
//             that.startY=that.oy;
//      }
//  },
//  move:function(){
//      var that=this;
//      document.onmousemove=function(e){
//          var eve=e||window.evevt;
//          if(eve.preventDefault){
//              eve.preventDefault();
//          }else{
//              eve.returnValue=false;
//          }
//          that.cx=eve.clientX;
//          that.cy=eve.clientY;
//          var x=that.cx-that.ox;
//          var y=that.cy-that.oy;    
//          //移动边界
//          // if(x<=0){x=0}
//          // if(x>=that.xx){x=that.xx}
//          // if(y<=0){y=0}
//          // if(y>=that.yy){y=that.yy}
//          if(that.x){
//              that.box.style.left=x+"px";
//          }
//          if(that.y){
//              that.box.style.top=y+"px";
//          } 
//              that.endX=x;
//              that.endY=y;
//              that.lenX=that.endX-that.startX;
//              that.lenY=that.endY-that.startY;
//              that.startX=that.endX;
//              that.startY=that.endY;
//      }
//  },
//  up:function(){
//      var that=this;
//      document.onmouseup=function(){
//          that.xishu=0.9;
//          if(that.animate){
//              var t=setInterval(function(){
//                  that.lenX*=that.xishu;
//                  that.lenY*=that.xishu;
//                  if(Math.abs(that.lenX)>=Math.abs(that.lenY)){
//                      if(Math.abs(that.lenX)<=1){
//                          clearInterval(t);
//                      }else if(Math.abs(that.lenY)<=1){
//                          clearInterval(t);
//                      }
//                  }
//                  //缓冲边界
//                  that.x1=that.lenX+that.box.offsetLeft;
//                  that.y1=that.lenY+that.box.offsetTop;
//                  if(that.x1<=0){that.x1=0}
//                  if(that.x1>=that.xx){that.x1=that.xx}
//                  if(that.y1<=0){that.y1=0}
//                  if(that.y1>=that.yy){that.y1=that.yy}
//                  that.box.style.left=that.x1+"px";
//                  that.box.style.top=that.y1+"px";
//              },60);
//          }
//          
//          document.onmousemove=null;
//          document.onmouseup=null;
//      }
//  }
//}
//
//var box=$(".wdb-son")[0];
//var fatherbox=$(".wdb-father")[0];
////实例化
//var obj=new drag(box,fatherbox,{x:true});  
//obj.drags();

})
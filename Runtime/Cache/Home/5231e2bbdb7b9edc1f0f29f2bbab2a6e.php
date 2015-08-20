<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><meta http-equiv="content-type" content="text/html;charset=utf-8">
<title><?php echo ($meta_title); ?>_<?php echo C('WEB_SITE_TITLE');?></title>
<head>
<link href="/Public/Home/css/top.css" rel="stylesheet">
<link href="/Public/Home/css/common.css" rel="stylesheet">
<link href="/Public/Home/css/tuan.css" rel="stylesheet">
<link href="/Public/Home/css/footer.css" rel="stylesheet">

<script type="text/javascript" src="/Public/Home/js/public.js"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.min.js"></script>
</head>
<body>
<!-- 工具条 -->
	<!-- 顶部工具条 -->
	<!-- /工具条 -->
	<!-- 头部 -->
	<div class="yershop_wrapper">
	 <!-- logo -->


<div class="header">
<a href="" class="logo" title="<?php echo C('WEB_SITE_TITLE');?>"><img src="/Public/Home/images/logo.png" alt="<?php echo C('WEB_SITE_TITLE');?>"></a>

<div class="header_center"  >
<div class="search">
<form action="<?php echo U("Search/index");?>" name="Searchform"  method="post" >

<p>
<input type="text" name="words" placeholder="输入您想要的商品" class="search"><a rel="nofollow" href="javascript:vod(0)" class="search_btn"></a></p>
<input type="hidden" name="type" id="type" value="1"></form>
</div>
<div class="tag">热门搜索：
<?php if(is_array($hotsearch)): foreach($hotsearch as $key=>$vo): ?><a href="<?php echo U('Search/index?words='.$vo);?>"><?php echo ($vo); ?></a><?php endforeach; endif; ?>
</div>
</div>

<div class="top_right">
<a rel="nofollow" href="<?php echo U('shopcart/index');?>" class="shopping_cart" id="shopping_cart" style="display:">购物车<span id="docerCartBtn" class="yellow"></span></a>
<?php if(is_login()): if(empty($usercart)): ?><div class="sc_goods"  id="goods" style="display:none;"><ul class="sc_goods_ul">
<p class="sc_goods_none" >您的购物车还是空的，赶紧行动吧！</p></ul>
<div class="sc_goods_foot" style="display: none;">
<a rel="nofollow" href="<?php echo U('shopcart/index');?>" class="my_shopping_cart_btn">查看我的购物车</a>
</div>
</div>
<?php else: ?>
<div class="sc_goods" id="goods" style="display:none;">
<ul class="sc_goods_ul">
<?php if(is_array($usercart)): $i = 0; $__LIST__ = $usercart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li> <dl>
<dt class="mini-img"><a  href="<?php echo U('Article/detail?id='.$vo['goodid']);?>"><img src="<?php echo (get_cover(get_cover_id($vo["goodid"]),'path')); ?>" width='40' height='40'/> </a></dt>
<dd><span class="mini_title"><a href="<?php echo U('Article/detail?id='.$vo['goodid']);?>"><?php echo (get_good_name($vo["goodid"])); ?></a> </span><span class="mini-cart-count red">¥<?php echo ($vo["price"]); ?><em class="<?php echo ($vo["sort"]); ?>">*<?php echo ($vo["num"]); ?></em></span></dd>
<dd><span class="mini-cart-info"><?php echo ($vo["parameters"]); ?></span><span class="mini-cart-del"><a name="<?php echo ($vo["sort"]); ?>" rel="del" href="javascript:vod(0);"  onclick="delcommon(event)">删除</a></span></dd>
</dl>
</li><?php endforeach; endif; else: echo "" ;endif; ?></ul>
<div class="sc_goods_foot" style="display:block;">
<a rel="nofollow" href="<?php echo U('shopcart/index');?>" class="my_shopping_cart_btn">查看我的购物车</a>
</div>
</div><?php endif; ?>


 <?php else: ?>


 

<?php if(empty($usercart)): ?><div id="goods" class="sc_goods" style="display:none;">
<ul class="sc_goods_ul">
<p class="sc_goods_none" >您的购物车还是空的，赶紧行动吧！</p>

</ul>
<div class="sc_goods_foot" style="display:none;">
<a rel="nofollow" href="<?php echo U('shopcart/index');?>" class="my_shopping_cart_btn">查看我的购物车</a>
</div></div>
<?php else: ?>
<div id="goods" class="sc_goods" style="display:none;">
<ul class="sc_goods_ul">
 <?php if(is_array($usercart)): foreach($usercart as $key=>$vo): ?><li> <dl>
<dt class="mini-img"><a  href="<?php echo U('Article/detail?id='.$vo['id']);?>"><img src="<?php echo (get_cover(get_cover_id($vo["id"]),'path')); ?>" width='40' height='40'/> </a></dt>
<dd><span class="mini_title"><a href="<?php echo U('Article/detail?id='.$vo['id']);?>"><?php echo (get_good_name($vo["id"])); ?></a> </span><span class="mini-cart-count red">¥<?php echo ($vo["price"]); ?><em class="<?php echo ($vo["sort"]); ?>">*<?php echo ($vo["num"]); ?></em></span></dd>
<dd><span class="mini-cart-info"><?php echo ($vo["parameters"]); ?></span><span class="mini-cart-del"><a name="<?php echo ($vo["sort"]); ?>" rel="del" href="javascript:vod(0);"   onclick="delcommon(event)">删除</a></span></dd>
</dl>
</li><?php endforeach; endif; ?>
</ul>
<div class="sc_goods_foot" style="display:block;">
<a rel="nofollow" href="<?php echo U('shopcart/index');?>"  class="my_shopping_cart_btn">查看我的购物车</a>
</div></div><?php endif; endif; ?>
</div></div>
	
	<!-- /头部 -->

	<!-- 菜单 -->
	<!-- 导航条-->

 <div class="menu-wrapper" >
    <div class="nav-all">
       <div class="all_class" id="all-class">
        <h2><span class="grid"><img src="/Public/Home/images/grid.png"></span><span>商品分类</span><b></b></h2>
      </div>
      <div class="all-goods" style="display: none;" id="all-goods">
<?php if(is_array($categoryq)): $i = 0; $__LIST__ = $categoryq;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><div class="item">
          <div class="product"><h4><a href="<?php echo U('home/article/index/category/'.$cate['name']);?>"><?php echo ($cate["title"]); ?></a> </h4> </div>
            <?php if($cate['child'] != false): ?><div class="product-wrap pos"> 
          
            <div class="cf">
              <div class="fl wd252 pr20">
              
                <?php if(is_array($cate['child'])): $i = 0; $__LIST__ = $cate['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate_sub): $mod = ($i % 2 );++$i;?><ul class="cf"> <li><span><a href="<?php echo U('home/article/lists/category/'.$cate_sub['name']);?>"><?php echo ($cate_sub["title"]); ?></a></span>
                   <?php if($cate_sub['child']): if(is_array($cate_sub['child'])): $i = 0; $__LIST__ = $cate_sub['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate_sub_two): $mod = ($i % 2 );++$i;?><a href="<?php echo U('home/article/lists/category/'.$cate_sub_two['name']);?>"><?php echo ($cate_sub_two["title"]); ?> </a><?php endforeach; endif; else: echo "" ;endif; endif; ?> 
              
                </li> </ul><?php endforeach; endif; else: echo "" ;endif; ?>
               
</div>
            </div> </div><?php endif; ?>
       
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
        
      </div></div>
    
    
    <ul class="menu">
      <?php $__NAV__ = M('Channel')->field(true)->where("status=1")->order("sort")->select(); if(is_array($__NAV__)): $i = 0; $__LIST__ = $__NAV__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i; if(($nav["pid"]) == "0"): ?><li>
                            <a href="<?php echo (get_nav_url($nav["url"])); ?>" target="<?php if(($nav["target"]) == "1"): ?>_blank<?php else: ?>_self<?php endif; ?>"><?php echo ($nav["title"]); ?></a>
                      </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    
  </div>
	<!-- /菜单 -->


	<!-- 主体 -->
	<div  class="commom_wrapper">

 
     
        <!-- Contents  -->
      
	  <div class="ml_content">
<div class="goodlist-main">
	  <div class="lists-position">
	  <div class="category-title">
	  <h4><span><?php echo ($category["title"]); ?>(<?php echo ($num); ?>)</span></h4>
	  <div class="category-child">
	  <?php if(empty($childlist)): else: ?>
	  <?php if(is_array($childlist)): $i = 0; $__LIST__ = $childlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span> <a href="<?php echo U('Article/lists/?category='.$vo['name']);?>"><?php echo ($vo["title"]); ?></a></span><?php endforeach; endif; else: echo "" ;endif; endif; ?>
</div>
</div>

 <div class="salesrank">
  <h5><span>销量排行</span></h5>
  <ul><?php if(is_array($sales)): $i = 0; $__LIST__ = $sales;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class="picture" href="<?php echo U('Article/detail?id='.$vo['id']);?>"><img src="<?php echo (get_cover(get_cover_id($vo["id"]),'path')); ?>"  ></a>
  <a class="title" href="<?php echo U('Article/detail?id='.$vo['id']);?>"> <?php echo (get_good_name($vo["id"])); ?></a>
  <span>￥<?php echo (get_good_price($vo["id"])); ?> </span>
  </li><?php endforeach; endif; else: echo "" ;endif; ?></ul>
  
  </div>
  <div class="salesrank">
  <h5><span>最近浏览</span></h5>
 <ul><?php if(is_array($recent)): $i = 0; $__LIST__ = $recent;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class="picture" href="<?php echo U('Article/detail?id='.$vo['page']);?>"><img src="<?php echo (get_cover(get_cover_id($vo["page"]),'path')); ?>"  ></a>
  <a class="title" href="<?php echo U('Article/detail?id='.$vo['page']);?>"> <?php echo (get_good_name($vo["page"])); ?></a>
  <span>￥<?php echo (get_good_price($vo["page"])); ?> </span>
  </li><?php endforeach; endif; else: echo "" ;endif; ?></ul>
 </div>
	  </div>
	   <div class="lists-area">
	 
       <ul class="ml_content_top"><li <?php if(($order) == "1"): ?>class="active"<?php else: endif; ?>><a rel="nofollow" url="<?php echo U('article/index','order=1'.'&sort='.$see);?>" href="<?php echo U('Article/index','category='.$category['name'].'&order=1'.'&sort='.$see);?>" class="<?php echo ($value); ?>">热度<i></i></a></li><li <?php if(($order) == "2"): ?>class="active"<?php else: endif; ?>><a rel="nofollow" href="<?php echo U('Article/index','category='.$category['name'].'&order=2'.'&sort='.$see);?>"  class="<?php echo ($value); ?>">最新<i></i></a></li><li <?php if(($order) == "3"): ?>class="active"<?php else: endif; ?>><a rel="nofollow" href="<?php echo U('Article/index','category='.$category['name'].'&order=3'.'&sort='.$see);?>"  class="<?php echo ($value); ?>">价格<i></i></a></li><li <?php if(($order) == "4"): ?>class="active"<?php else: endif; ?>><a rel="nofollow" href="<?php echo U('Article/index','category='.$category['name'].'&order=4'.'&sort='.$see);?>"  class="<?php echo ($value); ?>">销量<i></i></a></li></ul> 
	  
	  <ul class="goodlist">
      
         <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><li class="face" onmouseover="this.className='facehover'" onmouseout="this.className='face'">
                    <a href="<?php echo U('Article/detail?id='.$list['id']);?>" class="list-img"> <img src="<?php echo (get_cover($list["cover_id"],'path')); ?>"/></a>
             <p> <a href="<?php echo U('Article/detail?id='.$list['id']);?>" class="t2"> <?php echo ($list["title"]); ?></a></p>     
                       <p><span class="red" title="预览：<?php echo (get_good_price($list["id"])); ?>">价格：￥<?php echo ($list["price"]); ?></span></p> 

              </li><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
			</ul>
		  	<!-- 分页 -->
        <div class="page">
<?php echo ($page); ?>
        </div>	
			
			</div>
	  </div>
	  
	 </div>

         
        </section>
 	

 </div>
	<!-- 主体 -->

  <!-- 购物车js -->
   	<script>
	//购物车显示与隐藏
	 var Shopcart= document.getElementById('shopping_cart');
     var Goodsmenu= document.getElementById('goods');
            var timerr = null;//定义定时器变量
            //鼠标移入div1或div2都把定时器关闭了，不让他消失
            Shopcart.onmouseover =Goodsmenu.onmouseover = function ()
            {
                Goodsmenu.style.display = 'block';
                clearTimeout(timerr);
            }
            //鼠标移出div1或div2都重新开定时器，让他延时消失
            Shopcart.onmouseout =Goodsmenu.onmouseout = function ()
            {
                //开定时器
                timerr= setTimeout(function () { 
                    Goodsmenu.style.display = 'none'; }, 10);
            }
			
//购物车动态删除
	function delcommon(event)
		{ //获取事件源
event = event ? event : window.event; 
var obj = event.srcElement ? event.srcElement : event.target; 
//这时obj就是触发事件的对象，可以使用它的各个属性 
//还可以将obj转换成jquery对象，方便选用其他元素 
str = obj.innerHTML.replace(/<\/?[^>]*>/g,''); //去除HTML tag

	var $obj = $(obj);
	var str=$obj.parent().prev().html();
	if(obj.rel=="del")
{ var str=obj.name;
var uexist="<?php echo get_username();?>";
	//全选的实现 定义删的发送路径
	if(uexist){
		var del='<?php echo U("Shopcart/delItemByuid");?>';	
	}
else{
var del='<?php echo U("Shopcart/delItem");?>';
	
	}

$.ajax({
type:'post', //传送的方式,get/post
url:del, //发送数据的地址
data:{sort:str},
 dataType: "json",
success:function(data)
{var $obj = $(obj);
	$obj.parents("li").remove();
	if(data.sum=="0"){  //判断购物车数量是否为0，为0则隐藏底部查看工具
						$("div.sc_goods_foot").hide();
					   	var html='<p class="sc_goods_none" >您的购物车还是空的，赶紧行动吧！</p>';
					   $("ul.sc_goods_ul").html(html);
				
	
	}
	else{$("div.sc_goods_foot").show();}

},
error:function (event, XMLHttpRequest, ajaxOptions, thrownError) {
alert(XMLHttpRequest+thrownError); }
		})
}
	
	} 
//购物车删除结束


	
</script>
   <!-- /购物车js -->

	<!-- 底部 -->
	<div class="foot">
    <ul>
        <li><a href="index.html">积分商城首页</a></li>
        <li><a href="gift.html">积分礼品</a></li>
        <li><a href="ticket.html">积分换券</a></li>
        <li><a href="activity.html">礼品活动</a></li>
    </ul>
    <div class="clear"></div>
    <p>Copyright© 2008-2014 bodo.com，All Rights Reserved 版权所有天津宝岛电动车 津ICP备12345678号-1  使用本网站即表示接受宝岛用户协议。</p>
</div><!--foot end--></div>
	<!-- /底部 -->
</body>
</html>
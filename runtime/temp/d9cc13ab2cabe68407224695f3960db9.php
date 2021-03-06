<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:96:"C:\AppServ\www\hf171029-stage4\hf1710-justgo\public/../application/index\view\traveldetails.html";i:1526452945;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>商品详情</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="__STATIC__/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="__CSS__/public.css">
    <link rel="stylesheet" type="text/css" href="__CSS__/travelmall.css">
    <script src="__STATIC__/layui/layui.js"></script>
    <script type="text/javascript" src = '__JS__/jquery-3.2.1.min.js'></script>
</head>

<body>
<!--导航开始-->
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo layui-layout-left">
            <a href="#" class="nav_logo"></a>
        </div>
        <ul class="layui-nav layui-layout-left"  lay-filter="demo">
            <li class="layui-nav-item"><a href="#">首页</a></li>
            <li class="layui-nav-item "><a href="#">目的地</a></li>
            <li class="layui-nav-item layui-this"><a href="#">旅行商城<span class="layui-badge-dot"></span></a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">社区</a>
                <dl class="layui-nav-child"> <!-- 二级菜单 -->
                    <dd><a href="#">结伴</a></dd>
                    <dd><a href="#">游记</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right" id="nav_user"  lay-filter="nav_user">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    贤心
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="#" id="loginOut">注销</a></li>
        </ul>
    </div>
</div>
<!--导航结束-->

<!--主体内容-->
<div class="layui-container">
	<!--小导航-->
	<div class="layui-row becenter" style="margin: 30px;">
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="">丽江</a>
		  <a href="">兰州</a>
		  <a href="">成都</a>
		  <a href="">秒杀ing</a>
		  <a href="">热门活动</a>
		  <a href="">高赞游记</a>
		</span>
	</div>
	
	<!--搜索框-->
	<div class="layui-row becenter" style="margin: 30px;">
		<div class="layui-inline">
			<input style="width: 600px;" placeholder="输入景点名或目标城市" class="layui-input" >
		</div>
		<button placeholder="输入景点名或者目标城市" id="search" class="layui-btn layui-btn-warm" data-type="reload">
			<i class="layui-icon layui-icon-search"></i>搜索
		</button>
	</div>
	
	<!--面包屑导航-->
	<div class="layui-row">
		<span class="layui-breadcrumb">
		  <a href="<?php echo url('index/index/index'); ?>">首页</a>
		  <a href="<?php echo url('index/goods/travelmall'); ?>">旅行商城</a>
		  <a><cite><?php echo $goodsdetail['name']; ?></cite></a>
		</span>
	</div>
	<br />
	
	<div class="layui-row layui-col-space2">
		<div class="layui-col-md4">
			<img src="<?php echo $goodsdetail['image']; ?>" />
		</div>
		<div class="layui-col-md6">
			<p class="goodsname"><?php echo $goodsdetail['name']; ?></p>
			<div class="forprice">￥<?php echo $goodsdetail['price']; ?></div>
			<p style="margin: 10px;">归属城市：<?php echo $goodsdetail['locate']; ?></p>
			<p style="margin: 10px;">使用说明：<span class="grayminis">此产品为限期产品，请在确认收货后的15天内，到指定景点售票处/取票机凭码兑换票据。</span></p>
			<form class="layui-form">
				<div class="layui-form-item" style="margin: 10px; ">
					<img src="http://p8int7f8g.bkt.clouddn.com/%E5%87%8F.png" />
					<input name="quantity" lay-verify="required|number|positiveint" style="width: 52px; height: 25px; text-align: center;" value="1">
					<img id="more" src="http://p8int7f8g.bkt.clouddn.com/%E5%8A%A0.png" />
					<span class="grayminis"> 件（库存<?php echo $goodsdetail['quantity']; ?>件）</span>
				</div>
				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="layui-btn layui-btn-primary" lay-submit lay-filter="add2cart" ><img src="http://p8int7f8g.bkt.clouddn.com/%E8%B4%AD%E7%89%A9%E8%BD%A6.png" /> 加入购物车</button>
						<button class="layui-btn layui-btn-warm" lay-submit lay-filter="buynow" id = 'buynow' type='button'>立即购买</button>
					</div>
				</div>
				<!--隐藏表单-->
					<input type="hidden" id="goodsid" name="goodsid" value="<?php echo $goodsdetail['goodsid']; ?>" />
			</form>
		</div>
	</div>
	
	<div class="layui-row">
		<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
			<ul class="layui-tab-title" id="theScroll" style="position: sticky; top: 0;">
				<li class="layui-this">
					产品介绍
					<!--<a href="#one">产品介绍</a>-->
				</li>
				<li>
					购买须知
					<!--<a href="#two">购买须知</a>-->
				</li>
				<li>
					用户点评
					<!--<a href="#three">用户点评</a>-->
				</li>
			</ul>
			<!--购买须知-->
			<div class="layui-tab-content">
				<!--产品介绍-->
				<div class="layui-tab-item layui-show">
					<h1>产品介绍</h1>
					<p><?php echo $goodsdetail['intro']; ?></p>
				</div>
				<div class="layui-tab-item">
					<h1>购买须知</h1>
					<div>
						<p>退改政策</p>
						<p>此产品为二次确认产品，在兑换成实票或到期时间24小时前，前可按照下列规则退改随时退。</p>
						<p>此产品一经过期或兑换成纸质票之后，不可退改，敬请谅解</p>
					</div>
					<ul>
						<li>
							重要提示
							<ol>
								<li>1. 此产品只适用于有自理能力的成年人。</li>
								<li>2. 马蜂窝尊重并保护用户隐私，用户信息除出票景点和马蜂窝不会转告第三方</li>
								<li>3. 据国家相关法规，若因人力不可抗拒的因素而造成对行程的影响，将协助游客进行解决， 但不承担相应损失，若因此而增加的费用，敬请游客自己承担。</li>
							</ol>
						</li>
						产品服务信息
						<p>该旅游产品由 中国旅游办公室 提供</p>
					</ul>
				</div>
				
				<!--用户评论-->
				<div class="layui-tab-item">
					<div id="goodsComments">
						
					</div>
					<div id="page"></div>
				</div>
			</div>
		</div>
	</div>
	
	
</div>


<!--页脚-->
<div id="footer">
    <div class="ft_content">
        <div class="ft_info">
            <dl class="ft-info-col ft-info-intro">
                <dt>全球旅游消费指南 </dt>
                <dd>覆盖全球200多个国家和地区</dd>
                <dd><strong>100,000,000</strong> 位旅行者</dd>
                <dd><strong>920,000</strong> 家国际酒店</dd>
                <dd><strong>21,000,000</strong> 条真实点评</dd>
                <dd><strong>382,000,000</strong> 次攻略下载</dd>
                <dd><a class="highlight" href="http://www.mafengwo.cn/activity/sales_report2017/index" target="_blank">中国旅游行业第一部“玩法”</a></dd>
            </dl>
            <dl class="ft-info-col ft-info-about">
                <dt>关于我们</dt>
                <dd><a href="http://www.mafengwo.cn/s/about.html" rel="nofollow">关于马蜂窝</a></dd>
                <dd><a href="http://www.mafengwo.cn/s/property.html" rel="nofollow">网络信息侵权通知指引</a></dd>
                <dd><a href="http://www.mafengwo.cn/s/private.html" rel="nofollow">隐私政策</a><a href="http://www.mafengwo.cn/s/agreement.html" rel="nofollow" class="m_l_10">服务协议</a></dd>
                <dd><a href="http://www.mafengwo.cn/s/contact.html" rel="nofollow">联系我们</a></dd>
                <dd><a href="http://www.mafengwo.cn/s/sitemap.html" target="_blank">网站地图</a></dd>
                <dd><a class="joinus highlight" title="马蜂窝团队招聘" target="_blank" href="http://www.mafengwo.cn/s/hr.html" rel="nofollow">加入马蜂窝</a></dd>
            </dl>
            <dl class="ft-info-col ft-info-service">
                <dt>旅行服务</dt>
                <dd>
                    <ul class="clearfix">
                        <li><a target="_blank" href="http://www.mafengwo.cn/gonglve/">旅游攻略</a></li>
                        <li><a target="_blank" href="http://www.mafengwo.cn/hotel/">酒店预订</a></li>
                        <li><a target="_blank" href="http://www.mafengwo.cn/sales/">旅游特价</a></li>
                        <li><a target="_blank" href="http://zuche.mafengwo.cn/">国际租车</a></li>
                        <li><a target="_blank" href="http://www.mafengwo.cn/wenda/">旅游问答</a></li>
                        <li><a target="_blank" href="http://www.mafengwo.cn/insure/">旅游保险</a></li>
                        <li><a target="_blank" href="http://z.mafengwo.cn">旅游指南</a></li>
                        <li><a target="_blank" href="http://huoche.mafengwo.cn">订火车票</a></li>
                        <li><a target="_blank" href="http://www.mafengwo.cn/travel-news/">旅游资讯</a></li>
                        <li><a target="_blank" href="http://www.mafengwo.cn/app/intro/gonglve.php">APP下载</a></li>
                        <li style="width: 120px;"><a target="_blank" href="http://www.mafengwo.cn/sales/alliance.php" class="highlight">旅行商城全球商家入驻</a></li>
                    </ul>
                </dd>
            </dl>
        </div>
    </div>
</div>
<!--页脚结束-->


</body>

<script>
	/*请求评论总条数*/
	$.ajax({
		type:"get",
		url:"<?php echo url('index/goods/getcounts'); ?>",
		dataType:'json',
		data:{goodsid:$('#goodsid').val()},
		success:function(res){
			pageTurning(res,$('#goodsid').val());
		}
	});
	
	/*评论翻页*/
	function pageTurning(counts,goodsid){
    	layui.use(['element','jquery','laypage'], function(){
	        var element = layui.element
	        ,$ = layui.jquery
	        ,laypage = layui.laypage;
	        
	        laypage.render({
		    elem: 'page'
		    ,count: counts
		    ,limit: 10
		    ,layout: ['count', 'prev', 'page', 'next', 'limit', 'refresh', 'skip']
		    ,jump: function(obj){
		    	$.ajax({
					type:"post",
					url:"<?php echo url('index/goods/pageTurning'); ?>",
					dataType:'json',
					data:{nowpage:obj.curr,limit:obj.limit,goodsid:goodsid},
					success:function(res){
						$('#goodsComments').empty();
						for(var i=0; i<res.length; i++)
						{
							if(res[i].recommend=="yes"){
								var $src = "http://p8int7f8g.bkt.clouddn.com/%E7%82%B9%E8%B5%9E%20%283%29X16.png", recommend="值得推荐";
							}else{
								var $src = "http://p8int7f8g.bkt.clouddn.com/%E7%82%B9%E8%B5%9E%20%282%29X16.png",recommend="不推荐";
							}
							
							$('<div class="layui-card"><div class="layui-card-header" style="display: flex; justify-content: space-between;"><span><img src='+res[i].uIcon+' style="height: 45px;"/>'+res[i].uname+'</span><div><span><img  src='+$src+' />'+recommend+'</span></div><div>'+res[i].time+'</div></div><div class="layui-card-body">'+res[i].content+'</div></div>').appendTo($('#goodsComments'));
							
						}
						
					}
				});
		    }
		  });
    	})

    }
	
    layui.use(['element','jquery','form','layer'], function(){
        var element = layui.element
        ,layer = layui.layer
        ,$ = layui.jquery
        ,form = layui.form;
        
    	//监听提交（立即购买）
		form.on('submit(buynow)', function(data){
			console.log(data.field)
			var temp = [];
			temp.push({
				goodsid:data.field.goodsid,
				quantity:data.field.quantity
			});
		    $.ajax({
		    	type:"post",
		    	url:"<?php echo url('index/goods/orderInfoConfirm'); ?>",
		    	data:'data='+JSON.stringify(temp),
		    	dataType:'json',
		    	success:function(res){
		    		if(res){
		    			location.href="<?php echo url('index/goods/travelconfirm'); ?>";
		    		}
		    	}
		    });
		    return false;
		});
		
		//监听提交（加入购物车）
		form.on('submit(add2cart)', function(data){
		    $.ajax({
		    	type:"post",
		    	url:"<?php echo url('index/goods/add2cart'); ?>",
		    	data:data.field,
		    	dataType:'json',
		    	success:function(res){
		    		if(res.code=="205"){
		    			layer.msg(res.message, {icon: 6});
		    			/*layer.confirm(res.message+'前往查看?', {icon: 3, title:'提示'}, function(index){
		    				location.href="#"; //购物车页面
		    				layer.close(index);
						});*/
		    		}else{
		    			layer.msg(res.message, {icon: 5});
		    		}
		    		
		    	}
		    });
		    return false;
		});
	  
	  //自定义验证规则
	  form.verify({
	    positiveint:[
	    	/^\+?[1-9]\d*$/
	    	,'数量格式不正确，请重输！'
	    ]
	  });
    });
	
    

</script>

</html>
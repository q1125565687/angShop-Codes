<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="手机网" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<title>Online Shopping website - Powered by ECShop</title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="/20160608--Exercise/shop/web/Public/Home/css/member.css" rel="stylesheet" type="text/css" media="screen" />
<link href="/20160608--Exercise/shop/web/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="header">	
	<div class="header_top">
	<div class="header_top_l"></div>
		<div class="header_top_m" >
						<div style='float:left' id="ECS_MEMBERZONE">
				WELCOME　　　　<a href="#">Login</a> | <a href="#">Register</a>

				<label id="myaccount"><a href="#" >My Account</a></label>
				<label id="helpcenter"><a href="#">Help Center</a></label>
			</div>
			<div style='float:right'>
				<label id="collect"><a href="#" >Add to Favorites</a></label>
				<label id="sethome"><a href="#"  onclick="SetHome(this,window.location)">Set as Homepage</a></label>
			</div>

			<div class='clear'></div>
		</div>  
		<div class="header_top_r"></div>
		<div class="clear"></div>
	</div>
	<div class="logo"><a href="#"><img src="/20160608--Exercise/shop/web/Public/Home/images/logo.gif"></a></div>
	<div class="header_intro"><img src="/20160608--Exercise/shop/web/Public/Home/images/by_top.gif"></div>
	<div class="headerdg">
		<em>Hot Line（7*24）</em>

		<p><img src="/20160608--Exercise/shop/web/Public/Home/images/tel1.gif"></p>
	</div>
</div>
<div id="nav">
	<div class="nav_m">
		<ul>
			<li><a href="<?php echo U('Home/Index/index');?>" >HOME</a></li>
						<li><a href="#"   id="navbg">GSM Phone</a></li>
						<li><a href="#"  >Dual-mode Phone</a></li>

						<li><a href="#"  >Mobile Accessories</a></li>
						<li><a href="#"  >Message Board</a></li>
					</ul>
	</div>
	<DIV class="navr_recent" >
		<SPAN class="navr_recent_l1">　</SPAN> 
		<A onmousedown="bubble(event);" href="javascript:void(0);" name="myliulan">
		<a href="#" title="查看购物车"><a href="#" title="查看购物车">There are 0 pieces goods in your shopping cart, total $0.00</a></a></A>

		<EM>&nbsp;&nbsp;&nbsp;&nbsp;</EM> 
	</DIV>
	<div class="clear"></div>
</div>

<div class="nav_min_div" id="min_div" >
<img src="/20160608--Exercise/shop/web/Public/Home/images/top_min.jpg"></div>

<div class="content">
	<div class="user">
		<div class="menu">当前位置: <span><a href=".">首页</a> <code>&gt;</code> 购物流程</span></div>
		
<!--   显示 ：											-->		
		<div class="shop">
			<div class="shopend">
				<div class="shopendsuc">
					<h1>Thank you for shopping in this store!Your order has been submitted successfully, please remember your order number<?php echo ($sn); ?></h1>
					<h2></h2>
				</div>
				<div class="shopend_bg" style="padding-left:220px">
					You choose for delivery way: <strong>Express Delivery</strong><br />
					The selected payment method for you: <strong>Bank remittance/transfer</strong><br />

					The accounts payable amount to you: <strong style="color:#ff0000">$<?php echo ($money); ?></strong><br>
					<?php echo ($payform); ?> 

<!-- 进入在线支付 ?? $payform --> 

					</div>
					<div class="shopend_bg" style="padding-left:0px"><p style="text-align:center; margin-bottom:20px;">
						You can <a href="index.php">Back to Home</a> or <a href="user.php">User Center</a></p>
					</div>
				</div>
			</div>
			</div>
</div>
<div class="footert">
	<div class="footertl">
		<div class="footert_1"><img src="/20160608--Exercise/shop/web/Public/Home/images/logo21.gif"></div>
		<div class="footert_2"> Hot Line（9:00-18:00）
		  <p><img src="/20160608--Exercise/shop/web/Public/Home/images/tel2.gif"></p>
		</div>
	</div>
	<div class="footertr">
		<div class="footertr_t">Real online direct marketing mall, good boring bought sold by cell phone are all manufacturers supply directly, without any intermediate wholesale. And distribution links, let you with the lowest price, buy the most valuable phone.</div>

		<div class="footertr_b">
			<dl class="footertr_d1">
				<dt></dt>
				<dd>会员积分计划</dd>
			</dl>
			<dl>
				<dt></dt>
				<dd>免费订购热线</dd>

			</dl>
			<dl class="footertr_d3">
				<dt></dt>
				<dd>3000城市送货上门</dd>
			</dl>
			<dl class="footertr_d4">
				<dt></dt>
				<dd>品牌厂商直接供货</dd>

			</dl>
			<dl class="footertr_d5">
				<dt></dt>
				<dd>中国人保承保</dd>
			</dl>
		</div>
		<div class="clear"></div>
	</div>

	<div class="clear"></div>
</div>
<div class="footer">
        <div class="foottop">
<dl>
  <dt>新手上路 </dt>
    <dd><a href="#" title="售后流程">售后流程</a></dd>
    <dd><a href="#" title="购物流程">购物流程</a></dd>
    <dd><a href="#" title="订购方式">订购方式</a></dd>

  </dl>
<dl>
  <dt>手机常识 </dt>
    <dd><a href="#" title="如何分辨原装电池">如何分辨原装电池</a></dd>
    <dd><a href="#" title="如何分辨水货手机 ">如何分辨水货手机</a></dd>
    <dd><a href="#" title="如何享受全国联保">如何享受全国联保</a></dd>
  </dl>

<dl>
  <dt>配送与支付 </dt>
    <dd><a href="#" title="货到付款区域">货到付款区域</a></dd>
    <dd><a href="#" title="配送支付智能查询 ">配送支付智能查询</a></dd>
    <dd><a href="#" title="支付方式说明">支付方式说明</a></dd>
  </dl>
<dl>
  <dt>会员中心</dt>

    <dd><a href="#" title="资金管理">资金管理</a></dd>
    <dd><a href="#" title="我的收藏">我的收藏</a></dd>
    <dd><a href="#" title="我的订单">我的订单</a></dd>
  </dl>
<dl>
  <dt>服务保证 </dt>
    <dd><a href="#" title="退换货原则">退换货原则</a></dd>

    <dd><a href="#" title="售后服务保证 ">售后服务保证</a></dd>
    <dd><a href="#" title="产品质量保证 ">产品质量保证</a></dd>
  </dl>
<dl>
  <dt>联系我们 </dt>
    <dd><a href="#" title="网站故障报告">网站故障报告</a></dd>
    <dd><a href="#" title="选机咨询 ">选机咨询</a></dd>

    <dd><a href="#" title="投诉与建议 ">投诉与建议</a></dd>
  </dl>
<div class="foottop_r" onClick="window.location.href = '#'"></div>
<div class="clear"></div>
</div>    
	
<div class="footbot">
              <a href="#" >免责条款</a>
                   |
                      <a href="#" >隐私保护</a>

                   |
                      <a href="#" >咨询热点</a>
                   |
                      <a href="#" >联系我们</a>
                   |
                      <a href="#" >公司简介</a>
                   |
                      <a href="#" >批发方案</a>
                   |
                      <a href="#" >配送方式</a>

                  <p>&copy; 2005-2011 ECSHOP 版权所有，并保留所有权利。</p>
  <div class="clear"></div>
</div>
<div class="clear"></div></div>
</body>
</html>
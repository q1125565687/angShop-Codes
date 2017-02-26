<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="手机网" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<title>Online Shopping website - Powered by Ming</title>
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
		<a href="#" title="查看购物车"><a href="#" title="查看购物车">here are 0 pieces goods in your shopping cart, total $0.00</a></a></A>

		<EM>&nbsp;&nbsp;&nbsp;&nbsp;</EM> 
	</DIV>
	<div class="clear"></div>
</div>

<div class="nav_min_div" id="min_div" >
<img src="/20160608--Exercise/shop/web/Public/Home/images/top_min.jpg"></div>

<div class="content">
	<div class="user">
		<div class="menu">Current Position: <span><a href=".">HOME</a> <code>&gt;</code>Shopping Process</span></div>
		
<!-- 提交订单， done 完成方法	-->

			<form  method="post" action="<?php echo U('Home/Flow/done');?>">

			<div class=shop>
			<div class=shoporder>
				<div id=step_2>
					<div class=linebt><span>The consignee information</span><em></em></div>
					<div class="tfmain_m">
						<div class="shoporder_mdiv">
							<div class="tfmain_mdivm" id="step_2_address">
								<p>Consignee's Name and Address：<input type="text"  name="xm" /></p>
								<p>Phone Number：<input type="text"  name="mobile" /></p>
							
							
								<p>&nbsp;&nbsp;&nbsp;&nbsp;Address：<input type="text"  name="address" /></P>

								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>


				<!--
				<dl>  注释：
				<dt>收货时间：</dt>
				<dd><input name="sendtime" type="radio" value="0" str="工作日、双休日与假日均可送货" checked="true">工作日、双休日与假日均可送货</dd>
				<dd><input name="sendtime" type="radio" value="1" str="只工作日送货（双休日、假日不用送）">只工作日送货（双休日、假日不用送）（注：写字楼/商用地址客户请选择）</dd>
				<dd><input name="sendtime" type="radio" value="2" str="学校地址/地址白天没人，请尽量安排其他时间送货">学校地址/地址白天没人，请尽量安排其他时间送货（注：特别安排可能超出预计送货天数）</dd>
				</dl>
			-->
	
			<div id="step_6">
			<div class="linebt"><span id="step3">Payment Method</span><em></em></div>
			<div class="tfmain_m">
			<div class="shoporder_mdiv">

			<div class="tfmain_mdivm" style="overflow:hidden;height:auto;padding-bottom:10px;">

			<dl class="shipping_method"><input id="shopping_info" type="hidden" value="0<---->" name="shopping_info"> 

			<!-- <dd></dd>  分割虚线  -->

				<span class="left1 left"><input type="radio" name="paytype" value='1' />Online Payment</span> 

				<span class="clear"></span>

				<span class="left1 left"><input type="radio" name="paytype" value='2' checked="checked" /> Pay on Delivery</span> 

				<span class="clear"></span>

			 </dl>

			</div>
			</div>
			</div>
			</div>

			<div id=step_7>
			<div class=linebt><span>Product List</span><em></em></div>

			<ul class="orderm_b">
			  <li class="orderm_num">Number </li>
			  <li class="orderm_zjd">Product Name </li>
			  <li class="orderm_zt">Color </li>
			  <li class="orderm_xq">Quantity </li>
			  <li class="orderm_zf">Shop Price</li>
			  <li class="orderm_zf">Subtotal<div class="clear"></div></li>
			</ul>

			<!--
			<dl>  注释：
			一个商品，一个<ul> ??   经常 . 语法不支持，用[] 
			</dl>
		-->

			<?php if(is_array($goods)): foreach($goods as $k=>$g): ?><ul>
			  <li class=orderm_num><?php echo ($k); ?></li>
			  <li class=orderm_zjd>
				<a href="goods.php?id=32" target="_blank"><?php echo ($g["goods_name"]); ?></a><br />
				<font style="font-size:12px">Support cash on delivery</font>
			  </li>
			  <li class=orderm_zt>Color</li>
			  <li class=orderm_xq><?php echo ($g["num"]); ?></li>
			  <li class=orderm_zf><?php echo ($g["shop_price"]); ?></li>
			  <li class=orderm_zf><?php echo ($g[shop_price] * $g[num]); ?></li>
			  <div class='clear'></div>
			</ul><?php endforeach; endif; ?>

			<div class=contno>
			<div class='contno_l'><span>Small amount of shopping: $<?php echo ($money); ?></span></div>
			<div class='contno_r'><a class=f6 href="flow.php">Back to the shopping cart, add or delete items</a></div>
			<div class=clear></div>
			</div>
			</div>
			<div id=step_6 style="margin-top: 10px">
			<div class=linebt><span id=step3>Other Information</span><em></em></div>
			<div class=tfmain_m>
			<div class=shoporder_mdiv>
			<div class=tfmain_mdivm>
			<dl class="shipping_method" style="overflow:hidden;height:auto;">
				<dd>
				  <span class=left>Order Postscript:</span> 
				  <span class=left>
					<textarea id="postscript" style="border-right: #ccc 1px solid; border-top: #ccc 1px solid; border-left: #ccc 1px solid; border-bottom: #ccc 1px solid" name="note" rows=3 cols=80></textarea> 
				  </span>
				  <span class='clear'></span>
				</dd>
			</dl>
			</div>
			</div>
			</div>
			</div>
			<div id='step_6'>
			<div class=linebt><span id='step3'>Total Price</span><em></em></div>
			<div class=tfmain_m>
				<div class='shoporder_mdiv'>
					<div class='tfmain_mdivm'>
						<div id='ECS_ORDERTOTAL' style="padding-bottom: 20px; text-align: right">
						 Total: <font class=f4_b>$<?php echo ($money); ?></font> <br>
						The accounts payable amount: <font class=f4_b>$<?php echo ($money); ?></font> <br>
					</div>
				</div>
			</div>
			</div>
			</div>
			<input type=hidden value=done name=step> 
			<div class='shoporder_enter'>
			Please confirm that the above information, after the order will not be able to modify<br>
			<button class="buttonredb" id="overbutton" name="button_enter" type="submit">Check Out</button>
			</div>
			</div>
			</div>
			</form>
		
			</div>
</div>

<div class="footert">
	<div class="footertl">
		<div class="footert_1"><img src="/20160608--Exercise/shop/web/Public/Home/images/logo21.gif"></div>
		<div class="footert_2"> 抢购热线（9:00-18:00）
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
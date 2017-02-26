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

<style>
    #pic_id{
        width: 245px;
        height: 60px;
    }   
</style>

</head>

<body>
<div id="header">	
	<div class="header_top">
	<div class="header_top_l"></div>
		<div class="header_top_m" >
						<div style='float:left' id="ECS_MEMBERZONE">
				                    WELCOME
                    <label id="jmlabel">
                    <a href="<?php echo U('Home/User/reg');?>">
                        Login
                    </a></label>
                    |
                    <a href="<?php echo U('Home/User/reg');?>">
                        Register
                    </a>
                    <label id="myaccount1">
                        <a href="<?php echo U('Admin/Index/index');?>">
                            Maintain
                        </a>
                    </label>
                    <label id="helpcenter">
                        <a href="#">
                            Help Center
                        </a>
                    </label>
			</div>

			<div class='clear'></div>
		</div>  
		<div class="header_top_r"></div>
		<div class="clear"></div>
	</div>
	<div class="logo">
        <a href="#">
            <img src="/20160608--Exercise/shop/web/Public/Home/images/bussines-logo.jpg" alt="LOGO"  id="pic_id" />
    </a></div>
	<div class="header_intro"><img src="/20160608--Exercise/shop/web/Public/Home/images/by_top.gif"></div>
	<div class="headerdg">
		<em>Hot Line（7*24）</em>

		<p><img src="/20160608--Exercise/shop/web/Public/Home/images/tel1.gif"></p>
	</div>
</div>
    <div id="nav">
        <div class="nav_m">
            <ul>
                <li>
                    <a href="<?php echo U('Home/Index/index');?>">
                        Home
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Home/Index/cat/cat_id/2' , 1);?>">
                        iPhone
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Home/Index/cat/cat_id/3' , 2);?>">
                        Samgung
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Home/Index/cat/cat_id/4' , 2);?>">
                        HUAWEI
                    </a>
                </li>
                <li>
                    <a href="#">
                         Message Board
                    </a>
                </li>
            </ul>
        </div>
        <DIV class="navr_recent">
            <SPAN class="navr_recent_l1">
                　
            </SPAN>
            <A onmousedown="bubble(event);" href="#" name="myliulan">
                <a href="#" title="Check Shopping Cart">
                    <a href="#" title="Check Shopping Cart">
                        There are 0 pieces goods in your shopping cart, total $0.00
                    </a>
                </a>
            </A>
            <EM>
                &nbsp;&nbsp;&nbsp;&nbsp;
            </EM>
	</DIV>
	<div class="clear"></div>
</div>

<div class="nav_min_div" id="min_div" >
<img src="/20160608--Exercise/shop/web/Public/Home/images/top_min.jpg"></div>

<div class="content">
	<div class="user">
		<div class="menu"><strong>Current Position: </strong>
            <span><a href="<?php echo U('Home/Index/index');?>">HOME</a> <code>&gt;</code>Ordering Process</span></div>
		
<!--   显示 ：											-->		
		<div class="shop">
			<div class="shopend">
				<div class="shopendsuc">
					<h1>Your order has been submitted successfully, please remember your order number<?php echo ($sn); ?></h1>
				</div>
				<div class="shopend_bg" style="padding-left:220px">
					You choose for delivery way: <strong>Express Delivery</strong><br />
					The selected payment method: <strong>Bank remittance/transfer</strong><br />
					The accounts payable amount: <strong style="color:#ff0000">$<?php echo ($money); ?></strong><br>
					<?php echo ($payform); ?> 

<!-- 进入在线支付 ?? $payform --> 
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="footer">

        <div class="footbot">
            <a href="#">
                Exceptions clause
            </a>
            |
            <a href="#">
                 Privacy Policy
            </a>
            |
            <a href="#">
                Advisory
            </a>
            |
            <a href="#">
                Contact Us
            </a>
            |
            <a href="#">
                Company Introduction
            </a>
            |
            <a href="#">
               Wholesale scheme
            </a>
            |
            <a href="#">
                Delivery Method
            </a>
            <p style="text-align:center; font-size: 14px; font-family: '微软雅黑', sans-serif;"><br />
                on ThinkPHP - Fast & Simple OOP PHP Framework by <a href="http://jingwest2637.netne.net">jingwest2637.netne.net</a> @Vancouver BC  2016
            </p>
                  <p>&copy; 2005-2011 ECSHOP 版权所有，并保留所有权利。</p>



  <div class="clear"></div>
</div>
<div class="clear"></div></div>
</body>
</html>
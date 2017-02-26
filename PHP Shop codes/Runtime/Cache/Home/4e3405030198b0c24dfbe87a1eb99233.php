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
            <div class="header_top_l">
            </div>
            <div class="header_top_m">
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
                <div style='float:right'>
                    <label id="collect">
                        <a href="#">
                            Add to Favorites
                        </a>
                    </label>
                    <label id="sethome">
                        <a href="#" onclick="SetHome(this,window.location)">
                            Set as Homepage
                        </a>
                    </label>
                </div>
                <div class='clear'>
                </div>
            </div>
            <div class="header_top_r">
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="logo">
            <a href="#">
                <img src="/20160608--Exercise/shop/web/Public/Home/images/bussines-logo.jpg" alt="LOGO"  id="pic_id" />

            </a>
        </div>
        <div class="header_intro">
            <img src="/20160608--Exercise/shop/web/Public/Home/images/by_top.gif">
        </div>
        <div class="headerdg">
            <em>
                Hot Line（7*24）
            </em>
            <p>
                <img src="/20160608--Exercise/shop/web/Public/Home/images/tel1.gif">
            </p>
        </div>
    </div>

<!--- 横向 -- 导航条菜单 *************************** 应自动生成  --> 

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
                        There are <strong><?php echo ($pieces); ?></strong> pieces goods in your shopping cart, total <strong>$<?php echo ($moneyFormat); ?></strong>
                    </a>
                </a>
            </A>
            <EM>
                &nbsp;&nbsp;&nbsp;&nbsp;
            </EM>
        </DIV>
        <div class="clear">
        </div>
    </div>


<div class="nav_min_div" id="min_div" >
<img src="/20160608--Exercise/shop/web/Public/Home/images/top_min.jpg"></div>

<div class="content">
	<div class="user">
		<div class="menu"><strong>Current Position: </strong>
			<span><a href="<?php echo U('Home/Index/index');?>">HOME</a> <code>&gt;</code>Shopping Process</span></div>
		
<!-- 提交订单， done 完成方法	-->

			<form  method="post" action="<?php echo U('Home/Flow/done');?>">

			<div class=shop>
			<div class=shoporder>
				<div id=step_2>
					<div class=linebt><span>The consignee information</span><em></em></div>
					<div class="tfmain_m">
						<div class="shoporder_mdiv">
							<div>
								<p>
								<label for="xm">Consignee Name：</label><br/>
									<input type="text"  name="xm" /></p>
								<p><label for="mobile">Mobile Phone ：</label><br/>
									<input type="text"  name="mobile" /></p>
								<p><label for="address">Post Address ：</label><br/>
									<input type="text"  name="address" /></P>

								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>
	
			<div id="step_6">
			<div class="linebt"><span id="step3">Payment Method</span><em></em></div>

			<div class="tfmain_m">

			<div class="">

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
			  <li class=orderm_zf>$<?php echo ($g["shop_price"]); ?></li>
			  <li class=orderm_zf>$<?php echo ($g[shop_price] * $g[num]); ?></li>
			  <div class='clear'></div>
			</ul><?php endforeach; endif; ?>

			<div class=contno>
			<div class='contno_l'><span>Small amount of shopping: <strong>$<?php echo ($money); ?></strong></span></div>

			<div class=clear></div>
			</div>
			</div>

			<div id=step_6 style="margin-top: 2px">
	
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
                ThinkPHP - Fast & Simple OOP PHP Framework by <a href="http://jingwest2637.netne.net">jingwest2637.netne.net</a> @Vancouver BC  2016
            </p>


  <div class="clear"></div>
</div>
<div class="clear"></div></div>
</body>
</html>
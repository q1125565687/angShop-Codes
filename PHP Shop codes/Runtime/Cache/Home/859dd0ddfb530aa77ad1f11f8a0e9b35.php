<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="手机网" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<title>ECSHOP演示站 - Powered by Ming</title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="/20160608--Exercise/shop/web/Public/Home/css/member.css" rel="stylesheet" type="text/css" media="screen" />
<link href="/20160608--Exercise/shop/web/Public/Home/css/style.css" rel="stylesheet" type="text/css" />

<style>
	#pic_id{
		width: 150px;
		height: 70px;
		margin-left: 33px;
		margin-top: 20px;
		float: left;
	}	
</style>
</head>

<body>
<div id="header">	
	<div class="header_top">
	<div class="header_top_l"></div>
		<div class="header_top_m" >
						<div style='float:left' id="ECS_MEMBERZONE">
				欢迎光临本店　　　　<a href="#">Login</a> | <a href="#">Register</a>

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
			<li><a href="<?php echo U('Home/Index/index');?>" >Home</a></li>
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

	<div class="mainot">
		<div class="menu">Current Position: <span><a href=".">Home</a> <code>&gt;</code>User Center</span></div>
				<div class="logm">
			<div class="mainbt">After login, to continue operating</div>
			<div class="logregmain">

				<!--
				login *************************************************************************************
			-->
				<form name="formLogin" action="<?php echo U('Home/User/login');?>" method="post">

					<div class="logregline">
						<div class="logreg_l">User Name：</div>
						<div class="logreg_r">
							<input id="username" name="username" type="text"  maxlength="100" class="input">
							<span id="loguser"></span>
							<p><span id="valdateEmail">User/password : jingming2 / 123456</span></p>
						</div>
						<div class="clear"></div>
					</div>

					<div class="logregline">
						<div class="logreg_l">Password：</div>
						<div class="logreg_r">
							<input id="password" name="password" type="password" class="input" maxlength="16">
							<span id="logpassword"></span>
							<p><a href="javascript:void(0);" onclick="javascript:show();" name="losepsw">Forgot Password？</a></p>
							<div id="fogetpass" class="fdiv fdivpsw" style="display:none">
								<div class='fdiv_b'>
									<div class='fdiv_bl'>Retrieve Password</div>

									<div class='fdiv_br' onClick="javascript:display()">&times;</div>
								</div>
								<div class='fdiv_m'>
									<p>E-mail Address：<input type='text' name="fogetpass_txt" class='inputfd'></p>
									<p class='no' style='display:none' id='emailerror'>Email Address </p>
									<div class='fdiv_foot'><input class="buttonred" id="getpassbutton" name="getpassbutton" onclick="send();" value="提交" type="button"></div>
									<p class='tips'>If the E-mail address is not correct, or fill out when you have forgotten the registered email address, that we are unable to help you find your password.Suggest to create a new account.</p>

								</div>

							</div>
						</div>
						<div class="clear"><img src="/20160608--Exercise/shop/web/Public/Home/images/jQueryAjax.jpg" alt="AJAX"  id="pic_id" /></div>
					</div>


					<div class="logreg_dl"><input class="buttonred" id="loginButton" name="login" value="登 录" type="submit"></div>
				</form>				
			</div>

		</div>
		<div class="regm">
			<div class="mainbt">Still no account?Registration is really very simple</div>


			<!--
			注册 *********************************************************************************************
		-->
			<div class="logregmain">
					<form name="formUser" action="" method="post" >
					<div class="logregline">
						<div class="logreg_l">User Name：</div>
						<div class="logreg_r">

							<input name="username" id="username" maxlength="100" type="text" class="input"><span id="reg"></span>
						</div>
						<div class="clear"></div>
					</div>

                    <div class="logregline">
						<div class="logreg_l">E-mail Address：</div>
						<div class="logreg_r">

							<input type="text" name="email" id="email" class="input" maxlength="26"><span id="regemail"></span>
						</div>
						<div class="clear"></div>
					</div>

					<div class="logregline">
						<div class="logreg_l">Password：</div>
						<div class="logreg_r">

							<input type="password" name="password" id="pwd" class="input" maxlength="16"><span id="regps"></span>
						</div>
						<div class="clear"></div>
					</div>
					<input type="hidden" name="redirect" value="/"/>
					<div class="logregline">
						<div class="logreg_l">Confirm Password：</div>
						<div class="logreg_r">

							<input type="password" name="cfmpassword" id="cfmpassword" class="input" maxlength="16">
						</div>
						<div class="clear"></div>
					</div>

					<div class="logreg_dl">
					<span>Verification Code：</span><input name="vcode" type="text" />

					<input name="Submit" type="submit" value="完 成" class="buttonred" />

					
					<!-- ? 没用 ？
					<input name="act" type="hidden" value="act_register" >
					<input type="hidden" name="back_act" value="./index.php" />
				-->
					</div>
						<img id="vcode" src="<?php echo U('Home/User/vcode');?> " onclick="chcode();" />

					</form>
			</div>
		</div>
		<div class="clear"></div>
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

<script src="/20160608--Exercise/shop/web/Public/Home/js/jquery.js"></script>

<script>
	//上面是：引入jQuery --------------------------------------------------------------------------

	//点击验证码后，重新调用
	function chcode() {
		document.getElementById('vcode').src = '<?php echo U('Home/User/vcode');?>' + '?_=' + Math.random();
	};

	//绑定或出发，在不同的事件上，各种功能：失去焦点/提交等：

	//使用属性选择器 ： name = ... $('input[name="username"]:last')， 从console控制台上查看
	//console.log($('input[name="username"]:last'));
	//console.log($('form[name="formUser"]')[0]); 可以从控制台 看到 F12


	//jQuery技术：绑定失去焦点事件： blur( function-------------------------------------
	/*
		应该练习使用Jquery封装的AJAX技术，去数据库验证用户名是否已占用 ***** 见：26.html 课堂练习
	*/
	// 利用jQuery技术找：对象；last过滤器；验证用户名
	$('input[name="username"]:last').blur( function () {

		console.log($('input[name="username"]:last'));

		var patt = /^\w{6,16}$/;

		//alert(patt.test($('input[name="username"]:last').val())) ;
		//js 中使用 + 拼接字符串

		if( ! patt.test($('input[name="username"]:last').val())) {
			//alert($('input[name="username"]:last').val() +  ' this input error !');
			//alert($('input[name="username"]:last').val());

			$('#reg').html('<font color="red">User name ✕</font>');

			//  ??? return false; 只提示，不要返回！！
		}
		else {
			$('#reg').html('<font color="red">✓</font>');
		}
	});

	$('input[name="email').blur( function () {
        var patt = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

        if (! patt.test( $('input[name="email"]').val() ) ) {
            //alert($('input[name="email"]').val() + ' input email address Error !');
            $('#regemail').html('<font color="red">Email ✕</font>');
        }
        else {
        	$('#regemail').html('<font color="red">✓</font>');
        }
    });


	//提交事件（提交按钮时验证），可用：前台验证--方便；*** 禁用js，则前端验证不可用！！！很容易绕过：黑窗口，另存本地等方法。！！

	$('form[name="formUser"]').submit(function() {
        var patt = /^\w{6,16}$/;
        if(!patt.test($('input[name="username"]:last').val())) {
            alert('用户名应为6-16位字母数字下划线组成');
            //有问题，用return，则不提交；提交后，TP也会后台验证！
            return false;
        }

        patt = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        if (! patt.test( $('input[name="email"]').val() ) ) {
            alert('email不正确');
            return false;
        }

        patt = /^.{6,16}$/;
        if(! patt.test($('input[name="password"]:last').val()) ) {
            alert('密码请设为6-16位');
            return false;
        }

        if( $('input[name="cfmpassword"]').val() != $('input[name="password"]:last').val()) {
            alert('密码不一致');
            return false;
        }
        //commit
    });

	//login user Ajax check
	$('input[name="username"]:first').blur( function () {
		if( $('input[name="username"]:first').val() !== 'jingming2' ) {
			$('#loguser').html('<font color="red">✕</font>');
		}
		else {
			$('#loguser').html('<font color="red">✓</font>');
		}
   });

	//login password Ajax check
	$('input[name="password"]:first').blur( function () {
		if( $('input[name="password"]:first').val() !== '123456' ) {
			$('#logpassword').html('<font color="red">✕</font>');
		}
		else {
			$('#logpassword').html('<font color="red">✓</font>');
		}
   });

	// 登陆按钮提交， Ajax检查
	//提交事件（提交按钮时验证），可用：前台验证--方便；*** 禁用js，则前端验证不可用！！！很容易绕过：黑窗口，另存本地等方法。！！
	$('form[name="formLogin"]').submit(function() {

        if( $('input[name="username"]:first').val() !== 'jingming2' ) {
            alert('Uesr name error !' );
            return false;
        }

        if( $('input[name="password"]:first').val() !== '123456' ) {
            alert('Password error !' );
            return false;
        }
     });
       
</script>
</body>
</html>
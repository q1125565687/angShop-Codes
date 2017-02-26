<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
<head>
    <meta name="Generator" content="手机网" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="" />
    <meta name="Description" content="" />
    <title>
        Online Shopping website - Powered by ECShop
    </title>
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" href="animated_favicon.gif" type="image/gif" />
    <link href="/20160608--Exercise/shop/web/Public/Home/css/index.css" rel="stylesheet" type="text/css" media="screen"
    />
    <link href="/20160608--Exercise/shop/web/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="view/js/common.js"></script>

<style>
    /* 清浮动*/
    .clr{
        clear: both;
        width: 0px;
        height: 0px;
        /* 消老IE，小DIV显示BUG */
        overflow: hidden;
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
                    <a href="#">
                        Login
                    </a>
                    |
                    <a href="#">
                        Register
                    </a>
                    <label id="myaccount">
                        <a href="#">
                            My Account
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
                <img src="/20160608--Exercise/shop/web/Public/Home/images/logo.gif">
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
                <li><a href="<?php echo U('Home/Index/index');?>">HOME</a></li>
                <li><a href="#" id="navbg">GSM Phone</a></li>
                <li>
                    <a href="#">
                        Dual-mode Phone
                    </a>
                </li>
                <li>
                    <a href="#">
                        Mobile Accessories
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
            <A onmousedown="bubble(event);" href="javascript:void(0);" name="myliulan">
                <a href="#" title="查看购物车">
                    <a href="#" title="查看购物车">
                        There are 0 pieces goods in your shopping cart, total $0.00
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
    <div class="nav_min_div" id="min_div">
        <img src="/20160608--Exercise/shop/web/Public/Home/images/top_min.jpg">
    </div>
    <div id="body">
        <div class="body_l">
            <div class="subsearch">
                <form id="searchForm" name="searchForm" method="get" action="search.php"
                onSubmit="return checkSearchForm()">
                    <div>
                        <input name="keywords" type="text" id="keyword" value="" class="searchmobile">
                        <button class="menu_button" name="menu_button" onClick="return checkSearchForm()">
                        </button>
                    </div>
                </form>
            </div>

            <script type="text/javascript">
                function checkSearchForm() {
                    if (document.getElementById('keyword').value) {
                        document.searchForm.submit();
                        return true;
                    } else {
                        alert("input key words！");
                        return false;
                    }
                }
            </script>

            <div class="subnav_header">
            </div>

<!-- 左侧类型导航 -->

            <div class="subnav">

                <?php if(is_array($cats)): foreach($cats as $key=>$c): if($c[lev] == 0): ?><div>
                    <span class="left">
                        <?php echo ($c["cat_name"]); ?>
                    </span>
                    <span class="right subnav_right">
                        <img src="/20160608--Exercise/shop/web/Public/Home/images/line.gif" border="0" id="categorie_ico1">
                    </span>
                </div>

                <ul>
                    <?php if(is_array($cats)): foreach($cats as $key=>$s): if($s[parent_id] == $c[cat_id]): ?><li>
                        &nbsp;
                        <a href="<?php echo U('Home/Index/cat' , array('cat_id' => $s[cat_id]) );?>">
                            <?php echo ($s["cat_name"]); ?>
                        </a>
                    </li><?php endif; endforeach; endif; ?>

                </ul><?php endif; endforeach; endif; ?>
   
            </div>


            <div class="subinfo_header">
                <div class="subinfo_header_left_top10">
                    &nbsp;
                    <a href="#">
                    </a>
                </div>
            </div>
            <div class="subinfo_body_top10">
                <ul>
<!--- name="history" 查询历史  session 数组存：id 图片和价格-->
                    <?php if(is_array($history)): foreach($history as $k=>$g): ?><li>
                        <div class="subinfo_body_top10_l">
                            <a href="<?php echo U('Home/Index/goods' , array('goods_id'=>$k));?>">
                                <img src="/20160608--Exercise/shop/web/Public/<?php echo ($g["thumb_img"]); ?>" alt=""
                                class="samllimg" />
                            </a>
                        </div>
                        <div class="subinfo_body_top10_r">
                            <p class="subinfo_body_top10_r_1">
                                <a href="#"><?php echo ($g["goods_name"]); ?></a>
                            </p>
                            <p class="subinfo_body_top10_r_3">
                                ￥<?php echo ($g["shop_price"]); ?>元
                            </p>
                        </div>
                        <div class="clear">
                        </div>
                    </li><?php endforeach; endif; ?>
                </ul>
            </div>
            <div class="subinfo_footer">
            </div>
        </div>
        <div class="body_brand_r">

 <!--- 当前位置: 首页 > 手机类型  >  GSM手机 ； 应增加链接 ？？-->
            
            <div class="menu">
                当前位置:
                <span>
                    <a href="<?php echo U('Home/Index/index');?>">首页</a><code>&gt;</code>
                    <?php if(is_array($cats)): foreach($cats as $key=>$c): if($c[cat_id] == $cat_id): if(is_array($cats)): foreach($cats as $key=>$cc): if($cc[cat_id] == $c[parent_id]): ?><!-- 本层查询-如手机类型：需要几个共同parent_id 的cat_id 的并列查询-->
                                <a href="#"><?php echo ($cc["cat_name"]); ?></a><code>&gt;</code>
                                <a href="<?php echo U('Home/Index/cat' , array('cat_id'=>$c[cat_id]));?>"><?php echo ($c["cat_name"]); ?></a><?php endif; endforeach; endif; endif; endforeach; endif; ?>
                </span>
<!--
                    <a href="#">手机类型</a><code>&gt;</code>
                    <a href="#">GSM手机</a></span>
-->                    
            </div>

<!--- 当前位置: 导航子类型 链接 -->

            <div class="type_nav">
                <ul>
                    <li class="type_nav_li1" onClick="location.href='category.php?id=19'">
                        <a href="#">
                            音乐手机
                        </a>
                    </li>
                    <li onClick="location.href='category.php?id=20'" class="type_nav_li2">
                        <a href="#">
                            GPS导航手机
                        </a>
                    </li>
                    <li onClick="location.href='category.php?id=5'" class="type_nav_li3">
                        <a href="#">
                            超长待机
                        </a>
                    </li>
                    <li onClick="location.href='category.php?id=2'" class="type_nav_li4">
                        <a href="#">
                            电视手机
                        </a>
                    </li>
                    <li onClick="location.href='category.php?id=18'" class="type_nav_li5">
                        <a href="#">
                            拍照手机
                        </a>
                    </li>
                    <li onClick="location.href='category.php?id=16'" class="type_nav_li6">
                        <a href="#">
                            双卡手机
                        </a>
                    </li>
                    <li onClick="location.href='category.php?id=4'" class="type_nav_li7">
                        <a href="#">
                            大屏手写手机
                        </a>
                    </li>
                    <li onClick="location.href='category.php?id=3'" class="type_nav_li8">
                        <a href="#">
                            智能手机
                        </a>
                    </li>
                    <li onClick="location.href='category.php?id=17'" class="type_nav_li9">
                        <a href="#">
                            游戏手机
                        </a>
                    </li>
                </ul>
                <div class="clear">
                </div>
            </div>
            <div class="pagelist">
                <form method="GET" class="sort" name="listform">
                    显示方式：
                    <select name="sort" style="border:1px solid #ccc;">
                        <option value="goods_id" selected>
                            按上架时间排序
                        </option>
                        <option value="shop_price">
                            按价格排序
                        </option>
                        <option value="last_update">
                            按更新时间排序
                        </option>
                    </select>
                    <select name="order" style="border:1px solid #ccc;">
                        <option value="DESC" selected>
                            倒序
                        </option>
                        <option value="ASC">
                            正序
                        </option>
                    </select>
                    <input type="submit" name="imageField" value="Go" />
                    <input type="hidden" name="category" value="3" />
                    <input type="hidden" name="display" value="grid" id="display" />
                    <input type="hidden" name="brand" value="0" />
                    <input type="hidden" name="price_min" value="0" />
                    <input type="hidden" name="price_max" value="0" />
                    <input type="hidden" name="filter_attr" value="0" />
                    <input type="hidden" name="page" value="1" />
                </form>
            </div>
            <div class="page_header">
                <form name="selectPageForm" action="/shouji/category.php" method="get">
                    <div id="page" class="pagebar">
                        <span class="f_l f6" style="margin-right:10px;">
                            总计
                            <b>
                                <?php echo ($cnt); ?>
                            </b>
                            个记录
                        </span>
                        <?php echo ($pages); ?>
                    </div>
                </form>
                <script type="Text/Javascript" language="JavaScript">
                    /*
                    function selectPage(sel) {
                        sel.form.submit();
                    }
                    */
                    
                </script>
            </div>
            <!-- 显示按Cat类型查询的结果:
        -->
            <ul class="productlist">

                <?php if(is_array($goods)): foreach($goods as $key=>$g): ?><li>
                    <a href="<?php echo U('Home/Index/goods' , array('goods_id' => $g[goods_id])) ;?>">
                        <img src="/20160608--Exercise/shop/web/Public/<?php echo ($g["thumb_img"]); ?>" alt="诺基亚N85" />
                    </a>
                    <p class="pname">
                        <a href="<?php echo U('Home/Index/goods' , array('goods_id' => $g[goods_id])) ;?>" title="<?php echo ($g["goods_name"]); ?>">
                            <?php echo ($g["goods_name"]); ?>
                        </a>
                    </p>
                    <p class="price">
                        ￥<?php echo ($g["shop_price"]); ?>元
                    </p>
                </li><?php endforeach; endif; ?>
              
            </ul>

    <!-- 清浮动  -->
            <div class="clr"></div> 

            <div class="page_footer">
                <form name="selectPageForm" action="/shouji/category.php" method="get">
                    <div id="page" class="pagebar">
                        <span class="f_l f6" style="margin-right:10px;">
                            总计
                            <b>
                                <?php echo ($cnt); ?>
                            </b>
                            个记录
                        </span>
                        <?php echo ($pages); ?>
                    </div>
                </form>
                <script type="Text/Javascript" language="JavaScript">
                    /*
                    function selectPage(sel) {
                        sel.form.submit();
                    }
                    */

                </script>
            </div>

        </div>
        <div class="clear">
        </div>
    </div>
    <div class="footert">
        <div class="footertl">
            <div class="footert_1">
                <img src="/20160608--Exercise/shop/web/Public/Home/images/logo21.gif">
            </div>
            <div class="footert_2">
                抢购热线（9:00-18:00）
                <p>
                    <img src="/20160608--Exercise/shop/web/Public/Home/images/tel2.gif">
                </p>
            </div>
        </div>
        <div class="footertr">
            <div class="footertr_t">
                好趣购是货真价实的网络直销商城，好趣购所售手机全部都是厂家直接供货，没有任何中间批发 和分销环节，让您以最低价格，购买到性价比最高的手机。
            </div>
            <div class="footertr_b">
                <dl class="footertr_d1">
                    <dt>
                    </dt>
                    <dd>
                        会员积分计划
                    </dd>
                </dl>
                <dl>
                    <dt>
                    </dt>
                    <dd>
                        免费订购热线
                    </dd>
                </dl>
                <dl class="footertr_d3">
                    <dt>
                    </dt>
                    <dd>
                        3000城市送货上门
                    </dd>
                </dl>
                <dl class="footertr_d4">
                    <dt>
                    </dt>
                    <dd>
                        品牌厂商直接供货
                    </dd>
                </dl>
                <dl class="footertr_d5">
                    <dt>
                    </dt>
                    <dd>
                        中国人保承保
                    </dd>
                </dl>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="footer">
        <div class="foottop">
            <dl>
                <dt>
                    新手上路
                </dt>
                <dd>
                    <a href="#" title="售后流程">
                        售后流程
                    </a>
                </dd>
                <dd>
                    <a href="#" title="购物流程">
                        购物流程
                    </a>
                </dd>
                <dd>
                    <a href="#" title="订购方式">
                        订购方式
                    </a>
                </dd>
            </dl>
            <dl>
                <dt>
                    手机常识
                </dt>
                <dd>
                    <a href="#" title="如何分辨原装电池">
                        如何分辨原装电池
                    </a>
                </dd>
                <dd>
                    <a href="#" title="如何分辨水货手机 ">
                        如何分辨水货手机
                    </a>
                </dd>
                <dd>
                    <a href="#" title="如何享受全国联保">
                        如何享受全国联保
                    </a>
                </dd>
            </dl>
            <dl>
                <dt>
                    配送与支付
                </dt>
                <dd>
                    <a href="#" title="货到付款区域">
                        货到付款区域
                    </a>
                </dd>
                <dd>
                    <a href="#" title="配送支付智能查询 ">
                        配送支付智能查询
                    </a>
                </dd>
                <dd>
                    <a href="#" title="支付方式说明">
                        支付方式说明
                    </a>
                </dd>
            </dl>
            <dl>
                <dt>
                    会员中心
                </dt>
                <dd>
                    <a href="#" title="资金管理">
                        资金管理
                    </a>
                </dd>
                <dd>
                    <a href="#" title="我的收藏">
                        我的收藏
                    </a>
                </dd>
                <dd>
                    <a href="#" title="我的订单">
                        我的订单
                    </a>
                </dd>
            </dl>
            <dl>
                <dt>
                    服务保证
                </dt>
                <dd>
                    <a href="#" title="退换货原则">
                        退换货原则
                    </a>
                </dd>
                <dd>
                    <a href="#" title="售后服务保证 ">
                        售后服务保证
                    </a>
                </dd>
                <dd>
                    <a href="#" title="产品质量保证 ">
                        产品质量保证
                    </a>
                </dd>
            </dl>
            <dl>
                <dt>
                    联系我们
                </dt>
                <dd>
                    <a href="#" title="网站故障报告">
                        网站故障报告
                    </a>
                </dd>
                <dd>
                    <a href="#" title="选机咨询 ">
                        选机咨询
                    </a>
                </dd>
                <dd>
                    <a href="#" title="投诉与建议 ">
                        投诉与建议
                    </a>
                </dd>
            </dl>
            <div class="foottop_r" onClick="window.location.href = '#'">
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="footbot">
            <a href="#">
                免责条款
            </a>
            |
            <a href="#">
                隐私保护
            </a>
            |
            <a href="#">
                咨询热点
            </a>
            |
            <a href="#">
                联系我们
            </a>
            |
            <a href="#">
                公司简介
            </a>
            |
            <a href="#">
                批发方案
            </a>
            |
            <a href="#">
                配送方式
            </a>
            <p>
                &copy; 2005-2011 ECSHOP 版权所有，并保留所有权利。
            </p>
            <div class="clear">
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
</body>

</html>
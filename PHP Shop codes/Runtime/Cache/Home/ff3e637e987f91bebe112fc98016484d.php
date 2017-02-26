<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
<style>
    #pic_id{
        width: 245px;
        height: 60px;
        //margin-right: 33px;
        //margin-top: 20px;
        //float: right;
    }   
</style>

<head>
    <meta name="Generator" content="手机网" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="" />
    <meta name="Description" content="" />
    <title>
        Online Shopping website - Powered by Ming
    </title>
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" href="animated_favicon.gif" type="image/gif" />
    <link href="/20160608--Exercise/shop/web/Public/Home/css/index.css" rel="stylesheet" type="text/css" media="screen"
    />
    <link href="/20160608--Exercise/shop/web/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/20160608--Exercise/shop/web/Public/Home/js/common.js"></script>
</head>
    
<body>
    <div id="header">
        <div class="header_top">
            <div class="header_top_l">
            </div>
            <div class="header_top_m">
                <div style='float:left' id="ECS_MEMBERZONE">
                    ThinkPHP　　　　

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
                            Set as Homepage                        </a>
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
                <a href="http://jingwest2637.netne.net/blog/index.php"><img src="/20160608--Exercise/shop/web/Public/Home/images/bussines-logo.jpg" alt="LOGO"  id="pic_id" /></a>
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
    <div id="nav">
        <div class="nav_m">
            <ul>
                <li>
                    <a href="<?php echo U('Home/Index/index');?>">
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" id="navbg">
                        GSM Phone
                    </a>
                </li>
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
                <!--
                function checkSearchForm() {
                    if (document.getElementById('keyword').value) {
                        document.searchForm.submit();
                        return true;
                    } else {
                        alert("Input key words");
                        return false;
                    }
                }
                -->
            </script>
            <div class="subnav_header">
            </div>
            <script type="text/javascript">
            function menu_c(o) {
                alert(o.getElementsByTagName('ul').length);
            }
            </script>

            <!--
            类型索引菜单  左侧  双重循环
        -->
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
                <div class="left subinfo_header_left">
                    <a href="#">
                    </a>
                </div>
                <!--<div class="right subinfo_header_right"><a href="#">更多</a></div>-->
            </div>

  <!--- 热门评论  -->          
            <div class="subinfo_body">
                <ul>
                    <li style="width:175px; overflow:hidden">
                        <a href="#" title="good, I like it" style="color:#333333">
                            good, I like it
                        </a>
                        <br />
                        <a style="color:#333333">
                            ecshop
                        </a>
                    </li>
                </ul>
            </div>
            <div class="subinfo_footer">
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
                                $<?php echo ($g["shop_price"]); ?>
                            </p>
                        </div>
                        <div class="clear">
                        </div>
                    </li><?php endforeach; endif; ?>

                </ul>
            </div>
            <div class="subinfo_footer">
            </div>


            <div class="submessage_header">
                &nbsp;
            </div>
            <div class="submessage_body">
                <a href="#" target="_blank">
                    <img src="/20160608--Exercise/shop/web/Public/Home/images/message.gif">
                </a>
            </div>
            <div class="subinfo_footer">
            </div>
        </div>
        <div class="body_r" style=" display:inline">
            <div class="mainbig">
                <img src="/20160608--Exercise/shop/web/Public/Home/images/banner.gif" />
            </div>
            <div class="clear">
            </div>
            <div class="mainheader">
                <div class="weekbuy">
                    <a href="search.php?intro=new">
                        More&gt;&gt;
                    </a>
                </div>
            </div>
            <ul class="productlist">

                <!-- 精品 best ***********************************************************
            -->
                <?php if(is_array($best)): foreach($best as $key=>$g): ?><li>
                    <a href="<?php echo U('Home/Index/goods' , array('goods_id' => $g[goods_id])) ;?>">
                        <img src="/20160608--Exercise/shop/web/Public/<?php echo ($g["thumb_img"]); ?>" alt="Nokia N85" />
                    </a>
                    <p class="pname">
                        <a href="<?php echo U('Home/Index/goods' , array('goods_id' => $g[goods_id])) ;?>" title="<?php echo ($g["goods_name"]); ?>">
                            <?php echo ($g["goods_name"]); ?>
                        </a>
                    </p>
                    <p class="price">
                        $<?php echo ($g["shop_price"]); ?>
                    </p>
                </li><?php endforeach; endif; ?>
            </ul>

            <div class="clear"></div>
            <div class="mainheader">
                <div class="lowerbuy">
                    <a href="search.php?intro=new">
                        More&gt;&gt;
                    </a>
                </div>
            </div>
            <ul class="productlist">

<!--
        热销 hot **************************************************************
-->
                <?php if(is_array($hot)): foreach($hot as $key=>$g): ?><li>
                    <a href="<?php echo U('Home/Index/goods' , array('goods_id' => $g[goods_id])) ;?>">
                        <img src="/20160608--Exercise/shop/web/Public/<?php echo ($g["thumb_img"]); ?>" alt="诺基亚N85" />
                    </a>
                    <p class="pname">
                        <a href="<?php echo U('Home/Index/goods' , array('goods_id' => $g[goods_id])) ;?>" title="<?php echo ($g["goods_name"]); ?>">
                            <?php echo ($g["goods_name"]); ?>
                        </a>
                    </p>
                    <p class="price">
                        $<?php echo ($g["shop_price"]); ?>
                    </p>
                </li><?php endforeach; endif; ?>
            </ul>

            <div class="clear"></div>
            <div class="mainheader">
                <div class="newproduct">
                    <a href="search.php?intro=new">
                        More&gt;&gt;
                    </a>
                </div>
            </div>
            <ul class="productlist">

<!--
        新品 News **************************************************************
-->
                <?php if(is_array($news)): foreach($news as $key=>$g): ?><li>
                    <a href="<?php echo U('Home/Index/goods' , array('goods_id' => $g[goods_id])) ;?>">
                        <img src="/20160608--Exercise/shop/web/Public/<?php echo ($g["thumb_img"]); ?>" alt="诺基亚N85" />
                    </a>
                    <p class="pname">
                        <a href="<?php echo U('Home/Index/goods' , array('goods_id' => $g[goods_id])) ;?>" title="<?php echo ($g["goods_name"]); ?>">
                            <?php echo ($g["goods_name"]); ?>
                        </a>
                    </p>
                    <p class="price">
                        $<?php echo ($g["shop_price"]); ?>
                    </p>
                </li><?php endforeach; endif; ?>
            </ul>

        </div>
        <div class="clear">
        </div>
    </div>
    </div>
    <div class="footert">
        <div class="footertl">
            <div class="footert_1">
                <img src="/20160608--Exercise/shop/web/Public/Home/images/logo21.gif">
            </div>
            <div class="footert_2">
                Hot Line（9:00-18:00）
                <p>
                    <img src="/20160608--Exercise/shop/web/Public/Home/images/tel2.gif">
                </p>
            </div>
        </div>
        <div class="footertr">
            <div class="footertr_t">
                The most powerful chip ever in a smartphone.
            </div>
            <div class="footertr_b">
                <dl class="footertr_d1">
                    <dt>
                    </dt>
                    <dd>
                        Membership rewards program
                    </dd>
                </dl>
                <dl>
                    <dt>
                    </dt>
                    <dd>
                        Free order hotline
                    </dd>
                </dl>
                <dl class="footertr_d3">
                    <dt>
                    </dt>
                    <dd>
                         FREE DELIVERY
                    </dd>
                </dl>
                <dl class="footertr_d4">
                    <dt>
                    </dt>
                    <dd>
                        Manufacturer directly supply
                    </dd>
                </dl>
                <dl class="footertr_d5">
                    <dt>
                    </dt>
                    <dd>
                        Risk Guaranty
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
                    Shopping Guide
                </dt>
                <dd>
                    <a href="#" title="售后流程">
                         Service
                    </a>
                </dd>
                <dd>
                    <a href="#" title="购物流程">
                        Procedure
                    </a>
                </dd>
                <dd>
                    <a href="#" title="订购方式">
                        Ordering
                    </a>
                </dd>
            </dl>
            <dl>
                <dt>
                     Common Knowledge
                </dt>
                <dd>
                    <a href="#" title="如何分辨原装电池">
                        Fake identification
                    </a>
                </dd>
                <dd>
                    <a href="#" title="如何分辨水货手机 ">
                        How to distinguish the gray cell phone
                    </a>
                </dd>
                <dd>
                    <a href="#" title="如何享受全国联保">
                        How to enjoy the group
                    </a>
                </dd>
            </dl>
            <dl>
                <dt>
                     Shipping and Payment Method
                </dt>
                <dd>
                    <a href="#" title="货到付款区域">
                        Cash on delivery area
                    </a>
                </dd>
                <dd>
                    <a href="#" title="配送支付智能查询 ">
                        Pay intelligent query distribution
                    </a>
                </dd>
                <dd>
                    <a href="#" title="支付方式说明">
                        Payment Instructions
                    </a>
                </dd>
            </dl>
            <dl>
                <dt>
                    Member Center
                </dt>
                <dd>
                    <a href="#" title="资金管理">
                         Funds management
                    </a>
                </dd>
                <dd>
                    <a href="#" title="我的收藏">
                         My Collection
                    </a>
                </dd>
                <dd>
                    <a href="#" title="我的订单">
                        My Order
                    </a>
                </dd>
            </dl>
            <dl>
                <dt>
                     Service Guarantees
                </dt>
                <dd>
                    <a href="#" title="退换货原则">
                       RETURN RELEVANT RULES
                    </a>
                </dd>
                <dd>
                    <a href="#" title="售后服务保证 ">
                        Service Quality Assurance
                    </a>
                </dd>
                <dd>
                    <a href="#" title="产品质量保证 ">
                         Product Quality Assurance
                    </a>
                </dd>
            </dl>
            <dl>
                <dt>
                    Contact Us
                </dt>
                <dd>
                    <a href="#" title="网站故障报告">
                        Site Failure Report
                    </a>
                </dd>
                <dd>
                    <a href="#" title="选机咨询 ">
                        Separator consulting
                    </a>
                </dd>
                <dd>
                    <a href="#" title="投诉与建议 ">
                       Complaints and suggestions
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
            <div class="clear">
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
</body>

</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    


<head>
    <meta name="Generator" content="PHP.Shop" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="" />
    <meta name="Description" content="" />
    <title>
        Online Shopping website - Powered by Ming
    </title>
    <link href="/20160608--Exercise/shop/web/Public/Home/css/index.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/20160608--Exercise/shop/web/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/20160608--Exercise/shop/web/Public/Home/js/common.js"></script>

<style>
    #pic_id{
        width: 245px;
        height: 60px;
    }   

    #pic_id2{
        width: 560px;
        height: 51px;
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
                <a href="http://jingwest2637.netne.net/blog/index.php">
                    <img src="/20160608--Exercise/shop/web/Public/Home/images/logo100.png" alt="LOGO"  id="pic_id" /></a>
            </a>
        </div>

        <div class="header_intro">
            <img src="/20160608--Exercise/shop/web/Public/Home/images/php.png" id="pic_id2" />
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
                <a href="<?php echo U('Home/Flow/checkout');?>" title="Check Shopping Cart">
                       There are <strong><?php echo ($pieces); ?></strong> pieces goods in your shopping cart, total <strong>$<?php echo ($moneyFormat); ?></strong>
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

            </div>
            <div class="clear">
            </div>
            <div class="mainheader">
                <div class="weekbuy">
                    <a href="#">
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
                    <a href="#">
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
                    <a href="#">
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
            <div class="clear">
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
</body>

</html>
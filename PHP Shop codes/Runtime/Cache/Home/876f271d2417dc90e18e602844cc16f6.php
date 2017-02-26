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
            <A onmousedown="bubble(event);" href="javascript:void(0);" name="myliulan">
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
        </div>
        <div class="body_brand_r">

 <!--- 当前位置: 首页 > 手机类型  >  GSM手机 ； 应增加链接 ？？-->
            
            <div class="menu">
                <strong>Current Position: </strong>
                <span>
                    <a href="<?php echo U('Home/Index/index');?>">HOME</a><code>&gt;</code>

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

            <div class="pagelist">
                <form method="GET" class="sort" name="listform">
                    Order Mode：
                    <select name="sort" style="border:1px solid #ccc;">
                        <option value="goods_id" selected>
                            Time order
                        </option>
                        <option value="shop_price">
                            Price order
                        </option>
                        <option value="last_update">
                            Quantity order
                        </option>
                    </select>
                    <select name="order" style="border:1px solid #ccc;">
                        <option value="DESC" selected>
                            Inverted
                        </option>
                        <option value="ASC">
                            Positive
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
                            total
                            <b>
                                <?php echo ($cnt); ?>
                            </b>
                            items
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
                        $<?php echo ($g["shop_price"]); ?>
                    </p>
                </li><?php endforeach; endif; ?>
              
            </ul>

    <!-- 清浮动  -->
            <div class="clr"></div> 

            <div class="page_footer">
                <form name="selectPageForm" action="/shouji/category.php" method="get">
                    <div id="page" class="pagebar">
                        <span class="f_l f6" style="margin-right:10px;">
                            total
                            <b>
                                <?php echo ($cnt); ?>
                            </b>
                            items
                        </span>
                        <?php echo ($pages); ?>
                    </div>
                </form>

            </div>

        </div>
        <div class="clear">
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
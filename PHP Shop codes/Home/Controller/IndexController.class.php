<?php 

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller {

    protected $model = null;

    protected $cart = null; //购物车

    public function __construct() {
        parent::__construct();
        
        //Home模块下：创建RelationModel -- GoodsModel的实例， 可以关联查询 
        $this->model = D('Goods');

        //单实例，购物车 -- 含勾选物品
        $this->cart = \Home\Tool\CartTool::getIns();

        //查栏目
        $cat = D('Cat');

        //取缓存信息
        $cats = S('cats');

        if( !$cats)
        {
            //echo 显示--测试--好用！
            //echo 'from MySQL' ;
            
            //缓存分类树
            $cats = $cat->getTree();
            //存入
            S('cats' , $cats , 300);            
        }
        $this->assign('cats', $cats);
        //var_dump($cats);
    }

    //主页显示
    public function index(){

        //查栏目
        /*
        $cat = D('Cat');
        $this->assign('cats', $cat->getTree());
        */
        //查精品
        $best = $this->model->where('is_best = 1 ')->order('goods_id desc')->limit(0,3)->select();

        //查热销
        $hot = $this->model->where('is_hot = 1')->order('goods_id desc')->limit(0,3)->select();
        
        //查新品, 使用缓存技术， Model 的cache方法
        //  ??? $news = $this->model->cache(true)->where('is_new = 1')->order('goods_id desc')->limit(0,3)->select();
        $news = $this->model->where('is_new = 1')->order('goods_id desc')->limit(0,3)->select();

        //echo "news";
        //echo "<br />";
        //print_r($news);

        $this->assign('news' , $news);
        $this->assign('best' , $best);
        $this->assign('hot' , $hot);

        //print_r(session('history')) ;
        //var_dump(session('history'));
        //print_r($_SESSION);

        // For Cart Information show:
        $this->assign('pieces' , $this->cart->calcCnt() );
        //总金额
        $this->assign('money' , $this->cart->calcMoney() );

        $this->assign('moneyFormat' , $this->cart->calcMoneyFormat() );


        //取出sessiom，准备显示
        //$this->assign('history' , session('history'));
        //array_reverse 数组顺序倒置：true保留原来的键值（[索引]）********** !
        $this->assign('history' , array_reverse(session('history') , true));

        $this->display();
    }


    //按栏目，查询显示
    public function cat() {

        $cat_id = I('get.cat_id');
        $this->assign('cat_id', $cat_id);

        //分页 总记录
        $cnt = $this->model->where(array('cat_id'=>$cat_id))->count('*'); 
        //$per = 3;
        $per = 9;   //Per page

        $page = new \Org\MyPage($cnt , $per);

        //对应html中，控件的类名class -- html中显示页号, 继承后的新功能
        $page->cclass = 'page_now' ;

        $this->assign('pages', $page->show());
        //赋值
        $this->assign('cnt', $cnt);

        $this->model->field('goods_id, goods_name, shop_price, goods_img, thumb_img, cat_id');
        $this->model->where(array('cat_id'=>$cat_id))->order('goods_id desc');
        $this->model->limit($page->firstRow, $page->listRows);
        $goods = $this->model->select();
        
        $this->assign('goods', $goods);

        //var_dump($goods);

        // For Cart Information show:
        $this->assign('pieces' , $this->cart->calcCnt() );
        //总金额
        $this->assign('money' , $this->cart->calcMoney() );
        $this->assign('moneyFormat' , $this->cart->calcMoneyFormat() );

        //取出sessiom，准备显示
        //$this->assign('history' , session('history'));
        $this->assign('history' , array_reverse(session('history') , true));

        $this->display();
    }

    //看某个商品：
    public function goods() {

        //得到 goods_id
        $g = $this->model->find(I('get.goods_id'));

        if(empty($g)) {
            //goods_id查询为空，跳回主页；有人在地址里乱输入
            $this->redirect('/');
        }

        //判断是否有评论数据, POST表单被提交

        if(IS_POST) {

            //echo 'add comment 添加留言';
            // 用父类的Model
            $comment = M('comment');
            $comment->goods_id = I('get.goods_id');
            $comment->user_id = cookie('user_id') ? cookie('user_id') : 0;
            $comment->email = I('post.email');
            $comment->content = I('post.content');
            $comment->pubtime = time();
            $comment->add();    //comment 入库操作

            //print_r($comment);

            //IS_AJAX: 系统长量，处理前台更新。由goods.html的 $.post('__SELF__' , data , function(html){} 过来 ！！ -----------------------------------------------------------
            // Ajax 的提交 Add 添加操作 处理：

            if(IS_AJAX) {
                // IS_AJAX 当前是否AJAX请求  常量
                //comments 提交成功，不执行页面的其他更新，
                // %s 为替换变量；此段为php生成DOM对象，用于局部显示

                //用于：Ajax 动态显示留言信息，造DOM对象，强行插入！

                $str = '<div class="review">
                            <div class="rev_t">
                                <div class="rev_t_user"><strong>Email：</strong>%s</div>
                                <div class="rev_t_time"><strong>时间：</strong>%s</div>
                                <div class="clear"></div>
                            </div>
                            <div class="rev_m">%s</div>
                        </div>';

                //用echo ， 让 html 拿到  进入function ()
                echo sprintf($str , I('post.email') , date('Y/md') , I('post.content'));
                // 测试 echo 'ok';
                
                //已准备好str--DOM ，回到goods.html, 用Ajax 局部显示评论
                exit; //从此退出，则只输出上面信息： echo sprintf($str , I('post.email') , date('Y/md') , I('post.content'));
                //在goods.html中-回调函数中，Alert可以，看到上述输出信息 - 用于动态显示留言。
            }
        }

        //查询此商品的评论，使用Goods Model *** 关联模型  *** **********************
        
        // 定义： 继承自 RelationModel class GoodsModel extends \Think\Model\RelationModel {

        $comm = $this->model->relationGet('comment');
        $this->assign('comm' , $comm );

         //print_r($comm);

        //把此商品放入session['history']中，为最近浏览显示做准备。
        $history = session('?history') ? session('history') : array();

        //判断历史中，是否有此商品，无加入
        if( ! isset($history[$g['goods_id']]) ) { 
            $row = array();
            $row['goods_name'] = $g['goods_name'];
            $row['thumb_img'] = $g['thumb_img'];
            $row['shop_price'] = number_format($g['shop_price']);

            //goods_id 作为键值， goods_id放在$g['goods_id']中
            $history[$g['goods_id']] = $row;
        }

        //控制历史纪录长度为5条；不能用unshift，？ 会重排键值
        if(count($history) > 5) {
            $key = key($history);
            unset($history[$key]);
        }

        //再把变量装回session
        session('history' , $history);

        $this->assign('g', $g);

        // For Cart Information show:
        $this->assign('pieces' , $this->cart->calcCnt() );
        //总金额
        $this->assign('money' , $this->cart->calcMoney() );
        $this->assign('moneyFormat' , $this->cart->calcMoneyFormat() );
        
        //车内货品数量与价格：
        //$this->assign('cartgoods' , $this->cart->calcCnt() );
        //$this->assign('cartmomey' , $this->cart->calcMoney() );

        $this->display();
    }



    //控制器中的方法：--模板--table
    public function test() {

    	//创建对象：
    	$goods = new \Home\Model\GoodsModel();
    	print_r($goods);
    	
        //Add, 面向过程方法：
        /*
        $data = array(
            'goods_name' => '诺基亚9980',
            'goods_sn' => 'sn_' . rand(10000, 99999),
            'shop_price' => 23.33,
            'goods_desc' => 'good things'
            );

        echo $goods->add($data);
        */

        //OOP
        /*
        for($i = 1; $i<20; $i++){
            $goods->goods_name = '诺基亚' . $i;
            $goods->goods_sn = 'sn_' . rand(10000, 99999);
            $goods->shop_price = $i*100;
            $goods->goods_desc = 'good things';
            echo $goods->add();
        } */  

        //echo $goods->add();
        //print_r($goods->find(2));

        /*
        $news = $goods->limit(0, 5)->select();

        print_r($news);

        $this->assign('title', 'This is TP frames title');
        $this->assign('news', $news);

        $this->assign('score', mt_rand(30,90));
        $this->assign('area', mt_rand(1,4));

        $this->display();
        */

        //用M来实例化model
        //实例化父类model，来操作category表
        /*
        $cat = M('category');
        print_r($cat);
        */

        //手写并传参
        //index.php/Home/Index/goods/goods_id/32

        //$url = U('Home/Index/goods', array('goods_id' => 32));
        //echo $url;

        //实例化
        /*
        print_r(new \Home\Tool\FooTool());

        print_r(D('Home/Foo' , 'Tool'));

        //已在Home下
        print_r(D('Foo' , 'Tool'));
        */


        //$cart = D('Home/Cart' , 'Tool');

        //因为单例, 不能new了
        /*
        $cart = \Home\Tool\CartTool::getIns();

        if( $_GET['act'] == 'buy' ) {
            $cart->add(1, 'nokia' , 23.3);
            $cart->add(2, 'nokia1' , 33.3);
            $cart->add(1, 'nokia' , 23.3);
        } 
        print_r($cart->items());
        */

        /*
        $cbpay = new \Home\Pay\CBPay();
        $cbpay->v_amount = 98.97;
        $cbpay->v_oid = '201504176548';
        echo $cbpay->form();
        */

    }
}

?>
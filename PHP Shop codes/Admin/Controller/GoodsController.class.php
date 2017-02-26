<?php 
/****
布尔教育 高端PHP培训
培  训: http://www.itbool.com
论  坛: http://www.zixue.it
****/

namespace Admin\Controller;

use \Think\Controller;

class GoodsController extends \Think\Controller {

	// Goods 表的model对象的实例化: $model
	protected $model = null;

	public function __construct() {
		parent::__construct();

		$this->model = D('Home/Goods') ;

		/*
		将创建： Think\Model Object 对象, 肯定成功，要不是继承类，要不是基类 -- model
		if( $this->model1 = D('/Home/Goods') ){
			echo " Model1 ---=======================================================D('/Home/Goods') Succ !!";
			print_r($this->model1) ;
		} else {
			echo " Model1 ---=======================================================D('/Home/Goods') Error !!";
			print_r($this->model1) ;
		}
		*/
	}

	// Add new Goods 
	public function add() {
		if( !IS_POST ) {
			$this->display();
		} else {
			//添加主逻辑，合法性判断：
			//$this->model = D('Home/Goods');

			//var_dump($this->model);

			/*
			if($_POST['goods_name']){
				$this->model->goods_name = $_POST['goods_name'];
			}

			if($_POST['goods_sn']){
				$this->model->goods_sn = $_POST['goods_sn'];
			}
			if($_POST['cat_id']){
				$this->model->cat_id = $_POST['cat_id'];
			}			
			if($_POST['shop_price'] && is_numeric($_POST['shop_price'])){
				$this->model->shop_price = $_POST['shop_price'];
			}	
			if($_POST['goods_desc']){
				$this->model->goods_desc = $_POST['goods_desc'];
			}	
			echo $this->model->add() ? 'OK' : 'Fail';
			*/

			//自动验证：先把数据赋值到 Model类 的 对象内部的_data属性上
			//必须用create()方法，创建数据属性，调用自动检测和补齐等。先检测，后赋值。
			//自己写验证规则
			//$this->model->create($_POST);
	
			//判断是否有图形文件上传

			//if (isset($_FILES['goods_img'] && $_FILES['goods_img']['error']==0)) {};
			// TP 来帮助判断
			$upload = new \Think\Upload();

			//根路径 保存路径(库中记录) D:xxxx/public/ + image/xxx

			$upload->rootPath = APP_PATH . 'Public/' ;   //根路径
			$upload->savePath = 'images/' ;				//保存路径 ， 自动加年月日
			//$upload->savePath  =  './Public/Uploads/'; 
			$uplaod->exts = array('jpeg' , 'jpg' , 'png' , 'gif' ) ;

			if( $info = $upload->upload() ){
				//print_r($info);
				//上传成功了
				$_POST['ori_img'] = $info['goods_img']['savepath'] . $info['goods_img']['savename']; 
			
				//生成缩略图
				$img = new \Think\Image();

				$img->open($upload->rootPath . $_POST['ori_img']);

				// 230 * 230 的图
				$_POST['goods_img'] = $info['goods_img']['savepath'] . 'goods_' . $info['goods_img']['savename'];
				$img->thumb(230, 230, \Think\Image::IMAGE_THUMB_FILLED)->save($upload->rootPath . $_POST['goods_img']);

				// 100 * 100 的图
				$_POST['thumb_img'] = $info['goods_img']['savepath'] . 'thumb_' . $info['goods_img']['savename'];
				$img->thumb(100, 100, \Think\image::IMAGE_THUMB_FILLED)->save($upload->rootPath . $_POST['thumb_img']);

			} else {
				echo ('$upload->upload() uplaod failed !');
			}

			if(!$this->model->create()){
				echo $this->model->getError();
			} else{
				if ( $rs = $this->model->add() )
					$this->redirect('Admin/Goods/lists');
				else
					echo '$this->model->add() Error !';
			}

			//必须自己写规则: 在Model中_validate, 进行合理性检查 
		}
	}


	public function lists() {

		//计算总条目
		$cnt = $this->model->count('*');

		//每页条数
		$per = 10;

		//系统分页类 --------------，页码类名被写死，不灵活
		//$page = new \Think\Page($cnt, $per);
		
		//自定义继承类 --------------， 继承Page，然后改写之。
		$page = new \Org\MyPage($cnt, $per);
		$page->pclass = 'pg';
		$page->pclass = 'curr';

		$pages = $page->show();

		$this->assign('pages' , $pages);


		$this->model->field('goods_id , goods_name , goods_sn ,  shop_price , is_on_sale ,is_best , is_new ,  is_hot , goods_number');
		$this->model->order('goods_id desc');
		$this->model->limit($page->firstRow , $page->listRows);

		//var_dump($this->model->select());
		
		$this->assign('goods' , $this->model->select());

		//print_r($this->model);

		$this->display();
	}

	public function del() {

		//$this->model = D('Home/Goods' );

		//echo $this->model->delete(I('get.goods_id')) ? 'ok' : 'failed' ;
		
		//$rs = $this->model->delete(I('get.goods_id')) ? 'ok' : 'failed' ;

		$rs = $this->model->delete(I('get.goods_id'));

		if($rs) {
			$this->redirect('Admin/Goods/lists');
		}
		else {
			echo 'Delete Error !';
		}
	} 
}

?>
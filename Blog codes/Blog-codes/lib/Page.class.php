<?php 
/****
Ming Jing PHP Developing / Programming
jingming20120519@gmail.com
2016.07 Vancouver BC
****/


//由抽象类继承
class Page extends aPage {

	// 常数项：
	public $recordPerPage = 2;		// 每页显示几条博文
	public $pageNumPerPage = 5; 	// 缺省5个页号， 每页显示几个页码号，用于翻页

	//public $size = mt_rand(5, 10); //不允许表达式赋初值
	public $error = '';

	public $totalNumber = 0;		// 总条目数，数据库中记录数
	public $currPage = 0; 			// 当前显示的是第几页
	public $offset = 0;				//计算limit参数：

	//构造方法：
	public function __construct($totalNumber , $currPage) {

		$this->totalNumber = $totalNumber;	// 总条目数，数据库中记录数
		$this->currPage = $currPage;
	}

	// 设置，每屏显示记录数：
	public function setrecPerPage($recPerPage) {

		if( $recPerPage < 1 ) 
			$this->recordPerPage = 1;

		if( $recPerPage > $this->totalNumber)
			$this->recordPerPage = $this->totalNumber;

		$this->recordPerPage = $recPerPage;

		//设置每页显示总页码数为单数 --- 没必要，也不起作用。
		//$this->recordPerPage = ceil(($this->recordPerPage)/2*2 + 1);
	}	

	//页码栏：显示的页码个数 3~9
	public function setPageNumPerPage($pageNumsPerPage) {

		if( $pageNumPerPage < 3 ) 
			$this->pageNumPerPage = 3;

		if( $pageNumPerPage > 9)
			$this->pageNumPerPage = 9;

		$this->pageNumPerPage = $pageNumPerPage;

		//？？$this->totalNumber = 10;
		//设置每页显示总页码数为单数 --- 没必要，也不起作用。？？

	}

	/**
	* 计算分页代码
	* @return array $arr //返回要显示的页码数组
	**/
	public function pagnation() {

	    //计算总页数 ceil进一取证
	    $max = ceil( $this->totalNumber / $this->recordPerPage );

	    //显示5条页码，合理性
	    if( $this->currPage > $max) {
	        $this->currPage = $max;
	    }

	    if($this->currPage < 1) {
	        $this->currPage = 1;
	    }

	    //计算limit参数：
	    $this->offset = ($this->currPage - 1) * $this->recordPerPage;

	    //最左
	    $left = max($this->currPage - ($this->pageNumPerPage - 1)/2,  1 );

	    //最右
	    $right = min($left + $this->pageNumPerPage -1 , $max);

	    //再最左
	    $left = max($right - $this->pageNumPerPage + 1, 1);

	    $get = $_GET;  //获得地址栏参数
	    unset($get['page']);

	    for ( $arr = array(), $i=$left; $i<=$right ; $i++) {
	        
	        $get['page'] = $i;

	        //键值拼接
	        $arr[$i] = http_build_query($get);

	    }   
	    return $arr;
	}
}

?>
<?php
require 'uploada.php';

require_once('FirePHPCore/fb.php');
require_once('FirePHPCore/FirePHP.class.php');


/**************************************************************
 *
*	使用特定function对数组中所有元素做处理
*	@param	string	&$array		要处理的字符串
*	@param	string	$function	要执行的函数
*	@return boolean	$apply_to_keys_also		是否也应用到key上
*	@access public
*
*************************************************************/
function arrayRecursive(&$array, $function, $apply_to_keys_also = false)
{
	static $recursive_counter = 0;
	if (++$recursive_counter > 1000) {
		die('possible deep recursion attack');
	}
	foreach ($array as $key => $value) {
		if (is_array($value)) {
			arrayRecursive($array[$key], $function, $apply_to_keys_also);
		} else {
			$array[$key] = $function($value);
		}

		if ($apply_to_keys_also && is_string($key)) {
			$new_key = $function($key);
			if ($new_key != $key) {
				$array[$new_key] = $array[$key];
				unset($array[$key]);
			}
		}
	}
	$recursive_counter--;
}

/**************************************************************
 *
*	将数组转换为JSON字符串（兼容中文）
*	@param	array	$array		要转换的数组
*	@return string		转换得到的json字符串
*	@access public
*
*************************************************************/
function JSON($array) {
	arrayRecursive($array, 'urlencode', true);
	$json = json_encode($array);
	return urldecode($json);
}

class admin extends CI_Controller{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("MenuDB");
		$this->load->model("ArticleDB");
	}
	
	public function index()
	{
		FB::log('log message');
		
		$MenuArray = $this->MenuDB->GetMenuInfo();
		
		$data['menu'] = $MenuArray;
		$data['menuid']="menu-board";
		
		$this->load->view("admin/index.php", $data);
	}
	
	// 导航管理
	public function menumgr($id)
	{
		$data['MenuData']=$this->MenuDB->GetMenuInfo();
		$data['menuid']=$id;
		$this->load->view("admin/MenuMgr.php", $data);
	}
	
	public function menuadd($id)
	{
		$MenuArray = $this->MenuDB->GetMenuInfo();
		
		$data['menu'] = $MenuArray[0];
		$data['info'] = array();
		$data['menuid']=$id;
		
		$this->load->view("admin/MenuAdd.php", $data);
	}
	
	public function menuedit()
	{
		$menuArray = array();
		$menuArray['title']= $_POST['title'];
		$menuArray['rootid']= $_POST['rootid'];
		$menuArray['linkurl']= $_POST['link'];
		$menuArray['orders']= $_POST['sort'];
		$flag = $_POST['flag'];
		$menuArray['id'] = $_POST['id'];
		$this->MenuDB->EditMenu($menuArray, $flag);
		
		echo TRUE;
	}
	
	public function menuupdate($id)
	{
		$MenuInfo = $this->MenuDB->QueryMenuInfo($id);
		
		$MenuArray = $this->MenuDB->GetMenuInfo();
		
		$data['menu'] = $MenuArray[0];
		$data['info'] = $MenuInfo;
		
		$this->load->view("admin/MenuAdd.php", $data);
	}
	
	public function menudel()
	{
		$title = $_POST['title'];
		$id = $_POST['id'];
		
		$this->MenuDB->DelMenu($id);
	}
	
	// 文章列表管理
	public function articleClassmgr($id)
	{
		$data['ArticleData']=$this->ArticleDB->GetArticleClassInfo();
		$data['menuid'] = $id;
		$this->load->view("admin/articleclassmgr.php", $data);
	}
	
	public function ArticleClassdel()
	{
		$id = $_POST['id'];
		$this->ArticleDB->DelArticleClass($id);
	}
	
	public function articleclassadd($id)
	{
		$ArticleClassArray = $this->ArticleDB->GetArticleClassInfo();
	
		$data['articleclass'] = $ArticleClassArray[0];
		$data['info'] = array();
		$data['menuid'] = $id;
		$this->load->view("admin/articleclassadd.php", $data);
	}
	
	public function articleclassupdate($id)
	{
		$ArticleClassInfo = $this->ArticleDB->QueryArticleClassInfo($id);
		
		$ArticleClassArray = $this->ArticleDB->GetArticleClassInfo();
		
		$data['articleclass'] = $ArticleClassArray[0];
		$data['info'] = $ArticleClassInfo;
		
		$this->load->view("admin/articleclassadd.php", $data);
	}
	
	public function articleclassedit()
	{
		$articleArray = array();
		$articleArray['title']= $_POST['title'];
		$articleArray['rootid']= $_POST['rootid'];
		$articleArray['thumb']= $_POST['img'];
		$articleArray['linkurl']= $_POST['link'];
		$articleArray['orders']= $_POST['sort'];
		$flag = $_POST['flag'];
		$articleArray['id'] = $_POST['id'];
		$this->ArticleDB->EditArticleClass($articleArray, $flag);
	
		echo TRUE;
	}
	
	//////////////////////////////////////////////////////////////////////////
	//文章管理
	
	public function ArticleList($id)
	{
		$ArticleData = $this->ArticleDB->GetArticleInfo();
		$data['MaxSize'] = count($ArticleData);
		$data['menuid'] = $id;
		//$data['index'] = $index;
		$this->load->view("admin/articlelist.php", $data);
	}
	
	public function ArticleShow()
	{
		$ArticleData = $this->ArticleDB->GetArticleInfo()[1];
		$DataJson =json_decode($_POST['aoData']);
		
		$PageStart = $DataJson[3]->value;
		$PageEnd = $DataJson[3]->value + $DataJson[4]->value;	// 这两个相加表示 最后显示位置
		
		$MaxPageSize = count($ArticleData);
		
		if ($PageEnd > $MaxPageSize) {
			$PageEnd = $MaxPageSize;
		}
		
		$aaData = array();
		for ($i = $PageStart; $i < $PageEnd; $i++)
		{
			$DataTmp = array('title'=>$ArticleData[$i]->title, 'class'=>$ArticleData[$i]->classtitle, 'id'=>$ArticleData[$i]->id);	
			array_push($aaData, $DataTmp);
		}
        
        $DataRes = array('aaData'=>$aaData, 'iTotalDisplayRecords'=>$MaxPageSize, 'iTotalRecords'=>$MaxPageSize);
		$ResJson = JSON($DataRes);
        
		//FB::log($DataRes);
		
		echo $ResJson;
	}
    
    public function ArticleAdd($id)
    {
        $ArticleClassArray = $this->ArticleDB->GetArticleInfo();
        
        FB::log($ArticleClassArray);
	
		$data['articleclass'] = $ArticleClassArray[0];
		$data['info'] = array();
		$data['menuid'] = $id;
        
        $this->load->view("admin/articleadd.php", $data);
    }
    
    public function ArticleEdit()
	{
		$articleArray = array();
		$articleArray['title']= $_POST['title'];
		$articleArray['rootid']= $_POST['rootid'];
		$articleArray['thumb']= $_POST['img'];
		$articleArray['intro']= $_POST['intro'];
		$articleArray['content']= $_POST['content'];
		$flag = $_POST['flag'];
		$articleArray['id'] = $_POST['id'];
        
       // FB::log($articleArray);
		//$this->ArticleDB->EditArticle($articleArray, $flag);
	
		echo TRUE;
	}
	
	// 上传函数
	public function upload()
	{		
		$upload = new Upload();
		$upload->uploadfile();
	}
}
?>
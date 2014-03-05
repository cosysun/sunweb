<?php
require 'uploada.php';

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
		$this->load->view("admin/articlelist.php", $data);
	}
	
	public function ArticleShow()
	{
		$ArticleData = $this->ArticleDB->GetArticleInfo();
		$PageIndex = $_POST['pageIndex'];
		$PageSize = $_POST['pageSize'];
		
		$PageStart = $PageIndex * $PageSize;
		$PageEnd = ($PageIndex + 1) * $PageSize;
		$MaxPageSize = count($ArticleData);
		
		if ($PageEnd > $MaxPageSize) {
			$PageEnd = $MaxPageSize;
		}
		
		$strResult = '<tbody>';
		for ($i = $PageStart; $i < $PageEnd; $i++)
		{
			$strResult = $strResult.'<tr><td><label>
					<input type="checkbox" name="ace_list" class="ace" />
					<span class="lbl"/>
					</label>
					</td>';
			
			$strResult = $strResult.'<td>'.$ArticleData[$i]->title.'</td>';
			$strResult = $strResult.'<td>'.$ArticleData[$i]->classtitle.'</td><td>
					<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
						<button class="btn btn-xs btn-info" onclick="location.href='."'/sunweb/index.php/admin/articleadd/".$ArticleData[$i]->id."'".'">
							<i class="icon-plus bigger-120"></i>
						</button>
					    <button class="btn btn-xs btn-info" onclick="location.href='."'/sunweb/index.php/admin/articleupdate/".$ArticleData[$i]->id."'".'">
					        <i class="icon-edit bigger-120"></i>
					    </button>
					    <button class="btn btn-xs btn-danger" onclick="DelArticleClass('.$ArticleData[$i]->id.' )">
					        <i class="icon-trash bigger-120"></i>
					    </button>
					</div>
				</td></tr>';
		}
		$strResult = $strResult . '</tbody>';
		
		echo $strResult;
	}
	
	// 上传函数
	public function upload()
	{		
		$upload = new Upload();
		$upload->uploadfile();
	}
}
?>
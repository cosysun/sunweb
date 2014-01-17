<?php

class admin extends CI_Controller{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("MenuDB");
	}
	
	public function index($c="")
	{
		$MenuArray = $this->MenuDB->GetMenuInfo();
		
		$data['menu'] = $MenuArray;
		$data['c']=$c;
		
		$this->load->view("admin/index.php", $data);
	}
	
	public function productcfg()
	{
		$MenuArray = $this->MenuDB->GetMenuInfo();
		
		$data['menu'] = $MenuArray;
		$this->load->view("admin/productcfg.php", $data);
	}
	
	public function menumgr($c="", $a="")
	{
		$data['MenuData']=$this->MenuDB->GetMenuInfo();
		$this->load->view("admin/MenuMgr.php", $data);
	}
	
	public function menuadd()
	{
		$MenuArray = $this->MenuDB->GetMenuInfo();
		
		$data['menu'] = $MenuArray[0];
		$data['info'] = array();
		
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
	
	public function articlemgr()
	{
		$this->load->view("admin/articlemgr.php");
	}
}
?>
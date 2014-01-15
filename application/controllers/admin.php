<?php

class admin extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
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
		$this->load->view("admin/MenuAdd.php");
	}
	
	public function articlemgr()
	{
		$this->load->view("admin/articlemgr.php");
	}
}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("MenuDB");
	}

	public function index()
	{
		$MenuArray = $this->MenuDB->GetMenuInfo();
		
		$data['menu'] = $MenuArray;
		
		$this->load->view('index.php', $data);
		
	}
	
	public function product()
	{
		$this->load->view('product.php');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
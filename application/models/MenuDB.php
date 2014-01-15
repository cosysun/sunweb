<?php

class MenuDB extends CI_Model
{
	public function __construct() {
		
		$this->load->database();
	}

	public function GetMenuInfo()
	{
		$MenuResult = array();
		$SubMenuResult = array();
		$strSql = "SELECT * FROM zcn_menus where rootid = 0";
		
		$MenuQueryRs = $this->db->query($strSql);
		
		$strSql = "SELECT * FROM zcn_menus WHERE rootid <> 0";
		$SubMenuQueryRs = $this->db->query($strSql);
		
		foreach($MenuQueryRs->result() as $MenuRow)
		{
			$MenuResult[$MenuRow->id] = $MenuRow->title;
	
			$SubMenuResult[$MenuRow->id] = array();
			foreach ($SubMenuQueryRs->result() as $SubMenuRow)
			{
				if ($MenuRow->id == $SubMenuRow->rootid) 
				{
					array_push($SubMenuResult[$MenuRow->id], array($SubMenuRow->id=>$SubMenuRow->title));
				}
			}
		}
		
		return array($MenuResult, $SubMenuResult);
	}
	
	public function DelMenu($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('zcn_menus');
	}
	
	public function EditMenu($Menu){
		
		$Menu['level'] = 0;
		$Menu['parentid'] = $Menu['rootid'];
		$Menu['target'] = '';
		
		$this->db->insert('zcn_menus', $Menu);
	}

}


?>
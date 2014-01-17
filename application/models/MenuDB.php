<?php

class MenuDB extends CI_Model
{
	public function __construct() {
		
		$this->load->database();
	}

	public function GetMenuInfo()
	{
		$MenuInfo = array();
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
	
	public function QueryMenuInfo($id)
	{
		$strSql = "SELECT * FROM zcn_menus where id=".$id;
		$MenuInfoRs = $this->db->query($strSql);
		
		foreach ($MenuInfoRs->result() as $MenuRow){
			$Menu['title'] = $MenuRow->title;
			$Menu['link'] = $MenuRow->linkurl;
			$Menu['rootid'] = $MenuRow->rootid;
			$Menu['orders'] = $MenuRow->orders;
			$Menu['id'] = $id;
		}
		
		return  $Menu;
	}
	
	public function DelMenu($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('zcn_menus');
	}
	
	public function EditMenu($Menu, $Flag){
		
		$Menu['level'] = 0;
		$Menu['parentid'] = $Menu['rootid'];
		$Menu['target'] = '';
		
		if ($Flag == 1) {
			$this->db->where("id", $Menu['id']);
			$this->db->update('zcn_menus', $Menu);
		}
		else {
			$this->db->insert('zcn_menus', $Menu);
		}
	}

}


?>
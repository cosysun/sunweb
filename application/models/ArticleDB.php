<?php

class ArticleDB extends CI_Model
{
	public function __construct() {
		
		$this->load->database();
	}

	public function GetArticleClassInfo()
	{
		$ArticleInfo = array();
		$ArticleResult = array();
		$SubArticleResult = array();
		$strSql = "SELECT * FROM zcn_articles_class where rootid = 0";
		
		$ArticleQueryRs = $this->db->query($strSql);
		
		$strSql = "SELECT * FROM zcn_articles_class WHERE rootid <> 0";
		$SubArticleQueryRs = $this->db->query($strSql);
		
		foreach($ArticleQueryRs->result() as $ArticleRow)
		{
			$ArticleResult[$ArticleRow->id] = $ArticleRow->title;
			$SubArticleResult[$ArticleRow->id] = array();
			foreach ($SubArticleQueryRs->result() as $SubArticleRow)
			{
				
				if ($ArticleRow->id == $SubArticleRow->rootid) 
				{
					array_push($SubArticleResult[$ArticleRow->id], array($SubArticleRow->id=>$SubArticleRow->title));
				}
			}
		}
		
		return array($ArticleResult, $SubArticleResult);
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
	
	public function DelArticleClass($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('zcn_articles_class');
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
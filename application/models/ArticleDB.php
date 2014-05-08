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
	
	public function GetArticleInfo()
	{
		$ArticleClass = array();
		$ArticleResult = array();
		$strSql = "SELECT a.*, b.title as classtitle FROM zcn_articles a, zcn_articles_class b where a.classid = b.id";
	
		$ArticleQueryRs = $this->db->query($strSql);

		foreach($ArticleQueryRs->result() as $ArticleRow)
		{
            $ArticleClass[$ArticleRow->classid] = $ArticleRow->classtitle;
            
			array_push($ArticleResult, $ArticleRow);
		}
	
		return array($ArticleClass, $ArticleResult);
	}
	
	public function QueryArticleClassInfo($id)
	{
		$strSql = "SELECT * FROM zcn_articles_class where id=".$id;
		$InfoRs = $this->db->query($strSql);
		
		foreach ($InfoRs->result() as $Row){
			$Info['title'] = $Row->title;
			$Info['link'] = $Row->linkurl;
			$Info['rootid'] = $Row->rootid;
			$Info['orders'] = $Row->orders;
			$Info['thumb'] = $Row->thumb;
			$Info['id'] = $id;
		}
		
		return  $Info;
	}
	
	public function DelArticleClass($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('zcn_articles_class');
	}
	
	public function EditArticleClass($ArticleClass, $Flag){
		
		$ArticleClass['level'] = 0;
		$ArticleClass['parentid'] = $ArticleClass['rootid'];
		
		if ($Flag == 1) {
			$this->db->where("id", $ArticleClass['id']);
			$this->db->update('zcn_articles_class', $ArticleClass);
		}
		else {
			$this->db->insert('zcn_articles_class', $ArticleClass);
		}
	}

}


?>
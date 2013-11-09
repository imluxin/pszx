<?php

class managerComponents extends sfComponents {

	public function executeBuddha() {
		$this->myuser = $this->getUser()->getGuardUser();
		$this->buddha = Doctrine_Core::getTable('BunddlaHall')->findByUserId($this->myuser->getId());
	}
	
	public function executeTemple() {
		$this->myuser = $this->getUser()->getGuardUser();
		$this->temple = Doctrine_Core::getTable('Temple')->findByUserId($this->myuser->getId());
	}
	
	public function executeOblation() {
		$this->myuser = $this->getUser()->getGuardUser();
		$this->oblation = Doctrine_Core::getTable('Oblation')->findByUserId($this->myuser->getId());
	}
	
	public function executeArticle(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();
		
		$this->article_page = $request->getParameter('article_page',1);        //默认第1页
		$q = Doctrine_Core::getTable('Article')->getListOnPage($this->article_page,5); //第页显示n条
		$q->Where('user_id='.$this->myuser->getId());
		$this->cols=$q->execute();
		//分页
		$this->article_pg= new sfDoctrinePager('DealList',5);
		$this->article_pg->setQuery($q);
		$this->article_pg->setPage($this->article_page);
		$this->article_pg->init();

		$this->article_result = $this->article_pg->getResults();
	}
}

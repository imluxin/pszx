<?php

class managerComponents extends sfComponents {

	public function executeBuddha() {
		$this->myuser = $this->getUser()->getGuardUser();
		
		$query = Doctrine_Core::getTable('BunddlaHall')->createQuery('b');
		$query->where('b.is_approved=0 AND b.is_rejected=0');
		$query->Andwhere('b.user_id=?',$this->myuser->getId());
		$this->buddha = $query->execute();
		
		$query = Doctrine_Core::getTable('BunddlaHall')->createQuery('b');
		$query->where('b.is_approved=1 AND b.is_rejected=0');
		$query->Andwhere('b.user_id=?',$this->myuser->getId());
		$this->approve_buddha = $query->execute();
		
		$query = Doctrine_Core::getTable('BunddlaHall')->createQuery('b');
		$query->where('b.is_approved=0 AND b.is_rejected=1');
		$query->Andwhere('b.user_id=?',$this->myuser->getId());
		$this->reject_buddha = $query->execute();
	}
	
	public function executeTemple() {
		$this->myuser = $this->getUser()->getGuardUser();
		
		$query = Doctrine_Core::getTable('Temple')->createQuery('b');
		$query->where('b.is_approved=0 AND b.is_rejected=0');
		$query->Andwhere('b.user_id=?',$this->myuser->getId());
		$this->temple = $query->execute();
		
		$query = Doctrine_Core::getTable('Temple')->createQuery('b');
		$query->where('b.is_approved=1 AND b.is_rejected=0');
		$query->Andwhere('b.user_id=?',$this->myuser->getId());
		$this->approve_temple = $query->execute();
		
		$query = Doctrine_Core::getTable('Temple')->createQuery('b');
		$query->where('b.is_approved=0 AND b.is_rejected=1');
		$query->Andwhere('b.user_id=?',$this->myuser->getId());
		$this->reject_temple = $query->execute();
	}
	
	public function executeOblation() {
		$this->myuser = $this->getUser()->getGuardUser();
		$this->oblation = Doctrine_Core::getTable('Oblation')->findByUserId($this->myuser->getId());
	}

	public function executeMemorial() {
		$this->myuser = $this->getUser()->getGuardUser();
		$this->memorial = Doctrine_Core::getTable('Memorial')->findByUserId($this->myuser->getId());
	}
	
	public function executeArticle(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();
		
		$this->article_page = $request->getParameter('article_page',1);        //默认第1页
		$q = Doctrine_Core::getTable('Article')->getListOnPage($this->article_page,30); //第页显示n条
		$q->Where('user_id='.$this->myuser->getId());
		$this->cols=$q->execute();
		//分页
		$this->article_pg= new sfDoctrinePager('DealList',30);
		$this->article_pg->setQuery($q);
		$this->article_pg->setPage($this->article_page);
		$this->article_pg->init();

		$this->article_result = $this->article_pg->getResults();
	}
	
	public function executeAdminbuddha(sfWebRequest $request) {
		$query = Doctrine_Core::getTable('BunddlaHall')->createQuery('b');
		$query->where('b.is_approved=0 AND b.is_rejected=0')
			->orderBy('b.id DESC');
		$this->buddha = $query->execute();
		
		$query = Doctrine_Core::getTable('BunddlaHall')->createQuery('b');
		$query->where('b.is_approved=1 AND b.is_rejected=0')
			->orderBy('b.id DESC');
		$this->approve_buddha = $query->execute();
		
		$query = Doctrine_Core::getTable('BunddlaHall')->createQuery('b');
		$query->where('b.is_approved=0 AND b.is_rejected=1')
			->orderBy('b.id DESC');
		$this->reject_buddha = $query->execute();		
	}
	
	public function executeAdmintemple(sfWebRequest $request) {
		$query = Doctrine_Core::getTable('Temple')->createQuery('b');
		$query->where('b.is_approved=0 AND b.is_rejected=0')
			->orderBy('b.id DESC');
		$this->temple = $query->execute();
		
		$query = Doctrine_Core::getTable('Temple')->createQuery('b');
		$query->where('b.is_approved=1 AND b.is_rejected=0')
			->orderBy('b.id DESC');
		$this->approve_temple = $query->execute();
		
		$query = Doctrine_Core::getTable('Temple')->createQuery('b');
		$query->where('b.is_approved=0 AND b.is_rejected=1')
			->orderBy('b.id DESC');
		$this->reject_temple = $query->execute();
	}
	
	public function executeMenu(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();
		
		$this->is_admin = false;
		$this->level = 'primary';
		
		if($this->myuser->hasPermission('senior'))
			$this->level = 'senior';
		else if($this->myuser->hasPermission('high')) 
			$this->level = 'high';
			
		if($this->myuser->getPermissions()->count() > 0)  $this->is_admin = true;
	}
}

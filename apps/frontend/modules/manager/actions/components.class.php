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

		$query = Doctrine_Core::getTable('Oblation')->createQuery('b');
		$query->where('b.is_approved=0 AND b.is_rejected=0');
		$query->Andwhere('b.user_id=?',$this->myuser->getId());
		$this->oblation = $query->execute();

		$query = Doctrine_Core::getTable('Oblation')->createQuery('b');
		$query->where('b.is_approved=1 AND b.is_rejected=0');
		$query->Andwhere('b.user_id=?',$this->myuser->getId());
		$this->approve_oblation = $query->execute();

		$query = Doctrine_Core::getTable('Oblation')->createQuery('b');
		$query->where('b.is_approved=0 AND b.is_rejected=1');
		$query->Andwhere('b.user_id=?',$this->myuser->getId());
		$this->reject_oblation = $query->execute();
	}

	public function executeMemorial() {
		$this->myuser = $this->getUser()->getGuardUser();

		$query = Doctrine_Core::getTable('Memorial')->createQuery('b');
		$query->where('b.is_approved=0 AND b.is_rejected=0');
		$query->Andwhere('b.user_id=?',$this->myuser->getId());
		$this->memorial = $query->execute();

		$query = Doctrine_Core::getTable('Memorial')->createQuery('b');
		$query->where('b.is_approved=1 AND b.is_rejected=0');
		$query->Andwhere('b.user_id=?',$this->myuser->getId());
		$this->approve_memorial = $query->execute();

		$query = Doctrine_Core::getTable('Memorial')->createQuery('b');
		$query->where('b.is_approved=0 AND b.is_rejected=1');
		$query->Andwhere('b.user_id=?',$this->myuser->getId());
		$this->reject_memorial = $query->execute();
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

	public function executeAdminmemorial(sfWebRequest $request) {
		$query = Doctrine_Core::getTable('Memorial')->createQuery('b');
		$query->where('b.is_approved=0 AND b.is_rejected=0')
		->orderBy('b.id DESC');
		$this->memorial = $query->execute();

		$query = Doctrine_Core::getTable('Memorial')->createQuery('b');
		$query->where('b.is_approved=1 AND b.is_rejected=0')
		->orderBy('b.id DESC');
		$this->approve_memorial = $query->execute();

		$query = Doctrine_Core::getTable('Memorial')->createQuery('b');
		$query->where('b.is_approved=0 AND b.is_rejected=1')
		->orderBy('b.id DESC');
		$this->reject_memorial = $query->execute();
	}

	public function executeAdminoblation(sfWebRequest $request) {
		$query = Doctrine_Core::getTable('Oblation')->createQuery('b');
		$query->where('b.is_approved=0 AND b.is_rejected=0')
		->orderBy('b.id DESC');
		$this->oblation = $query->execute();

		$query = Doctrine_Core::getTable('Oblation')->createQuery('b');
		$query->where('b.is_approved=1 AND b.is_rejected=0')
		->orderBy('b.id DESC');
		$this->approve_oblation = $query->execute();

		$query = Doctrine_Core::getTable('Oblation')->createQuery('b');
		$query->where('b.is_approved=0 AND b.is_rejected=1')
		->orderBy('b.id DESC');
		$this->reject_oblation = $query->execute();
	}

	public function executeAdminoblationprice(sfWebRequest $request) {

		$page= $request->getParameter('page',1);        //默认第1页
		$q = Doctrine_Core::getTable('Oblation')->getListOnPage($page,1); //第页显示n条
		$q->orderBy('id DESC');
		// $this->cols=$q->execute();
		//分页
		$this->pg= new sfDoctrinePager('Oblation',1);
		$this->pg->setQuery($q);
		$this->pg->setPage($page);
		$this->pg->init();

		$this->result = $this->pg->getResults();

	}

	public function executeAdminarticle(sfWebRequest $request) {

		$page= $request->getParameter('page',1);        //默认第1页
		$q = Doctrine_Core::getTable('Article')->getListOnPage($page,30); //第页显示n条
		$q->orderBy('id DESC');
		// $this->cols=$q->execute();
		//分页
		$this->pg= new sfDoctrinePager('Article',30);
		$this->pg->setQuery($q);
		$this->pg->setPage($page);
		$this->pg->init();

		$this->result = $this->pg->getResults();

	}

	public function executeAdminuser(sfWebRequest $request) {

		$search_url = '';

		$page= $request->getParameter('page',1);        //默认第1页
		$q = Doctrine_Core::getTable('sfGuardUser')->getListOnPage($page,30); //第页显示n条
		$q->where('is_active = 1');

		$this->name = $request->getParameter('name','姓名');
		$this->username = $request->getParameter('username','昵称');
		$this->email = $request->getParameter('email','注册邮箱');
		$this->phone = $request->getParameter('phone','联系手机');

		if($this->name != '姓名' && $this->name != '') {
			$q->andWhere("first_name LIKE '%$this->name%'");
			$search_url .= '&name='.$this->name;
		}

		if($this->username != '昵称' && $this->username != '') {
			$q->andWhere("username LIKE '%$this->username%'");
			$search_url .= '&username='.$this->username;
		}

		if($this->email != '注册邮箱' && $this->email != '') {
			$q->andWhere("email_address LIKE '%$this->email%'");
			$search_url .= '&email='.$this->email;
		}

		if($this->phone != '联系手机' && $this->phone != '') {
			$q->andWhere('phone = ?',$this->phone);
			$search_url .= '&phone='.$this->phone;
		}

		$this->search_url = urlencode($search_url);

		//分页
		$this->pg= new sfDoctrinePager('sfGuardUser',30);
		$this->pg->setQuery($q);
		$this->pg->setPage($page);
		$this->pg->init();

		$this->result = $this->pg->getResults();
	}

	public function executeAdmincoins(sfWebRequest $request) {
		$search_url = '';

		$page= $request->getParameter('page',1);        //默认第1页
		$q = Doctrine_Core::getTable('sfGuardUser')->getListOnPage($page,30); //第页显示n条
		$q->where('is_active = 1');

		$this->name = $request->getParameter('name','姓名');
		$this->username = $request->getParameter('username','昵称');
		$this->email = $request->getParameter('email','注册邮箱');
		$this->phone = $request->getParameter('phone','联系手机');

		if($this->name != '姓名' && $this->name != '') {
			$q->andWhere("first_name LIKE '%$this->name%'");
			$search_url .= '&name='.$this->name;
		}

		if($this->username != '昵称' && $this->username != '') {
			$q->andWhere("username LIKE '%$this->username%'");
			$search_url .= '&username='.$this->username;
		}

		if($this->email != '注册邮箱' && $this->email != '') {
			$q->andWhere("email_address LIKE '%$this->email%'");
			$search_url .= '&email='.$this->email;
		}

		if($this->phone != '联系手机' && $this->phone != '') {
			$q->andWhere('phone = ?',$this->phone);
			$search_url .= '&phone='.$this->phone;
		}

		$this->search_url = urlencode($search_url);

		//分页
		$this->pg= new sfDoctrinePager('sfGuardUser',30);
		$this->pg->setQuery($q);
		$this->pg->setPage($page);
		$this->pg->init();

		$this->result = $this->pg->getResults();
	}
	public function executeAdmincashin(sfWebRequest $request) {

	}
	public function executeAdmincashout(sfWebRequest $request) {

	}
	
	public function executeAdminprayword(sfWebRequest $request) {
		$this->b_prayword = Doctrine_Core::getTable('PrayWords')->findOneById(1);
		$this->t_prayword = Doctrine_Core::getTable('PrayWords')->findOneById(2);
		$this->m_prayword = Doctrine_Core::getTable('PrayWords')->findOneById(3);
	}
	
	public function executeAdminadv(sfWebRequest $request) {
		$this->advs = Doctrine_Core::getTable('Adv')->findAll();
		
		$this->recommend = Doctrine_Core::getTable('Recommend')->findAll();
	}

	public function executeAdminmanager(sfWebRequest $request) {

		$search_url = '';

		$page= $request->getParameter('page',1);        //默认第1页
		$q = Doctrine_Core::getTable('sfGuardUser')->getListOnPage($page,30); //第页显示n条
		$q->where('is_active = 1');

		$this->name = $request->getParameter('name','姓名');
		$this->username = $request->getParameter('username','昵称');
		$this->email = $request->getParameter('email','注册邮箱');
		$this->phone = $request->getParameter('phone','联系手机');

		if($this->name != '姓名' && $this->name != '') {
			$q->andWhere("first_name LIKE '%$this->name%'");
			$search_url .= '&name='.$this->name;
		}

		if($this->username != '昵称' && $this->username != '') {
			$q->andWhere("username LIKE '%$this->username%'");
			$search_url .= '&username='.$this->username;
		}

		if($this->email != '注册邮箱' && $this->email != '') {
			$q->andWhere("email_address LIKE '%$this->email%'");
			$search_url .= '&email='.$this->email;
		}

		if($this->phone != '联系手机' && $this->phone != '') {
			$q->andWhere('phone = ?',$this->phone);
			$search_url .= '&phone='.$this->phone;
		}

		$this->search_url = urlencode($search_url);

		//分页
		$this->pg= new sfDoctrinePager('sfGuardUser',30);
		$this->pg->setQuery($q);
		$this->pg->setPage($page);
		$this->pg->init();

		$this->result = $this->pg->getResults();
		
		$this->permission = Doctrine_Core::getTable('sfGuardPermission')->findAll();
	}
	
	public function executeMenu(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();

		$this->is_admin = false;
		$this->level = 'primary';

		if($this->myuser->hasPermission('senior'))
		$this->level = 'senior';
		
		if($this->myuser->hasPermission('high'))
		$this->level = 'high';
		if($this->myuser->getPermissions()->count() > 0)  $this->is_admin = true;
	}
}

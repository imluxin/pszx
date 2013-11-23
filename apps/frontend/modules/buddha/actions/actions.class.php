<?php

/**
 * buddha actions.
 *
 * @package    symfonymodel
 * @subpackage buddha
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class buddhaActions extends sfActions
{

	public function executeIndex(sfWebRequest $request)
	{
		$this->myuser = $this->getUser()->getGuardUser();

		$this->rq = $request->getParameter('rq','no');
		$this->xh = $request->getParameter('xh','no');
		$this->last = $request->getParameter('last','no');

		$search_query = '';
		$search_url = '';

		$page= $request->getParameter('page',1);        //默认第1页
		$q = Doctrine_Core::getTable('BunddlaHall')->getListOnPage($page,18); //第页显示n条
		$q->Where('is_approved=1 AND is_rejected=0');

		if($this->rq != 'no') {

		}

		if($this->xh != 'no') {

		}

		if($this->last != 'no') {
			$q->orderBy("id DESC");
			$search_url .= '&last=yes';
		}

		$this->search_url = urlencode($search_url);

		//分页
		$this->pg= new sfDoctrinePager('BunddlaHall',18);
		$this->pg->setQuery($q);
		$this->pg->setPage($page);
		$this->pg->init();

		$this->result = $this->pg->getResults();
	}

	public function executeNew(sfWebRequest $request)
	{
		$this->myuser = $this->getUser()->getGuardUser();

		$this->form = new BunddlaHallForm();

	}

	public function executeCreate(sfWebRequest $request)
	{
		$this->myuser = $this->getUser()->getGuardUser();

		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$this->form = new BunddlaHallForm();

		$this->processForm($request, $this->form, $this->myuser);

		$this->setTemplate('new');
	}

	public function executeDetail(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();
		$id = $request->getParameter('id');
		$this->buddha = Doctrine_Core::getTable('BunddlaHall')->findOneById($id);

		$page= $request->getParameter('page',1);        //默认第1页
		$query = Doctrine_Core::getTable('BunddlaHallHistory')->getListOnPage($page,30);
		$query->where('bh_id=?',$id)
		->orderBy('id DESC');

		//分页
		$this->pg= new sfDoctrinePager('BunddlaHallHistory',30);
		$this->pg->setQuery($query);
		$this->pg->setPage($page);
		$this->pg->init();

		$this->result = $this->pg->getResults();
	}

	public function executeDescription(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();
		$this->forward404Unless($this->bunddla_hall = Doctrine_Core::getTable('BunddlaHall')->find(array($request->getParameter('id'))), sprintf('没有找到对应的佛殿！佛殿ID： (%s).', $request->getParameter('id')));
		
	}

	public function executeEdit(sfWebRequest $request) {
	 $this->forward404Unless($bunddla_hall = Doctrine_Core::getTable('BunddlaHall')->find(array($request->getParameter('id'))), sprintf('没有找到对应的佛殿！佛殿ID： (%s).', $request->getParameter('id')));
	 $this->myuser = $this->getUser()->getGuardUser();
	 $this->bunddla_hall = $bunddla_hall;
	 $this->form = new BunddlaHallForm($bunddla_hall);
	}

	public function executeUpdate(sfWebRequest $request) {
	 $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
	 $this->forward404Unless($bunddla_hall = Doctrine_Core::getTable('BunddlaHall')->find(array($request->getParameter('id'))), sprintf('没有找到对应的佛殿！佛殿ID： (%s).', $request->getParameter('id')));
	 $this->myuser = $this->getUser()->getGuardUser();
	 $this->bunddla_hall = $bunddla_hall;

	 $this->form = new BunddlaHallForm($bunddla_hall);

	 $this->processEditForm($request, $this->form);

	 $this->setTemplate('edit');
	}

	/*
	 public function executeDelete(sfWebRequest $request)
	 {
	 $request->checkCSRFProtection();

	 $this->forward404Unless($bunddla_hall = Doctrine_Core::getTable('BunddlaHall')->find(array($request->getParameter('id'))), sprintf('Object bunddla_hall does not exist (%s).', $request->getParameter('id')));
	 $bunddla_hall->delete();

	 $this->redirect('buddha/index');
	 }*/
	protected function processForm(sfWebRequest $request, sfForm $form,$myuser)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid()) {
			$bunddla_hall = $form->save();

			$bunddla_hall->setUserId($myuser->getId());
			$bunddla_hall->setUserName($myuser->getUsername());
			$bunddla_hall->save();
			$this->redirect('buddha/edit?id='.$bunddla_hall->getId());
		}
	}

	protected function processEditForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$bunddla_hall = $form->save();

			// reset status
			$bunddla_hall->setIsApproved(false);
			$bunddla_hall->setIsRejected(false);
			$bunddla_hall->save();

			$this->redirect('manager/buddha');
			// $this->redirect('buddha/edit?id='.$bunddla_hall->getId());
		}
	}
}

<?php

/**
 * temple actions.
 *
 * @package    symfonymodel
 * @subpackage temple
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class templeActions extends sfActions {
	public function executeIndex(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();

		$search_query = '';

		$this->province = $request->getParameter('province','选择省份');
		$this->city = $request->getParameter('city','选择城市');
		$this->block = $request->getParameter('block','选择区');
		$this->name = $request->getParameter('name','输入名称');
		$this->creator = $request->getParameter('creator','创建者');
		
		$this->search_url = '&province='.$this->province.'&city='.$this->city.'&block='.$this->block.'&name='.$this->name.'&creator='.$this->creator;
		$this->search_url = urlencode($this->search_url);
		if($this->province != '选择省份') {
			$search_query .= " AND province='".$this->province."'";
		}

		if($this->city != '选择城市') {
			$search_query .= " AND city='".$this->city."'";
		}

		if($this->block != '选择区') {
			$search_query .= " AND block='".$this->block."'";
		}

		if($this->name != '输入名称') {
			$search_query .= " AND name LIKE '%$this->name%'";
		}

		if($this->creator != '创建者') {
			$search_query .= " AND user_name LIKE '%$this->creator%'";
		}

		$rq = $request->getParameter('rq','no');
		$xh = $request->getParameter('xh','no');
		$last = $request->getParameter('last','no');


		if($rq != 'no') {

		} else if($xh != 'no') {

		} else if($last != 'no') {
			$search_query = '';
		}

		$page= $request->getParameter('page',1);        //默认第1页
		$q = Doctrine_Core::getTable('temple')->getListOnPage($page,18); //第页显示n条
		$q->Where('is_approved=0 AND is_rejected=0'.$search_query);
		$q->OrderBy('id DESC');

		//分页
		$this->pg= new sfDoctrinePager('temple',1);
		$this->pg->setQuery($q);
		$this->pg->setPage($page);
		$this->pg->init();

		$this->result = $this->pg->getResults();
	}

	public function executeNew(sfWebRequest $request) {
		$this->form = new TempleForm();
		$this->myuser = $this->getUser()->getGuardUser();
	}

	public function executeCreate(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$this->form = new TempleForm();

		$this->processForm($request, $this->form,$this->myuser);

		$this->setTemplate('new');
	}

	public function executeDetails(sfWebRequest $request) {

	}

	public function executeEdit(sfWebRequest $request) {
		$this->forward404Unless($temple = Doctrine_Core::getTable('Temple')->find(array($request->getParameter('id'))), sprintf('Object temple does not exist (%s).', $request->getParameter('id')));
		$this->temple = $temple;
		$this->myuser = $this->getUser()->getGuardUser();
		$this->form = new TempleForm($temple);
		$this->form->setWidget('user_name', new sfWidgetFormInputHidden());
	}

	public function executeUpdate(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($temple = Doctrine_Core::getTable('Temple')->find(array($request->getParameter('id'))), sprintf('Object temple does not exist (%s).', $request->getParameter('id')));
		$this->temple = temple;
		$this->myuser = $this->getUser()->getGuardUser();

		$this->form = new TempleForm($temple);
		$this->form->getWidget('user_name')->setDefault($temple->getUserName());

		$this->processEditForm($request, $this->form);

		$this->setTemplate('edit');
	}

	/*
		public function executeDelete(sfWebRequest $request)
		{
		$request->checkCSRFProtection();

		$this->forward404Unless($temple = Doctrine_Core::getTable('Temple')->find(array($request->getParameter('id'))), sprintf('Object temple does not exist (%s).', $request->getParameter('id')));
		$temple->delete();

		$this->redirect('temple/index');
		}*/

	protected function processForm(sfWebRequest $request, sfForm $form,$myuser) {
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$temple = $form->save();
			$temple->setUserId($myuser->getId());
			$temple->setUserName($myuser->getUsername());
			$temple->save();
			$this->redirect('temple/edit?id='.$temple->getId());
		}
	}

	protected function processEditForm(sfWebRequest $request, sfForm $form) {
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$temple = $form->save();

			$this->redirect('manager/temple');
		}
	}
}

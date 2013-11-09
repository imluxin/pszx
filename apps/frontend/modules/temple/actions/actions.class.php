<?php

/**
 * temple actions.
 *
 * @package    symfonymodel
 * @subpackage temple
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class templeActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->myuser = $this->getUser()->getGuardUser();

		$page= $request->getParameter('page',1);        //默认第1页
		$q = Doctrine_Core::getTable('temple')->getListOnPage($page,18); //第页显示n条
		$q->Where('is_approved=0 AND is_rejected=0');
		$this->cols=$q->execute();
		//分页
		$this->pg= new sfDoctrinePager('temple',18);
		$this->pg->setQuery($q);
		$this->pg->setPage($page);
		$this->pg->init();

		$this->result = $this->pg->getResults();
	}

	public function executeNew(sfWebRequest $request)
	{
		$this->form = new TempleForm();
		$this->myuser = $this->getUser()->getGuardUser();
	}

	public function executeCreate(sfWebRequest $request)
	{
		$this->myuser = $this->getUser()->getGuardUser();
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$this->form = new TempleForm();

		$this->processForm($request, $this->form);

		$this->setTemplate('new');
	}

	public function executeDetails(sfWebRequest $request) {

	}

	public function executeEdit(sfWebRequest $request)
	{
		$this->forward404Unless($temple = Doctrine_Core::getTable('Temple')->find(array($request->getParameter('id'))), sprintf('Object temple does not exist (%s).', $request->getParameter('id')));
		$this->form = new TempleForm($temple);
		$this->temple = $temple;
		$this->myuser = $this->getUser()->getGuardUser();
	}

	public function executeUpdate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($temple = Doctrine_Core::getTable('Temple')->find(array($request->getParameter('id'))), sprintf('Object temple does not exist (%s).', $request->getParameter('id')));
		$this->temple = temple;
		$this->myuser = $this->getUser()->getGuardUser();
		$this->form = new TempleForm($temple);

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

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$temple = $form->save();

			$this->redirect('temple/edit?id='.$temple->getId());
		}
	}
	
	protected function processEditForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$temple = $form->save();

			$this->redirect('manager/bto');
		}
	}
}

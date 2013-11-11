<?php

/**
 * memorial actions.
 *
 * @package    symfonymodel
 * @subpackage memorial
 * @author     Mia
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class memorialActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->myuser = $this->getUser()->getGuardUser();
		
		$page= $request->getParameter('page',1);        //默认第1页
		$q = Doctrine_Core::getTable('Memorial')->getListOnPage($page,1); //第页显示n条
		$q->Where('is_approved=1 AND is_rejected=0');
		$this->cols=$q->execute();
		//分页
		$this->pg= new sfDoctrinePager('Memorial',1);
		$this->pg->setQuery($q);
		$this->pg->setPage($page);
		$this->pg->init();

		$this->result = $this->pg->getResults();
	}

	public function executeNew(sfWebRequest $request)
	{
		$this->myuser = $this->getUser()->getGuardUser();
		$this->form = new MemorialForm();
	}

	public function executeCreate(sfWebRequest $request)
	{
		$this->myuser = $this->getUser()->getGuardUser();
		
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$this->form = new MemorialForm();

		$this->processForm($request, $this->form,$this->myuser);

		$this->setTemplate('new');
	}

	public function executeEdit(sfWebRequest $request)
	{
		$this->forward404Unless($memorial = Doctrine_Core::getTable('Memorial')->find(array($request->getParameter('id'))), sprintf('Object memorial does not exist (%s).', $request->getParameter('id')));
		$this->myuser = $this->getUser()->getGuardUser();
		$this->memorial = $memorial;
		$this->form = new MemorialForm($memorial);
	}

	public function executeUpdate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($memorial = Doctrine_Core::getTable('Memorial')->find(array($request->getParameter('id'))), sprintf('Object memorial does not exist (%s).', $request->getParameter('id')));
		$this->myuser = $this->getUser()->getGuardUser();
		$this->memorial = $memorial;
		$this->form = new MemorialForm($memorial);

		$this->processEditForm($request, $this->form);

		$this->setTemplate('edit');
	}

/*	public function executeDelete(sfWebRequest $request)
	{
		$request->checkCSRFProtection();

		$this->forward404Unless($memorial = Doctrine_Core::getTable('Memorial')->find(array($request->getParameter('id'))), sprintf('Object memorial does not exist (%s).', $request->getParameter('id')));
		$memorial->delete();

		$this->redirect('memorial/index');
	}*/

	protected function processForm(sfWebRequest $request, sfForm $form,$myuser)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$memorial = $form->save();
			$memorial->setUserId($myuser->getId());
			$memorial->setUserName($myuser->getUsername());
			$memorial->save();
			$this->redirect('memorial/edit?id='.$memorial->getId());
		}
	}
	
	protected function processEditForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$memorial = $form->save();
			$memorial->setIsRejected(false);
			$memorial->setIsApproved(false);
			$memorial->save();
			$this->redirect('memorial/edit?id='.$memorial->getId());
		}
	}
}

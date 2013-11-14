<?php

/**
 * oblation actions.
 *
 * @package    symfonymodel
 * @subpackage oblation
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class oblationActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->myuser = $this->getUser()->getGuardUser();
		$this->category = Doctrine_Core::getTable('OblationCategory')->findAll();
		
		$page= $request->getParameter('page',1);        //默认第1页
		$q = Doctrine_Core::getTable('Oblation')->getListOnPage($page,18); //第页显示n条
		$q->Where('is_approved=1 AND is_rejected=0');
		
		$search_query = '';
		$search_url = '';
		
		$this->xl = $request->getParameter('xl','no');
		$this->zd = $request->getParameter('zd','no');
		$this->zc = $request->getParameter('zc','no');
		$this->last = $request->getParameter('last','no');
		$this->category_id = $request->getParameter('category');
		$this->name = $request->getParameter('name');
		
		if($this->xl != 'no') {
			
		}
		if($this->zd != 'no') {
			
		}
		if($this->zc != 'no') {
			
		}
		
		if($this->last != 'no') {
			$q->orderBy('id DESC');
			$search_url .= '&last=yes';
		}
		if($this->category_id != '') {
			// $search_query = ' AND category_id='.$this->category_id;
			$q->andWhere('category_id=?',$this->category_id);
			$search_url .= '&category='.$this->category_id;
		}
		
		if($this->name != '') {
			$q->andWhere("name LIKE '%".$this->name."%'");
			$search_url .= '&name='.$this->name;
		}
		
		$this->search_url = urlencode($search_url);
		
		
		//分页
		$this->pg= new sfDoctrinePager('Oblation',18);
		$this->pg->setQuery($q);
		$this->pg->setPage($page);
		$this->pg->init();

		$this->result = $this->pg->getResults();
	}

	public function executeNew(sfWebRequest $request)
	{
		$this->myuser = $this->getUser()->getGuardUser();
		 
		$this->form = new OblationForm();
	}

	public function executeCreate(sfWebRequest $request)
	{
		$this->myuser = $this->getUser()->getGuardUser();
		 
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$this->form = new OblationForm();

		$this->processForm($request, $this->form,$this->myuser);

		$this->setTemplate('new');
	}

	public function executeEdit(sfWebRequest $request)
	{
		$this->forward404Unless($oblation = Doctrine_Core::getTable('Oblation')->find(array($request->getParameter('id'))), sprintf('Object oblation does not exist (%s).', $request->getParameter('id')));
		$this->form = new OblationForm($oblation);
		$this->oblation = $oblation;
		$this->myuser = $this->getUser()->getGuardUser();
	}

	public function executeUpdate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($oblation = Doctrine_Core::getTable('Oblation')->find(array($request->getParameter('id'))), sprintf('Object oblation does not exist (%s).', $request->getParameter('id')));
		$this->myuser = $this->getUser()->getGuardUser();
		$this->oblation = $oblation;
		$this->form = new OblationForm($oblation);
		$this->processEditForm($request, $this->form,$oblation);

		$this->setTemplate('edit');
	}

/*	public function executeDelete(sfWebRequest $request)
	{
		$request->checkCSRFProtection();

		$this->forward404Unless($oblation = Doctrine_Core::getTable('Oblation')->find(array($request->getParameter('id'))), sprintf('Object oblation does not exist (%s).', $request->getParameter('id')));
		$oblation->delete();

		$this->redirect('oblation/index');
	}*/

	protected function processForm(sfWebRequest $request, sfForm $form,$myuser)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$oblation = $form->save();
			$oblation->setUserId($myuser->getId());
			$oblation->setUserName($myuser->getUsername());
			$oblation->save();
			$this->redirect('oblation/edit?id='.$oblation->getId());
		}
	}
	
	protected function processEditForm(sfWebRequest $request, sfForm $form,$o)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			if($o->getCanModify()) {
				$price = $o->getPrice();
			}
			
			
			$oblation = $form->save();
			$oblation->setIsRejected(false);
			$oblation->setIsApproved(false);
			if($o->getCanModify()) {
				$oblation->setPrice($price);
			}
			$oblation->save();
			$this->redirect('manager/oblation');
		}
	}
}

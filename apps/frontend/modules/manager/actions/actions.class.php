<?php

/**
 * manager actions.
 *
 * @package    symfonymodel
 * @subpackage manager
 * @author     Mia
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class managerActions extends sfActions
{
	public function executeIndex(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();
			
		$this->a_list = Doctrine_Core::getTable('BankAccount')->findByUserId($this->myuser->getId());
		$this->form = new FileUploadForm();


		$page= $request->getParameter('page',1);        //默认第1页
		$q = Doctrine_Core::getTable('DealList')->getListOnPage($page,5); //第页显示n条
		$q->Where('user_id='.$this->myuser->getId());
		$this->cols=$q->execute();
		//分页
		$this->pg= new sfDoctrinePager('DealList',5);
		$this->pg->setQuery($q);
		$this->pg->setPage($page);
		$this->pg->init();

		$this->result = $this->pg->getResults();
	}

/*	public function executeBto(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();
		$this->form = new FileUploadForm();
	}*/

	public function executeBuddha(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();
		$this->form = new FileUploadForm();
	}

	public function executeTemple(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();
		$this->form = new FileUploadForm();
	}

	public function executeOblation(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();
		$this->form = new FileUploadForm();
	}

	public function executeMemorial(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();
		$this->form = new FileUploadForm();
	}

	public function executeArticle(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();
		$this->form = new FileUploadForm();
	}
	
	public function executeMbuddha(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();	
		$this->form = new FileUploadForm();	
	}
	
	public function executeMtemple(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();	
		$this->form = new FileUploadForm();	
	}
	
	public function executeMmemorial(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();	
		$this->form = new FileUploadForm();	
	}
	
	public function executeMoblation(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();	
		$this->form = new FileUploadForm();	
	}
	
	public function executeMoblationprice(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();	
		$this->form = new FileUploadForm();	
	}
	
	public function executeMarticle(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();	
		$this->form = new FileUploadForm();	
	}
	
	public function executeUser(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();	
		$this->form = new FileUploadForm();	
	}
	
	public function executeCoins(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();	
		$this->form = new FileUploadForm();	
	}
	
	public function executeCashin(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();	
		$this->form = new FileUploadForm();	
	}
	
	public function executeCashout(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();	
		$this->form = new FileUploadForm();	
	}
	
	public function executePrayword(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();	
		$this->form = new FileUploadForm();	
	}
	
	public function executeAdv(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();	
		$this->form = new FileUploadForm();	
	}
	
	public function executeManager(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();	
		$this->form = new FileUploadForm();	
	}
	
	/************Updatephoto*************/
	public function executeUpdatephoto(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));
		$this->myuser = $this->getUser()->getGuardUser();

		$form = new FileUploadForm();

		$this->processForm($request, $form, $this->myuser);

		$this->redirect('manager/index');
	}

	protected function processForm(sfWebRequest $request, sfForm $form,$myuser) {
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$this->deleteOldOne($myuser);
			$photo = $form->save();

			$myuser->setPhoto($photo->getFile());
			$myuser->save();
		}
	}

	protected  function deleteOldOne($user) {
		$uid = $user->getId();
		$photo = Doctrine_Core::getTable('FileUpload')->findOneByUserId($uid);

		if($photo) {
			if($photo->getFile() != '') {
				unlink(sfConfig::get('sf_upload_dir').'/userphoto/'.$photo->getFile());
			}
			$photo->delete();
		}
	}
	/***********Updatephoto**************/
}

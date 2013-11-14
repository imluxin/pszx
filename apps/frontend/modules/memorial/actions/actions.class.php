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
		$q = Doctrine_Core::getTable('Memorial')->getListOnPage($page,18); //第页显示n条
		$q->where('m.is_approved=1 AND m.is_rejected=0');

		$search_query = '';
		$search_url = '';

		$this->die_name = $request->getParameter('die_name');
		$this->province = $request->getParameter('province','选择省份');
		$this->city = $request->getParameter('city','选择城市');
		$this->die_day = $request->getParameter('die_day');
		$this->born_day = $request->getParameter('born_day');
		$this->mname = $request->getParameter('mname');
		$this->mid = $request->getParameter('mid');
		$this->category = $request->getParameter('category','纪念馆分类');
		$this->creator = $request->getParameter('creator');
		$this->rq = $request->getParameter('rq','no');
		$this->xh = $request->getParameter('xh','no');
		$this->last = $request->getParameter('last','no');

		if($this->die_name != '') {
			// $search_query .= " AND (m.die_name_one LIKE '%$this->die_name%' OR m.die_name_two LIKE '%$this->die_name%')";
			$q->andWhere("(m.die_name_one LIKE '%$this->die_name%' OR m.die_name_two LIKE '%$this->die_name%')");
		}
		if($this->province != '选择省份' && $this->city != '选择城市') {
			//$search_query .= " AND ((m.die_province_one = '$this->province' AND m.die_city_one = '$this->city')";
			//$search_query .= " OR (m.die_province_two= '$this->province' AND m.die_city_two = '$this->city'))";
			$q->andWhere("((m.die_province_one = '$this->province' AND m.die_city_one = '$this->city') OR (m.die_province_two= '$this->province' AND m.die_city_two = '$this->city'))");
		}

		if($this->die_day != '') {
			// $search_query .= " AND (m.die_die_one='$this->die_day' OR m.die_die_two='$this->die_day')";
			$q->andWhere("(m.die_die_one='$this->die_day' OR m.die_die_two='$this->die_day')");
		}

		if($this->born_day != '') {
			// $search_query .= " AND (m.die_birth_one='$this->born_day' OR m.die_birth_two='$this->born_day')";
			$q->andWhere("(m.die_birth_one='$this->born_day' OR m.die_birth_two='$this->born_day')");
		}

		if($this->mname != '') {
			// $search_query .= " AND m.m_name LIKE '%$this->mname%'";
			$q->andWhere("m.m_name LIKE '%$this->mname%'");
		}

		if($this->mid != '') {
			// $search_query .= " AND m.id = $this->mid";
			$q->andWhere("m.id = $this->mid");
		}

		if($this->category != '纪念馆分类') {
			// $search_query .= " AND m.category_id = $this->category";
			$q->andWhere("m.category_id = $this->category");
		}

		if($this->creator != '') {
			// $search_query .= " AND m.user_name LIKE '%$this->creator%'";
			$q->andWhere("m.user_name LIKE '%$this->creator%'");
		}

		if($this->rq != 'no') {

		}
		if($this->xh != 'no') {

		}
		if($this->last != 'no') {
			$q->orderBy('m.id DESC');
			$search_url .= '&last=yes';
		}

		$this->search_url = $search_url."&die_name=$this->die_name&province=$this->province&city=$this->city
							&die_day=$this->die_day&born_day=$this->born_day&mname=$this->mname
							&mid=$this->mid&category=$this->category&creator=$this->creator";
		$this->search_url = urlencode($this->search_url);


		//分页
		$this->pg= new sfDoctrinePager('Memorial',18);
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

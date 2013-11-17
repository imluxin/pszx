<?php

class praywordmanagerActions extends sfActions {

	public function executeUpdate(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));
		
		$id = $request->getParameter('id');
		$words = $request->getParameter('words');
		
		$pw = Doctrine_Core::getTable('PrayWords')->findOneById($id);
		
		if($pw) {
			$pw->setWords($words);
			$pw->save();
		}
		
		$this->redirect('manager/prayword');
	}
}
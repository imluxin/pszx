<?php

class buddhamanagerActions extends sfActions {

	public function executeApprove(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($bunddla_hall = Doctrine_Core::getTable('BunddlaHall')->find(array($request->getParameter('id'))), sprintf('找不到对应的记录，ID： (%s).', $request->getParameter('id')));
		
		$bunddla_hall->setIsApproved(true);
		$bunddla_hall->setIsRejected(false);
		$bunddla_hall->save();
		
		return $this->renderText(1);
	}
	
	public function executeReject(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($bunddla_hall = Doctrine_Core::getTable('BunddlaHall')->find(array($request->getParameter('id'))), sprintf('找不到对应的记录，ID： (%s).', $request->getParameter('id')));
		
		$bunddla_hall->setIsApproved(false);
		$bunddla_hall->setIsRejected(true);
		$bunddla_hall->save();
		
		return $this->renderText(1);
	}
}
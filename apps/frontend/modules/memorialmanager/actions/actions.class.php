<?php

class memorialmanagerActions extends sfActions {

	public function executeApprove(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($memorial = Doctrine_Core::getTable('Memorial')->find(array($request->getParameter('id'))), sprintf('找不到对应的记录，ID：(%s).', $request->getParameter('id')));
		
		$memorial->setIsApproved(true);
		$memorial->setIsRejected(false);
		$memorial->save();
		
		return $this->renderText(1);
	}
	
	public function executeReject(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($memorial = Doctrine_Core::getTable('Memorial')->find(array($request->getParameter('id'))), sprintf('找不到对应的记录，ID：(%s).', $request->getParameter('id')));
		
		$memorial->setIsApproved(false);
		$memorial->setIsRejected(true);
		$memorial->save();
		
		return $this->renderText(1);
	}
}
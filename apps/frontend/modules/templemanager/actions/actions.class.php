<?php

class templemanagerActions extends sfActions {

	public function executeApprove(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($temple = Doctrine_Core::getTable('temple')->find(array($request->getParameter('id'))), sprintf('没有找到对应的寺庙！ID： (%s).', $request->getParameter('id')));
		
		$temple->setIsApproved(true);
		$temple->setIsRejected(false);
		$temple->save();
		
		return $this->renderText(1);
	}
	
	public function executeReject(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($temple = Doctrine_Core::getTable('temple')->find(array($request->getParameter('id'))), sprintf('没有找到对应的寺庙！ID： (%s).', $request->getParameter('id')));
		
		$temple->setIsApproved(false);
		$temple->setIsRejected(true);
		$temple->save();
		
		return $this->renderText(1);
	}
}
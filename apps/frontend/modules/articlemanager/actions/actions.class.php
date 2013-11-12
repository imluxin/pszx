<?php

class articlemanagerActions extends sfActions {

	public function executeApprove(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($article = Doctrine_Core::getTable('Article')->find(array($request->getParameter('id'))), sprintf('找不到对应的记录，ID： (%s).', $request->getParameter('id')));
		
		$article->setIsApproved(true);
		$article->setIsRejected(false);
		$article->save();
		
		return $this->renderText(1);
	}
	
	public function executeReject(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($article = Doctrine_Core::getTable('Article')->find(array($request->getParameter('id'))), sprintf('找不到对应的记录，ID： (%s).', $request->getParameter('id')));
		
		$article->setIsApproved(false);
		$article->setIsRejected(true);
		$article->save();
		
		return $this->renderText(1);
	}
}
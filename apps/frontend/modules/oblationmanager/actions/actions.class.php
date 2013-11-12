<?php

class oblationmanagerActions extends sfActions {

	public function executeApprove(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($oblation = Doctrine_Core::getTable('Oblation')->find(array($request->getParameter('id'))), sprintf('找不到对应的记录，ID：(%s).', $request->getParameter('id')));
		
		$oblation->setIsApproved(true);
		$oblation->setIsRejected(false);
		$oblation->save();
		
		return $this->renderText(1);
	}
	
	public function executeReject(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($oblation = Doctrine_Core::getTable('Oblation')->find(array($request->getParameter('id'))), sprintf('找不到对应的记录，ID： (%s).', $request->getParameter('id')));
		
		$oblation->setIsApproved(false);
		$oblation->setIsRejected(true);
		$oblation->save();
		
		return $this->renderText(1);
	}
	
	public function executeModifyprice(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
		$this->forward404Unless($oblation = Doctrine_Core::getTable('Oblation')->find(array($request->getParameter('id'))), sprintf('找不到对应的记录，ID： (%s).', $request->getParameter('id')));
		
		$oblation->setPrice($request->getParameter('price'));
		$oblation->setCanModify(true);
		$oblation->save();
		
		return $this->renderText(1);
	}
}
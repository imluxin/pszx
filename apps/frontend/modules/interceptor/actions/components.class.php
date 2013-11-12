<?php

class interceptorComponents extends sfComponents {

	public function executeValidate(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();
		
		
	}
}

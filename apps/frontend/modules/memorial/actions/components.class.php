<?php

class memorialComponents extends sfComponents {

	public function executeCategory(sfWebRequest $request){
		$this->category = Doctrine_Core::getTable('MemorialCategory')->findAll();
	}
}

<?php
class advComponents extends sfComponents {
	
	public function executeSlider(sfWebRequest $request) {
		$this->advs = Doctrine_Core::getTable('Adv')->getAdv($this->adv);
	}
}
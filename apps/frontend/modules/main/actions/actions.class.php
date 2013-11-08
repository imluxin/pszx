<?php

/**
 *
 * Website main module
 * @author MAMJW
 *
 */
class mainActions extends sfActions {

	public function executeIndex(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();
		
		$class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin');
		$this->form = new $class();
		
		$this->setTemplate('index');
	}

}
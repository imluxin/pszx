<?php

/**
 * cash actions.
 *
 * @package    symfonymodel
 * @subpackage cash
 * @author     Mia
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cashActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request) {
		$this->myuser = $this->getUser()->getGuardUser();
	}
}

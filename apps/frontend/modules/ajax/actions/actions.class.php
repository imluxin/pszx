<?php

/**
 *
 * contain all ajax action
 * @author Mia
 *
 */
class ajaxActions extends sfActions {

	public function executeTest(sfWebRequest $request) {
		
	}

	/**************** manager: base_info **************************/
	public function executeUpdateUserName(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));
		$username = $request->getParameter('username');

		$myuser = $this->getUser()->getGuardUser();
		$myuser->setUsername($username);
		$myuser->save();

		return $this->renderText($username);
	}

	public function executeUpdateName(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));
		$name = $request->getParameter('name');

		$myuser = $this->getUser()->getGuardUser();
		$myuser->setFirstName($name);
		$myuser->save();

		return $this->renderText($name);
	}

	public function executeUpdatePhone(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));
		$phone = $request->getParameter('phone');

		$myuser = $this->getUser()->getGuardUser();
		$myuser->setPhone($phone);
		$myuser->save();

		return $this->renderText($phone);
	}

	public function executeUpdateBirth(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));
		$birth = $request->getParameter('birth');

		$myuser = $this->getUser()->getGuardUser();
		$myuser->setBirthday($birth);
		$myuser->save();

		return $this->renderText($birth);
	}

	public function executeUpdateAddress(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));
		$province = $request->getParameter('province');
		$city = $request->getParameter('city');

		$myuser = $this->getUser()->getGuardUser();
		$myuser->setProvince($province);
		$myuser->setCity($city);
		$myuser->save();

		return $this->renderText('ok');
	}

	public function executeUpdatePassword(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));
		$password = $request->getParameter('password');

		if($password != '' && strlen($password) >= 6) {
			$myuser = $this->getUser()->getGuardUser();
			$myuser->setPassword($password);
			$myuser->save();

			return $this->renderText('ok');
		}
	}
	/**************** manager: base_info end**************************/

	/**************** manager: buddha **************************/
	public function executeDelBuddha(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$id = $request->getParameter('id');
		$buddha = Doctrine_Core::getTable('BunddlaHall')->findOneById($id);
		if($buddha) {
			$buddha->delete();
		}

		return $this->renderText(1);
	}
	/**************** manager: buddha end**************************/

	/**************** manager: temple **************************/
	public function executeDelTemple(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$id = $request->getParameter('id');
		$temple = Doctrine_Core::getTable('Temple')->findOneById($id);
		if($temple) {
			$temple->delete();
		}

		return $this->renderText(1);
	}
	/**************** manager: temple end**************************/

	/**************** manager: oblation **************************/
	public function executeDelOblation(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$id = $request->getParameter('id');
		$oblation = Doctrine_Core::getTable('Oblation')->findOneById($id);
		if($oblation) {
			$oblation->delete();
		}

		return $this->renderText(1);
	}
	/**************** manager: oblation end**************************/

	/**************** manager: oblation **************************/
	public function executeDelArticle(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$id = $request->getParameter('id');
		$article = Doctrine_Core::getTable('Article')->findOneById($id);
		if($article) {
			$article->delete();
		}

		return $this->renderText(1);
	}
	/**************** manager: oblation end**************************/
	
	/**************** manager: memorial **************************/
	public function executeDelMemorial(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$id = $request->getParameter('id');
		$memorial = Doctrine_Core::getTable('Memorial')->findOneById($id);
		if($memorial) {
			$memorial->delete();
		}

		return $this->renderText(1);
	}
	/**************** manager: memorial end**************************/
}
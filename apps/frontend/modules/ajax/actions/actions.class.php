<?php

/**
 *
 * contain all ajax action
 * @author Mia
 *
 */
class ajaxActions extends sfActions {

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
		$province = $request->getParameter('password');

		$myuser = $this->getUser()->getGuardUser();
		$myuser->setPassword($province);
		$myuser->save();

		return $this->renderText('ok');
	}
}
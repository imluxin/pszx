<?php

class owtrActions extends sfActions {

	public function executeBuddha(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));
		
		$result = array();
		
		$user = $this->getUser()->getGuardUser();
		
		// 佛祖id
		$id = $request->getParameter('bid',-1);
		// 功能类别标识
		$type = $request->getParameter('type');
		
		
		
		if($id == -1) {
			$result['error'] = 'ERROR: 佛祖id不正确!';
			echo json_encode($result);
			exit;
		}
		
		$coins = $request->getParameter('coins');
		
		if($type == '1') {
			$coins = 30;
		} else if($type == '2') {
			$coins = $request->getParameter('coins',30);
		}else if($type == '3') {
			$coins = 1000;
		} else {
			$result['error'] = 'ERROR: 功能类别不正确!';
			echo json_encode($result);
			exit;
		}
		
		$u_coins = $user->getCoins();
		$c = $u_coins - $coins;
		
		if($c >= 0) {
			$bh = new BuddhaHistory();
			$bh->setBhId($id);
			$bh->setUserId($user->getId());
			$bh->save();
			
			$user->setCoins($c);
			$user->save();
		} else {
			$result['error'] = 'ERROR: 用户金币数量不足!';
			echo json_encode($result);
			exit;
		}
		
		$result['bless'] = Doctrine_Core::getTable('PrayWords')->getRandomWords(1);
		
		echo json_encode($result);
		
		exit;
	}

	
}

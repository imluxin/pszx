<?php

class owtrActions extends sfActions {

	public function executeBuddha(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$result = array();

		$user = $this->getUser()->getGuardUser();

		if(!$user) {
			$result['error'] = 'ERROR: 请先登录!';
			echo json_encode($result);
			exit;
		}

		// 佛祖id
		$id = $request->getParameter('bid',-1);
		// 功能类别标识
		$type = $request->getParameter('type');
		$txt = $request->getParameter('txt');

		if(!Doctrine_Core::getTable('BunddlaHall')->findOneById($id)) {
			$result['error'] = 'ERROR: 佛祖不存在!';
			echo json_encode($result);
			exit;
		}

		if($id == -1) {
			$result['error'] = 'ERROR: 佛祖id不正确!';
			echo json_encode($result);
			exit;
		}

		$coins = $request->getParameter('coins');

		if($type < 7 && $type >= 1) {
			$coins = 30;
		} else if($type == '7') {
			$coins = $request->getParameter('coins',30);
		}else if($type == '8') {
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
			$bh->setCoins($coins);
			$bh->setTxt($txt);
			$bh->setGType($type);
			$bh->save();
				
			$user->setCoins($c);
			$user->save();
			
			
			$result['bless'] = Doctrine_Core::getTable('PrayWords')->getRandomWords(1);
			$result['type_id']  = $type;
			$result['gid'] = $bh->getId();
			$result['user_id'] = $bh->getUserId();
			$result['px'] = $bh->getPointX();
			$result['py'] = $bh->getPointY();
			$result['sx'] = $bh->getScaleX();
			$result['sy'] = $bh->getScaleY();
			$result['error'] = '';
			echo json_encode($result,JSON_FORCE_OBJECT);
	
			exit;
		} else {
			$result['error'] = 'ERROR: 用户金币数量不足!';
			echo json_encode($result);
			exit;
		}
	}
}

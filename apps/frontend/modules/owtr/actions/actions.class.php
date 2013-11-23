<?php

class owtrActions extends sfActions {
	//****************buddha***************/
	public function executeBuddha(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$result = array();

		$user = $this->getUser()->getGuardUser();

		if(!$user) {
			$result['error'] = '请先登录!';
			echo json_encode($result);
			exit;
		}

		// 佛祖id
		$id = $request->getParameter('bid',-1);
		// 功能类别标识
		$type = $request->getParameter('type');
		$txt = $request->getParameter('txt');
		$coins = $request->getParameter('coins');
		$gain = sfConfig::get('gain',0.1);

		$buddha = Doctrine_Core::getTable('BunddlaHall')->findOneById($id);
		if(!$buddha) {
			$result['error'] = '佛祖不存在!!';
			echo json_encode($result);
			exit;
		}
		$buddha_owner = $buddha->getSfGuardUser();
		
		if($type < 7 && $type >= 1) {
			$coins = 30;
		} else if($type == '7') {
			$coins = $request->getParameter('coins',30);
		}else if($type == '8') {
			$coins = 1000;
		} else {
			$result['error'] = 'ERROR: 功能类别不正确!!';
			echo json_encode($result);
			exit;
		}

		$u_coins = $user->getCoins();
		$c = $u_coins - $coins;

		if($c >= 0) {
			$bh = new BunddlaHallHistory();
			$bh->setBhId($id);
			$bh->setUserId($user->getId());
			$bh->setCoins($coins);
			$bh->setTxt($txt);
			$bh->setGType('http://localhost/pszx/web/uploads/oblation/'.$type.'.jpg');
			$bh->save();

			$user->setCoins($c);
			$user->save();
			
			$buddha_owner->setCoins($buddha_owner->getCoins() + ($coins * $gain));
			$buddha_owner->save();
				
			$result['bless'] = Doctrine_Core::getTable('PrayWords')->getRandomWords(1);
			$result['type_id']  = $bh->getGType();
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
			$result['error'] = '金币数量不足。';
			echo json_encode($result);
			exit;
		}
	}

	public function executeBuddhamove(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));
		$sid = $request->getParameter('sid');
		$uid = $request->getParameter('uid');
		
		$user = $this->getUser()->getGuardUser();
		
		if($uid != $user->getId()) {
			$result['error'] = '该物品不属于你。';
			echo json_encode($result,JSON_FORCE_OBJECT);
			exit;
		}
		
		$bh_id = $request->getParameter('id');
		
		$bh = Doctrine_Core::getTable('BunddlaHallHistory')->findOneById($bh_id);

		$result = array();

		if(!$bh) {
			$result['error'] = '不存在的物品。';
			echo json_encode($result,JSON_FORCE_OBJECT);
			exit;
		}

		$px = $request->getParameter('px');
		$py = $request->getParameter('py');
		$sx = $request->getParameter('sx');
		$sy = $request->getParameter('sy');

		$bh->setPointX($px);
		$bh->setPointY($py);
		$bh->setScaleX($sx);
		$bh->setScaleY($sy);
		$bh->save();
		
		$result['error'] = '';
		$result['status'] = 1;

		echo json_encode($result,JSON_FORCE_OBJECT);
		exit;
	}
	
	public function executeBuddhainit(sfWebRequest $request) {
		$bhid = $request->getParameter('bhid');
		
		if($bhid == '' || $bhid <= 0) {echo json_encode(0,JSON_FORCE_OBJECT);exit;}
		
		$query_flash = Doctrine_Core::getTable('BunddlaHallHistory')->createQuery();
		$query_flash->where('bh_id=?',$bhid)->andWhere("created_at >= date_sub(now(), interval '1 0:0:0' day_second)");
		$bh = $query_flash->execute();
		$bh = $bh->toArray();
		echo json_encode($bh);
		
		exit;
	}
	
	//***************** temple **********************//
	public function executeTemple(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));

		$result = array();

		$user = $this->getUser()->getGuardUser();

		if(!$user) {
			$result['error'] = '请先登录!';
			echo json_encode($result);
			exit;
		}

		// temple id
		$id = $request->getParameter('tid',-1);
		// 功能类别标识
		$type = $request->getParameter('type');
		$txt = $request->getParameter('txt');
		$coins = $request->getParameter('coins');
		$gain = sfConfig::get('gain',0.1);

		$temple = Doctrine_Core::getTable('Temple')->findOneById($id);
		if(!$temple) {
			$result['error'] = '寺庙不存在!!';
			echo json_encode($result);
			exit;
		}
		$temple_owner = $temple->getSfGuardUser();
		
		if($type < 7 && $type >= 1) {
			$coins = 30;
		} else if($type == '7') {
			$coins = $request->getParameter('coins',30);
		}else if($type == '8') {
			$coins = 1000;
		} else {
			$result['error'] = 'ERROR: 功能类别不正确!!';
			echo json_encode($result);
			exit;
		}

		$u_coins = $user->getCoins();
		$c = $u_coins - $coins;

		if($c >= 0) {
			$th = new TempleHistory();
			$th->setTId($id);
			$th->setUserId($user->getId());
			$th->setCoins($coins);
			$th->setTxt($txt);
			$th->setGType('http://localhost/pszx/web/uploads/oblation/'.$type.'.jpg');
			$th->save();

			$user->setCoins($c);
			$user->save();
			
			$temple_owner->setCoins($temple_owner->getCoins() + ($coins * $gain));
			$temple_owner->save();
				
			$result['bless'] = Doctrine_Core::getTable('PrayWords')->getRandomWords(1);
			$result['type_id']  = $th->getGType();
			$result['gid'] = $th->getId();
			$result['user_id'] = $th->getUserId();
			$result['px'] = $th->getPointX();
			$result['py'] = $th->getPointY();
			$result['sx'] = $th->getScaleX();
			$result['sy'] = $th->getScaleY();
			$result['error'] = '';
			echo json_encode($result,JSON_FORCE_OBJECT);

			exit;
		} else {
			$result['error'] = '金币数量不足。';
			echo json_encode($result);
			exit;
		}
	}
	
	public function executeTemplemove(sfWebRequest $request) {
		$this->forward404Unless($request->isMethod(sfRequest::POST));
		$sid = $request->getParameter('sid');
		$uid = $request->getParameter('uid');
		
		$user = $this->getUser()->getGuardUser();
		
		if($uid != $user->getId()) {
			$result['error'] = '该物品不属于你。';
			echo json_encode($result,JSON_FORCE_OBJECT);
			exit;
		}
		
		$t_id = $request->getParameter('id');
		
		$th = Doctrine_Core::getTable('TempleHistory')->findOneById($t_id);

		$result = array();

		if(!$th) {
			$result['error'] = '不存在的物品。';
			echo json_encode($result,JSON_FORCE_OBJECT);
			exit;
		}

		$px = $request->getParameter('px');
		$py = $request->getParameter('py');
		$sx = $request->getParameter('sx');
		$sy = $request->getParameter('sy');

		$th->setPointX($px);
		$th->setPointY($py);
		$th->setScaleX($sx);
		$th->setScaleY($sy);
		$th->save();
		
		$result['error'] = '';
		$result['status'] = 1;

		echo json_encode($result,JSON_FORCE_OBJECT);
		exit;
	}
	
	public function executeTempleinit(sfWebRequest $request) {
		$bhid = $request->getParameter('tid');
		
		if($bhid == '' || $bhid <= 0) {echo json_encode(0,JSON_FORCE_OBJECT);exit;}
		
		$query_flash = Doctrine_Core::getTable('TempleHistory')->createQuery();
		$query_flash->where('t_id=?',$bhid)->andWhere("created_at >= date_sub(now(), interval '1 0:0:0' day_second)");
		$bh = $query_flash->execute();
		$bh = $bh->toArray();
		echo json_encode($bh);
		
		exit;
	}
}

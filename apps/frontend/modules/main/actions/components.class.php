<?php

class mainComponents extends sfComponents {

	public function executeBuddha() {
		$this->buddhas = $this->getRecommendResult('BunddlaHall');
	}

	public function executeTemple() {
		$this->temple = $this->getRecommendResult('Temple');
	}

	public function executeOblation() {
		$this->oblation = $this->getRecommendResult('Oblation');
	}

	public function executeMemorial() {
		$this->memorial = $this->getRecommendResult('Memorial');
	}

	public function executeFjzx(sfWebRequest $request) {
		$this->fjzxa1 = $this->getRecommendResult('FJZXA1','Article');
		$this->fjzxa2 = $this->getRecommendResult('FJZXA2','Article');
		
		$tmp = array();
		
		if($this->fjzxa1) {
			foreach($this->fjzxa1 as $one) {
				$tmp[] = $one->getId();
			}
		}
		if($this->fjzxa2) {
			foreach($this->fjzxa2 as $one) {
				$tmp[] = $one->getId();
			}
		}
		$this->article = Doctrine_Core::getTable('Article')->getIndexArticle(1,$tmp);
	}

	public function executeCsjz(sfWebRequest $request) {
		$this->csjza3 = $this->getRecommendResult('CSJZA3','Article');
		$this->csjza4 = $this->getRecommendResult('CSJZA4','Article');

		$tmp = array();
		
		if($this->csjza3) {
			foreach($this->csjza3 as $one) {
				$tmp[] = $one->getId();
			}
		}
		if($this->csjza4) {
			foreach($this->csjza4 as $one) {
				$tmp[] = $one->getId();
			}
		}
		$this->article = Doctrine_Core::getTable('Article')->getIndexArticle(3,$tmp);
	}
	
	public function executeZyjw(sfWebRequest $request) {
		$this->zyjwa5 = $this->getRecommendResult('ZYJWA5','Article');
		$this->zyjwa6 = $this->getRecommendResult('ZYJWA6','Article');
		
		$tmp = array();
		
		if($this->zyjwa5) {
			foreach($this->zyjwa5 as $one) {
				$tmp[] = $one->getId();
			}
		}
		if($this->zyjwa6) {
			foreach($this->zyjwa6 as $one) {
				$tmp[] = $one->getId();
			}
		}
		
		$this->article = Doctrine_Core::getTable('Article')->getIndexArticle(5,$tmp);
	}

	public function executeTchd(sfWebRequest $request) {
		$this->tchda7 = $this->getRecommendResult('TCHDA7','Article');
		$this->tchda8 = $this->getRecommendResult('TCHDA8','Article');
		
		$tmp = array();
		
		if($this->tchda7) {
			foreach($this->tchda7 as $one) {
				$tmp[] = $one->getId();
			}
		}
		if($this->tchda8) {
			foreach($this->tchda8 as $one) {
				$tmp[] = $one->getId();
			}
		}
		
		$this->article = Doctrine_Core::getTable('Article')->getIndexArticle(4,$tmp);
	}

	protected function getRecommendResult($type,$model='') {
		if($model == '')
		$model = $type;
			
		$query = Doctrine_Core::getTable('Recommend')->createQuery('r');
		$query->select('r.r_id')->where('r.r_type=?',$type);
		$recommend = $query->execute();
		$tmp = array();
		foreach($recommend as $one) {
			$tmp[] = $one->getRId();
		}
		
		if(count($tmp) >= 1) { 
			$query = Doctrine_Core::getTable($model)->createQuery();
			$query->whereIn('id', $tmp);
			return $query->execute();
		}
		
		return array();
	}


}

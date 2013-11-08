<?php

/**
 * BunddlaHallTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class BunddlaHallTable extends Doctrine_Table
{
	/**
	 * Returns an instance of this class.
	 *
	 * @return object BunddlaHallTable
	 */
	public static function getInstance()
	{
		return Doctrine_Core::getTable('BunddlaHall');
	}

	public function getListOnPage($page=1,$limit=18){
		$page = $page<=0?1:$page;
		return $this->createQuery()->offset(($page-1)*$limit)->limit($limit);
	}
}
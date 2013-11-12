<?php

/**
 * ArticleTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ArticleTable extends Doctrine_Table
{
	/**
	 * Returns an instance of this class.
	 *
	 * @return object ArticleTable
	 */
	public static function getInstance()
	{
		return Doctrine_Core::getTable('Article');
	}

	public function getListOnPage($page=1,$limit=18){
		$page = $page<=0?1:$page;
		return $this->createQuery()->offset(($page-1)*$limit)->limit($limit);
	}
	
	public function getIndexArticle($cagegory_id = 1,$notin = array(),$limit=15) {
		$query = Doctrine_Core::getTable('Article')->createQuery('a');
		$query->select('a.id,a.title')->where('a.category_id=?', $cagegory_id)
		->andWhereNotIn('a.id', $notin)
		->andWhere('a.is_approved=1')
		->andWhere('a.is_rejected=0')
		->orderBy('a.id DESC')->limit($limit);
		return $query->execute();
	}
}
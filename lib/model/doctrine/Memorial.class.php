<?php

/**
 * Memorial
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    symfonymodel
 * @subpackage model
 * @author     Mia
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Memorial extends BaseMemorial
{
	static public function getFileDir()
	{
		return sfConfig::get('sf_upload_dir') . '/memorial';
	}

	public function getPublicFileLocation1()
	{
		return str_replace(sfConfig::get('sf_web_dir'), '', self::getFileDir()) . '/' . $this->getDiePhotoOne();
	}
	public function getPublicFileLocation2()
	{
		return str_replace(sfConfig::get('sf_web_dir'), '', self::getFileDir()) . '/' . $this->getDiePhotoTwo();
	}

	public function save( Doctrine_Connection $conn = null ) {
		$user = sfContext::getInstance()->getUser()->getGuardUser();

		if($user) {
			$this->setLastModify($user->getUsername());
		} else {
			$this->setLastModify(' ');
		}

		return parent::save( $conn );
	}
	
	public function delete(Doctrine_Connection $conn = null) {
		if($this->getDiePhotoOne() != '')
		unlink(sfConfig::get('sf_upload_dir').'/memorial/'.$this->getDiePhotoOne());

		if($this->getDiePhotoTwo() != '')
		unlink(sfConfig::get('sf_upload_dir').'/memorial/'.$this->getDiePhotoTwo());
			

		return parent::delete($conn);
	}
}
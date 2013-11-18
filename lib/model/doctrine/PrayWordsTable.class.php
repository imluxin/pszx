<?php

/**
 * PrayWordsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PrayWordsTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object PrayWordsTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PrayWords');
    }
    
    public function getRandomWords($type) {
    	// 1:佛殿，2:寺庙，3:纪念馆
    	$words = $this->findOneById($type);
    	$words = $words->getWords();
    	
    	$words = explode('、', $words);
    	$rand = rand(0, count($words)-1);
    	return $words[$rand];
    }
}
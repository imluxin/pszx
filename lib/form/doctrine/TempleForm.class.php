<?php

/**
 * Temple form.
 *
 * @package    symfonymodel
 * @subpackage form
 * @author     Mia
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TempleForm extends BaseTempleForm
{
	public function configure()
	{
		unset(
			$this['user_id'],
			$this['user_name'],
			$this['created_at'],
			$this['updated_at']
		);
		
		$this->widgetSchema['province'] = new sfWidgetFormChoice(array(
		  'choices'  => array(),
		  'multiple' => false, 
		  'expanded' => false
			)
		);
		
		$this->validatorSchema['province'] = new sfValidatorString(array(),array(
			'required'=>'选择省份。'
		));
		
		$this->widgetSchema['city'] = new sfWidgetFormChoice(array(
		  'choices'  => array(),
		  'multiple' => false, 
		  'expanded' => false
			)
		);
		
		$this->validatorSchema['city'] = new sfValidatorString(array(),array(
			'required'=>'选择城市。'
		));

		$this->widgetSchema['block'] = new sfWidgetFormChoice(array(
		  'choices'  => array(),
		  'multiple' => false, 
		  'expanded' => false
			)
		);
		
		$this->validatorSchema['block'] = new sfValidatorString(array(),array(
			'required'=>'选择区县。'
		));

		$this->widgetSchema['img_one'] = new sfWidgetFormInputFileEditable(array(
		    'file_src' => $this->getObject()->getPublicFileLocation1(),
		    'is_image' => true,
		    'with_delete' => false,
		    'edit_mode' => !$this->isNew() && $this->getObject()->getImgOne()
			));
				
		$this->validatorSchema['img_one'] = new sfValidatorFile(array(
				    'mime_types' => 'web_images',
				    'path' => $this->getObject()->getFileDir(),
					'required' => false
					),array(
						//'required'=>'实景照片1不能为空。'
					)
				);
		$this->widgetSchema['img_two'] = new sfWidgetFormInputFileEditable(array(
		    'file_src' => $this->getObject()->getPublicFileLocation2(),
		    'is_image' => true,
		    'with_delete' => false,
		    'edit_mode' => !$this->isNew() && $this->getObject()->getImgOne()
			));
				
		$this->validatorSchema['img_two'] = new sfValidatorFile(array(
				    'mime_types' => 'web_images',
				    'path' => $this->getObject()->getFileDir(),
					'required' => false
					),array(
						//'required'=>'实景照片2不能为空。'
					)
				);	

		$this->widgetSchema['img_three'] = new sfWidgetFormInputFileEditable(array(
		    'file_src' => $this->getObject()->getPublicFileLocation3(),
		    'is_image' => true,
		    'with_delete' => false,
		    'edit_mode' => !$this->isNew() && $this->getObject()->getImgOne()
			));
				
		$this->validatorSchema['img_three'] = new sfValidatorFile(array(
				    'mime_types' => 'web_images',
				    'path' => $this->getObject()->getFileDir(),
					'required' => false
					),array(
						//'required'=>'实景照片3不能为空。'
					)
				);		

		$this->widgetSchema['description'] = new sfWidgetFormTextarea();
		
		$this->validatorSchema['name'] = new sfValidatorString(
									array('required'=>true),
									array('required'=>'菩萨名称不能为空。')
									);
		$this->validatorSchema['description'] = new sfValidatorString(
									array('required'=>true),
									array('required'=>'菩萨介绍不能为空。')
									);

		$this->widgetSchema['description'] = new sfWidgetFormTextareaTinyMCE(array(
		  'width'  => 680,
		  'height' => 350,
		  'config' => 'theme_advanced_disable: "anchor,image,cleanup,help",forced_root_block:false',
		));
		
		$this->widgetSchema->setLabels(array(
		  'name' => '名山寺庙名称：',
		  'img_one' => '实景照片1：',
		  'img_two' => '实景照片2：',
		  'img_three' => '实景照片3：',
		  'description' => '名山寺庙介绍：',
		  'province' => ' ',
		  'city' => ' ',
		  'block' => ' '
		));
	}
}

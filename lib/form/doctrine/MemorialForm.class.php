<?php

/**
 * Memorial form.
 *
 * @package    symfonymodel
 * @subpackage form
 * @author     Mia
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MemorialForm extends BaseMemorialForm
{
	public function configure() {
		unset(
			$this['user_id'],
			$this['user_name'],
			$this['created_at'],
			$this['updated_at'],
			$this['is_single']
		);
		
		$this->widgetSchema['die_province_one'] = new sfWidgetFormChoice(array(
		  'choices'  => array(),
		  'multiple' => false, 
		  'expanded' => false
			)
		);
		
		$this->validatorSchema['die_province_one'] = new sfValidatorString(array(),array(
			'required'=>'选择省份。'
		));
		
		$this->widgetSchema['die_city_one'] = new sfWidgetFormChoice(array(
		  'choices'  => array(),
		  'multiple' => false, 
		  'expanded' => false
			)
		);
		
		$this->validatorSchema['die_city_one'] = new sfValidatorString(array(),array(
			'required'=>'请选择城市。'
		));
		
		$this->widgetSchema['die_province_two'] = new sfWidgetFormChoice(array(
		  'choices'  => array(),
		  'multiple' => false, 
		  'expanded' => false
			)
		);
		
		$this->validatorSchema['die_province_two'] = new sfValidatorString(array(),array(
			'required'=>'选择省份。'
		));
		
		
		$this->widgetSchema['die_city_two'] = new sfWidgetFormChoice(array(
		  'choices'  => array(),
		  'multiple' => false, 
		  'expanded' => false
			)
		);
		
		$this->validatorSchema['die_city_two'] = new sfValidatorString(array(),array(
			'required'=>'请选择城市。'
		));
		
		/*photo*/
		$this->validatorSchema['die_photo_one'] = new sfValidatorFile(array(
				    'mime_types' => 'web_images',
				    'path' => $this->getObject()->getFileDir(),
					'required' => false
					),array(
						'required'=>'请为逝者A选择照片。'
					)
				);
		$this->widgetSchema['die_photo_one'] = new sfWidgetFormInputFileEditable(array(
		    'file_src' => $this->getObject()->getPublicFileLocation1(),
		    'is_image' => true,
		    'with_delete' => false,
		    'edit_mode' => !$this->isNew() && $this->getObject()->getDiePhotoOne()
			));
			
		$this->validatorSchema['die_photo_two'] = new sfValidatorFile(array(
			    'mime_types' => 'web_images',
			    'path' => $this->getObject()->getFileDir(),
				'required' => false
				),array(
					'required'=>'请为逝者B选择照片。'
				)
			);
		$this->widgetSchema['die_photo_two'] = new sfWidgetFormInputFileEditable(array(
		    'file_src' => $this->getObject()->getPublicFileLocation2(),
		    'is_image' => true,
		    'with_delete' => false,
		    'edit_mode' => !$this->isNew() && $this->getObject()->getDiePhotoTwo()
			));
		/*photo end*/

		$this->validatorSchema['m_name'] = new sfValidatorString(array(),array(
			'required'=>'请输入纪念馆名称。'
		));
		
		$this->widgetSchema['description'] = new sfWidgetFormTextareaTinyMCE(array(
		  'width'  => 680,
		  'height' => 350,
		  'config' => 'theme_advanced_disable: "anchor,image,cleanup,help",forced_root_block:false',
		));
		
		$this->widgetSchema->setLabels(array(
		  'm_name' => '纪念馆名称：',
		  'category_id' => '纪念馆分类： ',
		  'is_secret' => '是否保密：',
		  'die_name_one' => '姓名：',
		  'die_province_one' => '地区：',
		  'die_city_one' => ' ',
		  'die_birth_one' => '生日：',
		  'die_die_one' => '忌日：',
		  'die_nickname_one' => '称呼：',
		  'die_photo_one' => '逝者头像：',
  		  'die_name_two' => '姓名：',
		  'die_province_two' => '地区：',
		  'die_city_two' => ' ',
		  'die_birth_two' => '生日：',
		  'die_die_two' => '忌日：',
		  'die_nickname_two' => '称呼：',
		  'die_photo_two' => '逝者头像：',
		  'description' => '生平介绍：'
		));
	}
}

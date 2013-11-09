<?php

/**
 * BunddlaHall form.
 *
 * @package    symfonymodel
 * @subpackage form
 * @author     Mia
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BunddlaHallForm extends BaseBunddlaHallForm
{
	public function configure() {
		unset(
		$this['user_id'],
		$this['created_at'],
		$this['updated_at']
		);

		$this->widgetSchema['images'] = new sfWidgetFormInputFileEditable(array(
		    'file_src' => $this->getObject()->getPublicFileLocation(),
		    'is_image' => true,
		    'with_delete' => false,
		    'edit_mode' => !$this->isNew() && $this->getObject()->getImages(),
			));
				
		$this->validatorSchema['images'] = new sfValidatorFile(array(
					'required' => false,
				    'mime_types' => 'web_images',
				    'path' => $this->getObject()->getFileDir(),
					),array(
						//'required'=>'菩萨动画图片不能为空。'
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
		  'name' => '菩萨名称：',
		  'images' => '菩萨动画图片：',
		  'description' => '菩萨介绍：',
		));
	}
}

<?php

/**
 * Oblation form.
 *
 * @package    symfonymodel
 * @subpackage form
 * @author     Mia
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class OblationForm extends BaseOblationForm
{
	public function configure()
	{
		unset(
		$this['user_id'],
		$this['user_name'],
		$this['created_at'],
		$this['updated_at']
		);
		
		$this->validatorSchema['name'] = new sfValidatorString(
									array('required'=>true),
									array('required'=>'祭品名称不能为空。')
									);
									
		$this->widgetSchema['images'] = new sfWidgetFormInputFileEditable(array(
		    'file_src' => $this->getObject()->getPublicFileLocation(),
		    'is_image' => true,
		    'with_delete' => false,
		    'edit_mode' => !$this->isNew() && $this->getObject()->getImages()
			));
			
		$this->validatorSchema['images'] = new sfValidatorFile(array(
				    'mime_types' => 'web_images',
				    'path' => $this->getObject()->getFileDir(),
					'required' => false
					),array(
						//'required'=>'实景照片3不能为空。'
					)
				);									
		$this->widgetSchema->setLabels(array(
		  'name' => '祭品名称：',
		  'category_id' => '祭品分类：',
		  'price' => '祭品单价：',
		  'times' => '显示时间：',
		  'images' => '祭品图片：'
		));
	}
}

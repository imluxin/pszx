<?php

/**
 * Adv form.
 *
 * @package    symfonymodel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdvForm extends BaseAdvForm
{
	public function configure()
	{
		unset(
		$this['block'],
		$this['created_at'],
		$this['updated_at']
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
		),array()
		);

		$this->widgetSchema->setLabels(array(
		  	'title' => '广告标题：',
			'start_date' => '开始日：',
			'end_date' => '结束日：',
			'url' => '链接网址：',
			'images' => '上传图片：',
		));
	}
}

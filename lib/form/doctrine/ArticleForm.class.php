<?php

/**
 * Article form.
 *
 * @package    symfonymodel
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArticleForm extends BaseArticleForm
{
	public function configure()
	{
		unset(
			$this['user_id'],
			$this['user_name'],
			$this['created_at'],
			$this['updated_at']
		);
		
		$this->validatorSchema['title'] = new sfValidatorString(array(),array(
			'required'=>'请输入帖子标题。'
		));
		
		$this->widgetSchema['content'] = new sfWidgetFormTextareaTinyMCE(array(
		  'width'  => 680,
		  'height' => 350,
		  'config' => 'theme_advanced_disable: "anchor,image,cleanup,help",forced_root_block:false',
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
		
		$this->widgetSchema->setLabels(array(
		  'title' => '帖子标题：',
		  'category_id' => '帖子分类：',
		  'img_one' => '分享图片1：',
		  'img_two' => '分享图片2：',
		  'img_three' => '分享图片3：',
		  'content' => '帖子内容：',
		));
	}
}

<?php

/**
 * Comment form.
 *
 * @package    symfonymodel
 * @subpackage form
 * @author     Mia
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CommentForm extends BaseCommentForm
{
	public function configure()
	{
		unset(
		$this['user_id'],
		$this['article_id'],
		$this['created_at'],
		$this['updated_at']
		);

		$this->widgetSchema['article_id'] = new sfWidgetFormInputHidden();
		$this->validatorSchema['article_id'] = new sfValidatorInteger(array(),array());
		
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
		//'required'=>'实景照片1不能为空。'
		)
		);

		$this->validatorSchema['content'] = new sfValidatorString(
		array('required'=>true),
		array('required'=>'请输入回复内容。')
		);

		$this->widgetSchema['content'] = new sfWidgetFormTextarea(array(),array());

		$this->widgetSchema->setLabels(array(
		  'images' => '插图：'
		  ));
	}
}

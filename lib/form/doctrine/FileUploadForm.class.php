<?php

/**
 * FileUpload form.
 *
 * @package    symfonymodel
 * @subpackage form
 * @author     Mia
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FileUploadForm extends BaseFileUploadForm
{
	public function configure() {
		unset(
			$this['user_id'],
			$this['created_at'],
			$this['updated_at']
		);

		$this->widgetSchema['file'] = new sfWidgetFormInputFileEditable(array(
		    'file_src' => $this->getObject()->getPublicFileLocation(),
		    'is_image' => true,
		    'with_delete' => false,
		    'edit_mode' => !$this->isNew() && $this->getObject()->getFile()
		));

		$this->validatorSchema['file'] = new sfValidatorFile(array(
				    'mime_types' => 'web_images',
				    'path' => $this->getObject()->getFileDir(),
					'required' => false
		),array(
		//'required'=>'实景照片1不能为空。'
		)
		);
	}
}

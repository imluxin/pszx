<?php
class RegisterForm extends sfGuardUserForm
{
	public function configure() {
		// Remove all widgets we don't want to show
		unset(
		$this['is_active'],
		$this['is_super_admin'],
		$this['updated_at'],
		$this['groups_list'],
		$this['permissions_list'],
		$this['last_login'],
		$this['created_at'],
		$this['salt'],
		$this['algorithm'],
		$this['phone'],
		$this['birthday']
		);

		// Setup proper password validation with confirmation
		$this->widgetSchema['password'] = new sfWidgetFormInputPassword();
		$this->validatorSchema['password']->setOption('required', true);
		$this->widgetSchema['password_confirmation'] = new sfWidgetFormInputPassword();
		$this->validatorSchema['password_confirmation'] = clone $this->validatorSchema['password'];

		$this->widgetSchema->moveField('password_confirmation', 'after', 'password');

		$this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_confirmation', array(), array('invalid' => '两次输入的密码不同。','required'=>'确认密码不能为空')));

		$this->widgetSchema['gender'] = new sfWidgetFormChoice(
		array(
					'choices'  => array('1' => '男', '0' => '女'),
					'multiple' => false, 
					'expanded' => true
		)
		);

		$this->widgetSchema['province'] = new sfWidgetFormChoice(array(
		  'choices'  => array('null' => '省\市\自治区'),
		  'multiple' => false, 
		  'expanded' => false
		));

		$this->widgetSchema['city'] = new sfWidgetFormChoice(array(
		  'choices'  => array('null' => '城市'),
		  'multiple' => false, 
		  'expanded' => false
		));

		$this->validatorSchema['email_address'] =  new sfValidatorEmail(
							array(),
							array(
								'required'=>'邮箱不能为空。',
								'invalid'=>'请正确输入电子邮箱。'
								)
							);						

        $this->validatorSchema['username']
        	->setOption('required',true)
        	->setMessage('required','昵称不能为空。');
		
		$this->validatorSchema['password']
			->setOption('required',true)
			->setOption('min_length',6)
			->setOption('max_length',20)
			->setMessage('required','密码不能为空。')
			->setMessage('min_length','密码长度为6~20。')
			->setMessage('max_length','密码长度为6~20。');							
		
							
							
		$this->widgetSchema['captcha'] = new sfWidgetCaptchaGD();
		$this->validatorSchema['captcha'] = new sfCaptchaGDValidator(
			array(
					'length' => 4
			),
			array(
				'length' => '验证码长度为4。',
				'required' => '验证码不能为空。',
				'invalid' => '输入的验证错误。'
			)
		);

		$this->widgetSchema->setLabels(array(
		  'email_address' => ' ',
		  'username' => ' ',
		  'password' => ' ',
		  'gender' => ' ',
		  'city' => ' ',
		  'province' => ' ',
		  'password_confirmation' => ' '
		  ));
	}
}
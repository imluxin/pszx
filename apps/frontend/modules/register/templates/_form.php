<?php use_javascript("address.js")?>
<?php echo $form->renderFormTag(url_for('register/index')) ?>
<table>
	<tr>
		<td>登录邮箱：</td>
		<td><?php echo $form['email_address'] ?></td>
		<td>请输入有效的邮箱</td>
		<td style="color: red;"><?php echo $form['email_address']->getError() ?></td>
	</tr>
	<tr>
		<td>昵称：</td>
		<td><?php echo $form['username'] ?></td>
		<td>中英文数字组成</td>
		<td style="color: red;"><?php echo $form['username']->getError() ?></td>
	</tr>
	<tr>
		<td>设置密码：</td>
		<td><?php echo $form['password'] ?></td>
		<td>输入6-20位数字英文密码</td>
		<td style="color: red;"><?php echo $form['password']->getError() ?></td>
	</tr>
	<tr>
		<td>重复密码：</td>
		<td><?php echo $form['password_confirmation'] ?></td>
		<td>请再输入一次密码</td>
		<td style="color: red;"></td>
	</tr>
	<tr>
		<td>您的性别：</td>
		<td><?php echo $form['gender'] ?></td>
		<td>请选择您的性别</td>
		<td style="color: red;"><?php echo $form['gender']->getError() ?></td>
	</tr>
	<tr>
		<td>所在地区：</td>
		<td><?php echo $form['province']?>&nbsp;<?php echo $form['city']?></td>
		<td>请选择您所在地区</td>
		<td style="color: red;">
			<?php echo $form['province']->getError() ?>
			<?php echo $form['city']->getError() ?>
		</td>
	</tr>
	<tr>
		<td>验证代码：</td>
		<td><?php echo $form['captcha'] ?></td>
		<td style="color: red;"><?php echo $form['captcha']->getError() ?></td>
	</tr>
</table>
<select id="area_id" style="display:none"></select>
<p class="regFormSubmit"><input id="fwtk" type="checkbox"
	checked="checked" />&nbsp;我已经阅读并同意菩萨在线网的[<a href="#">服务条款</a>]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
	class="btnPurple" type="submit" value="确认注册" name="register"
	onclick="return check_reg_info();" /></p>
<?php echo $form['_csrf_token']?>
</form>
<?php use_javascript('reg_check.js')?>
<script>
$.address('sf_guard_user_province','sf_guard_user_city','area_id');
</script>
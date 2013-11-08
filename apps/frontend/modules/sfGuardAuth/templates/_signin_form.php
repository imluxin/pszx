<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
	<?php echo $form['_csrf_token'] ?>
	<table>
		<tr>
			<td>用户名：</td>
			<td><?php echo $form['username']  ?></td>
			<td rowspan="2"><input class="btnPurple regFormSubmitBtn"
				type="submit" value="登录" />
			</td>
		</tr>
		<tr>
			<td>输入密码：</td>
			<td><?php echo $form['password']  ?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2"><label><?php echo $form['remember']  ?>&nbsp;下次自动登录</label>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#">忘记密码</a>
			</td>
		</tr>
	</table>
</form>
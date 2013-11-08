<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
<div class="login clearfix">
	<?php echo $form['_csrf_token'] ?>
	<ul class="loginInput">
		<li><?php echo $form['username']  ?></li>
		<li><?php echo $form['password']  ?></li>
		<li><label><?php echo $form['remember']  ?>&nbsp;下次自动登录</label></li>
	</ul>
	<p class="loginBtn">
		<input class="btnPurple" type="submit" value="登录" />
	</p>
</div>
</form>

<?php /*
  <table>
    <tbody>
      <?php echo $form ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" value="登录" />
          
          <?php $routes = $sf_context->getRouting()->getRoutes() ?>
          <?php if (isset($routes['sf_guard_forgot_password'])): ?>
            <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
          <?php endif; ?>

          <?php if (isset($routes['sf_guard_register'])): ?>
            &nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
          <?php endif; ?>
        </td>
      </tr>
    </tfoot>
  </table>
  
  <!--div class="login clearfix">
					<ul class="loginInput">
						<li><input type="text" value="用户名" /></li>
						<li><input type="text" value="密码" /></li>
						<li><label><input type="checkbox" />&nbsp;下次自动登录</label></li>
					</ul>
					<p class="loginBtn">
						<input class="btnPurple" type="submit" value="登录" />
					</p>
				</div -->
*/?>
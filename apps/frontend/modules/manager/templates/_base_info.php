<?php use_javascript("jqueryui/ui/jquery-ui.js")?>
<?php use_javascript("jqueryui/ui/i18n/jquery-ui-i18n.js")?>
<?php use_javascript("address.js")?>
<table>
	<tr>
		<td>注册邮箱</td>
		<td><?php echo $myuser->getEmailAddress() ?></td>
		<td>&nbsp;</td>
		<td>不能更改</td>
	</tr>
	<tr>
		<td>密 码</td>
		<td>
		<?php 
			echo jq_form_remote_tag(array(
						'url' => 'ajax/UpdatePassword',
						'success' => 'location.href="'.url_for('@sf_guard_signout').'"',
					), array())
		?>
		
		<input type="password" name="password" value="<?php // echo $myuser->getPassword() ?>"/>
		&nbsp;
		<input class="btnPurple" type="submit" value="确认" />
		</form>
		</td>
		<td>密码修改成功后，需要重新登录。</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>昵 称</td>
		<td>
		<?php 
			echo jq_form_remote_tag(array(
						'url' => 'ajax/UpdateUserName',
						'success' => '$("#username").val(data);$("#usernametips").html("更改成功！").fadeIn(100).fadeOut(1000);location.reload();',
					), array())
		?>
		<input type="text" name="username" id="username" value="<?php echo $myuser->getUsername() ?>"/>
		&nbsp;
		<input class="btnPurple" type="submit" value="确认" />
		</form>
		</td>
		<td><span style="display: none;" id="usernametips"></span></td>
		<td>可以更改</td>
	</tr>
	<tr>
		<td>真实姓名</td>
		<td>
		<?php 
			echo jq_form_remote_tag(array(
						'url' => 'ajax/UpdateName',
						'success' => '$("#name").val(data);$("#nametips").html("更改成功！").fadeIn(100).fadeOut(1000);location.reload();',
					), array())
		?>
		<input type="text" name="name" id="name" value="<?php echo $myuser->getFirstName() ?>" />
		&nbsp;
		<input class="btnPurple" type="submit" value="确认" />
		</form>
		</td>
		<td><span style="display: none;" id="nametips"></span></td>
		<td>用于提现时核对</td>
	</tr>
	<tr>
		<td>联系手机</td>
		<td>
		<?php 
			echo jq_form_remote_tag(array(
						'url' => 'ajax/UpdatePhone',
						'success' => '$("#phone").val(data);$("#phonetips").html("更改成功！").fadeIn(100).fadeOut(1000);location.reload();',
					), array())
		?>
		<input type="text" name="phone" id="phone" value="<?php echo $myuser->getPhone() ?>" />
		&nbsp;
		<input class="btnPurple" type="submit" value="确认" />
		</form>
		</td>
		<td><span style="display: none;" id="phonetips"></span></td>
		<td>用于提现时核对</td>
	</tr>
	<tr>
		<td>出生年月</td>
		<td>
		<?php 
			echo jq_form_remote_tag(array(
						'url' => 'ajax/UpdateBirth',
						'success' => '$("#birth").val(data);$("#birthtips").html("更改成功！").fadeIn(100).fadeOut(1000);location.reload();',
					), array())
		?>
		<input type="text" name="birth" id="birth" value="<?php $d = new DateTime($myuser->getBirthday()); echo $d->format("Y-m-d"); ?>" />
		&nbsp;
		<input class="btnPurple" type="submit" value="确认" />
		</form>
		</td>
		<td><span style="display: none;" id="birthtips"></span></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>所在地区</td>
		<td>
		<?php 
			echo jq_form_remote_tag(array(
						'url' => 'ajax/UpdateAddress',
						'success' => 'location.reload();',
					), array())
		?>
		
		<select name="province" id="province">
		</select> 
		<select name="city" id="city">
		</select>
		<select style="display: none;" id="area_id"></select>
		&nbsp;
		<input class="btnPurple" type="submit" value="确认" />
		</form>
		</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
</table>

<script>
$(function() {
	$( "#birth" ).datepicker({
		changeMonth: true,
		changeYear: true
	});
});

$.address('province','city','area_id','<?php echo $myuser->getProvince() ?>','<?php echo $myuser->getCity() ?>');
</script>
<div class="admin_userInfo admin_box">
<div class="subTitle">用户资料管理
<div class="admin_userInfo_search">
<form method="get" action="<?php echo url_for('manager/manager')?>">
	<input name="name" type="text" value="<?php echo $name ?>" 	size="20" />&nbsp;
	<input name="username" type="text" value="<?php echo $username ?>" />&nbsp;
	<input name="email" type="text" value="<?php echo $email ?>" />&nbsp;
	<input name="phone" type="text" value="<?php echo $phone ?>" />&nbsp;
	<input class="btnPurple" type="submit" value="查询" />
</form>
</div>
</div>
<div class="cont">
<table class="table">
	<tr>
		<td>序号</td>
		<td>姓名</td>
		<td>昵称</td>
		<td>性别</td>
		<td>地区</td>
		<td>注册邮箱</td>
		<td>联系手机</td>
		<td>当前级别|管理级别设置</td>
	</tr>
	<?php foreach($result as $one):?>
	<tr>
		<td><?php echo $one->getId() ?></td>
		<td><?php echo $one->getFirstName()?></td>
		<td><?php echo $one->getUsername()?></td>
		<td><?php echo $one->getGender() == 0 ? '女' : '男' ?></td>
		<td><?php echo $one->getProvince().'-'.$one->getCity() ?></td>
		<td><?php echo $one->getEmailAddress()?></td>
		<td><?php echo $one->getPhone() ?></td>
		<td>
		<select id="permission_<?php echo $one->getId() ?>">
			<option value='-1'>无</option>
			<?php foreach($permission as $p):?>
			<option <?php if($one->getHigerPermission() == $p->getName() ) echo 'selected'?> value="<?php echo $p->getId() ?>"><?php echo $p->getDescription() ?></option>
			<?php endforeach;?>
		</select>
		<input class="btnPurple" type="button" value="修改" onclick="changePermission(<?php echo $one->getId() ?>)" />
		</td>
	</tr>
	<?php endforeach;?>
</table>
<script type="text/javascript">
	function changePermission(uid) {
		if(confirm('确定修改？')) {
			var p = $('#permission_'+uid).val();
			var url = '<?php echo url_for('ajax/changepermission')?>?id='+uid+'&permission='+p;

			$.ajax({
				type: "post",
				url: url,
				success: function(data, textStatus){
					if(data == 1) location.reload();
				}
			});
		}
	}
</script>
<div class="pages">
<?php if(count($pg)>0): ?>
<?php if($pg->getPage()==1): ?>
<!-- 如果当前是第1页 -->
<a class="disabled">首页</a>
<a class="disabled">前一页</a>
<?php else : ?>
<a href="<?php echo url_for('manager/user?page=1'.urldecode($search_url)) ?>">首页</a>
<a
	href="<?php echo url_for('manager/user?page='.$pg->getPreviousPage().urldecode($search_url)) ?>">前一页</a>
<!-- 前一页号 -->
<?php endif; ?>
<?php foreach ($pg->getLinks() as $page): ?>
<!-- 页号集合 -->
<?php if($page==$pg->getPage()): ?>
<a class="current"><?php echo $page ?></a>
<?php else: ?>
<a href="<?php echo url_for('manager/user?page='.$page.urldecode($search_url)) ?>"><?php echo $page ?></a>
<?php endif; ?>
<?php endforeach; ?>
<?php if($pg->getPage()==$pg->getLastPage()): ?>
<!-- 最后一页页号 -->
<a class="disabled">后一页</a>
<a class="disabled">尾页</a>
<?php else : ?>
<a
	href="<?php echo url_for('manager/user?page='.$pg->getNextPage().urldecode($search_url)) ?>">后一页</a>
<!-- 下一页页号 -->
<a
	href="<?php echo url_for('manager/user?page='.$pg->getLastPage().urldecode($search_url)) ?>">尾页</a>
<?php endif; ?>
<?php endif;?>
</div>
</div>
</div>

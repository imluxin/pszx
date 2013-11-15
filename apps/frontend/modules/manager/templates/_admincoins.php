<div class="admin_money admin_box">
<div class="subTitle">用户金币管理
<div class="admin_userInfo_search"><input type="text" value="姓名"
	size="20" />&nbsp; <input type="text" value="昵称" />&nbsp; <input
	type="text" value="注册邮箱" />&nbsp; <input type="text" value="联系手机" />&nbsp;
<input class="btnPurple" type="submit" value="查询" /></div>
</div>
<div class="cont">
<table class="table">
	<tr>
		<td>序号</td>
		<td>姓名</td>
		<td>昵称</td>
		<td>性别</td>
		<td>联系手机</td>
		<td>金币数目</td>
		<td>手工增减金币</td>
		<td>确认</td>
		<td>操作管理员</td>
	</tr>
	<?php foreach ($result as $one):?>
	<tr>
		<td><?php echo $one->getId() ?></td>
		<td><?php echo $one->getFirstName() ?></td>
		<td><?php echo $one->getUsername() ?></td>
		<td><?php echo $one->getGender() ?></td>
		<td><?php echo $one->getPhone() ?></td>
		<td><?php echo $one->getCoins() ?></td>
		<td><input style="width:80px;" type="text" id="coins_<?php echo $one->getId()?>" /></td>
		<td><a href="javascript:editCoins(<?php echo $one->getId() ?>);">确认</a></td>
		<td><?php echo $one->getLastModify() ?></td>
	</tr>
	<?php endforeach; ?>
</table>

<script>
	function editCoins(uid) {
		if(confirm('确认修改？')) {
			var coins = $('#coins_'+uid).val();
			var url = '<?php echo url_for("ajax/EditCoins") ?>?uid='+uid+'&coins='+coins;
			
			$.ajax({
				type: "post",
				url: url,
				success: function(data, textStatus){
					if(data == 1) {
						location.reload();
					} else if (data == -1) {
						alert('请输入正确的数值');
					}
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
<a href="<?php echo url_for('manager/user?page=1') ?>">首页</a>
<a
	href="<?php echo url_for('manager/user?page='.$pg->getPreviousPage()) ?>">前一页</a>
<!-- 前一页号 -->
<?php endif; ?>
<?php foreach ($pg->getLinks() as $page): ?>
<!-- 页号集合 -->
<?php if($page==$pg->getPage()): ?>
<a class="current"><?php echo $page ?></a>
<?php else: ?>
<a href="<?php echo url_for('manager/user?page='.$page) ?>"><?php echo $page ?></a>
<?php endif; ?>
<?php endforeach; ?>
<?php if($pg->getPage()==$pg->getLastPage()): ?>
<!-- 最后一页页号 -->
<a class="disabled">后一页</a>
<a class="disabled">尾页</a>
<?php else : ?>
<a
	href="<?php echo url_for('manager/user?page='.$pg->getNextPage()) ?>">后一页</a>
<!-- 下一页页号 -->
<a
	href="<?php echo url_for('manager/user?page='.$pg->getLastPage()) ?>">尾页</a>
<?php endif; ?>
<?php endif;?>
</div>
</div>
</div>

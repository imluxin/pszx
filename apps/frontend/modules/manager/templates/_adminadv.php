<div class="admin_bless admin_box">
<div class="subTitle">图片广告管理</div>
<div class="cont">
<table class="table">
	<tr>
		<td>位置</td>
		<td>广告标题</td>
		<td>开始日</td>
		<td>到期日</td>
		<td>链接网址</td>
		<td>上传图片</td>
		<td>操作</td>
	</tr>
	<?php foreach($advs as $one): ?>
	<tr>
		<td><?php echo $one->getBlock() ?></td>
		<td><?php echo $one->getTitle() ?></td>
		<td><?php echo $one->getStartDate() ?></td>
		<td><?php echo $one->getEndDate() ?></td>
		<td><?php echo $one->getUrl() ?></td>
		<td>
		<?php if($one->getImages() != '' ) {?>
		<?php echo image_tag('../uploads/adv/'.$one['images'],array('style'=>"width:50%;height:auto;")) ?>
		<?php } ?>
		</td>
		<td><a href="<?php echo url_for('adv/edit?id='.$one->getId()) ?>">修改</a></td>
	</tr>
	<?php endforeach; ?>
</table>
</div>
<div class="subTitle">首页推荐</div>
<div class="cont">
<table class="table">
	<tr>
		<td>位置</td>
		<td>推荐文章</td>
		<td>开始日</td>
		<td>结束日</td>
		<td>操作</td>
	</tr>
	<?php foreach($recommend as $one): ?>
	<tr>
		<td><?php echo $one->getRType() ?></td>
		<td><?php echo $one->getArticle()->getTitle() ?></td>
		<td><?php echo $one->getStartDate() ?></td>
		<td><?php echo $one->getEndDate() ?></td>
		<td><a href="<?php echo url_for('recommend/edit?id='.$one->getId())?>">修改</a></td>
	</tr>
	<?php endforeach; ?>
</table>
</div>
</div>

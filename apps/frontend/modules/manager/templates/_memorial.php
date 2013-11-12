<div class=" admin_memorial admin_box">
<div class="subTitle">
纪念馆管理
-
<span style="font-size:14px;text-decoration: underline;"><?php echo link_to('建馆','memorial/new')?></span>
</div>
<div class="cont">
<p>待审核</p>
<ul class="imgList clearfix">
	<?php foreach($memorial as $one): ?>
	<li>
	<table>
		<tr>
			<td><?php echo image_tag('../uploads/memorial/'.$one->getDiePhotoOne()) ?></td>
			<td>
				<a href="<?php echo url_for('memorial/edit?id='.$one->getId()) ?>">修改</a>
				<?php echo jq_link_to_remote('删除', 
											array(
												'url' => 'ajax/DelMemorial?id='.$one->getId(),
												'confirm' => '确定要删除吗？',
												'success' => 'if(data == 1) { location.reload() }'
											), array())?>
				<a href="#">升级</a>
				<a href="#">祭祀</a>
			</td>
		</tr>
		<tr>
			<td>
			<p><?php $one->getMName() ?></p>
			</td>
			<td>&nbsp;</td>
		</tr>
	</table>
	</li>
	<?php endforeach;?>
</ul>
</div>

<div class="cont">
<p>打回</p>
<ul class="imgList clearfix">
	<?php foreach($reject_memorial as $one): ?>
	<li>
	<table>
		<tr>
			<td><?php echo image_tag('../uploads/memorial/'.$one->getDiePhotoOne()) ?></td>
			<td>
				<a href="<?php echo url_for('memorial/edit?id='.$one->getId()) ?>">修改</a>
				<?php echo jq_link_to_remote('删除', 
											array(
												'url' => 'ajax/DelMemorial?id='.$one->getId(),
												'confirm' => '确定要删除吗？',
												'success' => 'if(data == 1) { location.reload() }'
											), array())?>
				<a href="#">升级</a>
				<a href="#">祭祀</a>
			</td>
		</tr>
		<tr>
			<td>
			<p><?php $one->getMName() ?></p>
			</td>
			<td>&nbsp;</td>
		</tr>
	</table>
	</li>
	<?php endforeach;?>
</ul>
</div>

<div class="cont">
<p>通过审核</p>
<ul class="imgList clearfix">
	<?php foreach($approve_memorial as $one): ?>
	<li>
	<table>
		<tr>
			<td><?php echo image_tag('../uploads/memorial/'.$one->getDiePhotoOne()) ?></td>
			<td>
				<a href="<?php echo url_for('memorial/edit?id='.$one->getId()) ?>">修改</a>
				<?php echo jq_link_to_remote('删除', 
											array(
												'url' => 'ajax/DelMemorial?id='.$one->getId(),
												'confirm' => '确定要删除吗？',
												'success' => 'if(data == 1) { location.reload() }'
											), array())?>
				<a href="#">升级</a>
				<a href="#">祭祀</a>
			</td>
		</tr>
		<tr>
			<td>
			<p><?php $one->getMName() ?></p>
			</td>
			<td>&nbsp;</td>
		</tr>
	</table>
	</li>
	<?php endforeach;?>
</ul>
</div>
</div>

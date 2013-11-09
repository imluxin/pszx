<div class="admin_temple admin_box">
<div class="subTitle">
寺庙管理
-
<span style="font-size:14px;text-decoration: underline;"><?php echo link_to('创建寺庙','temple/new')?></span>
</div>
<div class="cont">
<ul class="imgList clearfix">
	<?php foreach($temple as $one): ?>
	<li>
	<table>
		<tr>
			<td><?php echo image_tag('../uploads/temple/'.$one->getImgOne()) ?></td>
			<td>
				<a href="<?php echo url_for('temple/edit?id='.$one->getId()) ?>">修改</a>
				&nbsp;
				<?php echo jq_link_to_remote('删除', 
											array(
												'url' => 'ajax/DelTemple?id='.$one->getId(),
												'confirm' => '确定要删除吗？',
												'success' => 'if(data == 1) { location.reload() }'
											), array())?>
			</td>
		</tr>
		<tr>
			<td>
			<p><?php echo $one->getName() ?></p>
			</td>
			<td>&nbsp;</td>
		</tr>
	</table>
	</li>
	<?php endforeach; ?>
</ul>
</div>
</div>

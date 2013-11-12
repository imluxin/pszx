<div class="admin_temple_audit admin_box">
<div class="subTitle">寺庙审核</div>
<div class="cont">
<p>待审核</p>
<ul class="imgList clearfix">
	<?php foreach($temple as $one):?>
	<li>
	<table>
		<tr>
			<td><?php echo image_tag('../uploads/temple/'.$one->getImgOne()) ?></td>
			<td>
				<a href="#">浏览</a>
				<?php echo jq_link_to_remote('同意', 
											array(
												'url' => 'templemanager/approve?id='.$one->getId(),
												'confirm' => '确定要同意吗？',
												'success' => 'if(data == 1) { location.reload() } else { alert(data); }'
											), array())?>
				<?php echo jq_link_to_remote('打回', 
											array(
												'url' => 'templemanager/reject?id='.$one->getId(),
												'confirm' => '确定要打回吗？',
												'success' => 'if(data == 1) { location.reload() } else { alert(data); }'
											), array())?>
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
	<?php endforeach;?>
</ul>
</div>

<div class="cont">
<p>打回</p>
<ul class="imgList clearfix">
	<?php foreach($reject_temple as $one):?>
	<li>
	<table>
		<tr>
			<td><?php echo image_tag('../uploads/temple/'.$one->getImgOne()) ?></td>
			<td>
				<a href="#">浏览</a>
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
	<?php endforeach;?>
</ul>
</div>

<div class="cont">
<p>通过审核</p>
<ul class="imgList clearfix">
	<?php foreach($approve_temple as $one):?>
	<li>
	<table>
		<tr>
			<td><?php echo image_tag('../uploads/temple/'.$one->getImgOne()) ?></td>
			<td>
				<a href="#">浏览</a>
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
	<?php endforeach;?>
</ul>
</div>
</div>

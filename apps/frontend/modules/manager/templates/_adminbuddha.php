<div class="admin_temple_audit admin_box">
<div class="subTitle">佛殿审核</div>
<div class="cont">
<ul class="imgList clearfix">
	<?php foreach($buddha as $one):?>
	<li>
	<table>
		<tr>
			<td><?php echo image_tag('../uploads/buddha/'.$one->getImages()) ?></td>
			<td><a href="#">浏览</a> <a href="#">同意</a> <a href="#">删除</a></td>
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

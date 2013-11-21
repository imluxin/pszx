<div class="main fl box index_buddha">
<div class="titleBar">
<h2 class="title"><a href="<?php echo url_for('buddha/index')?>">网上礼佛</a></h2>
<a class="more" href="<?php echo url_for('buddha/index')?>">更多</a></div>
<div class="cont">
<div class="imgList">
<ul class="clearfix">
	<?php foreach($buddhas as $one): ?>
	<li>
	<a href="<?php echo url_for('buddha/detail?id='.$one->getId()) ?>"> 
		<?php echo image_tag('../uploads/buddha/'.$one['images']) ?>
		<p><?php echo $one->getName() ?></p>
	</a>
	</li>
	<?php endforeach; ?>
</ul>
</div>
</div>
</div>
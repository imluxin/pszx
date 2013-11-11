<div class="main fl box index_temple">
<div class="titleBar">
<h2 class="title"><a href="<?php echo url_for('temple/index')?>">名山名寺</a></h2>
<a class="more" href="<?php echo url_for('temple/index')?>">更多</a></div>
<div class="cont">
<div class="imgList">
<ul class="clearfix">
	<?php foreach($temple as $one): ?>
	<li>
	<a href="<?php echo url_for('temple/details?id='.$one->getId()) ?>"> 
		<?php echo image_tag('../uploads/temple/'.$one->getImgOne()) ?>
		<p><?php echo $one->getName() ?></p>
	</a>
	</li>
	<?php endforeach; ?>
</ul>
</div>
</div>
</div>

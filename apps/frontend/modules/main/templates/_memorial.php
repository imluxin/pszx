<div class="main fl box index_memorial">
<div class="titleBar">
<h2 class="title"><a href="temple/index.html">在线纪念</a></h2>
<a class="more" href="temple/index.html">更多</a></div>
<div class="cont">
<div class="imgList">
<ul class="clearfix">
	<?php foreach($memorial as $one): ?>
	<li>
	<a href="<?php echo url_for('memorial/details?id='.$one->getId()) ?>"> 
		<?php echo image_tag('../uploads/memorial/'.$one->getDiePhotoOne()) ?>
		<p><?php echo $one->getDieNameOne() ?></p>
	</a>
	</li>
	<?php endforeach; ?>
</ul>
</div>
</div>
</div>
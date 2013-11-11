<div class="side fr box">
<div class="titleBar">
<h2 class="title">同城活动</h2>
</div>
<div class="cont">
<div class="imgList">
<ul class="clearfix">
	<?php foreach($tchda7 as $one):?>
	<li>
		<a href="<?php echo url_for('article/details?id='.$one->getId()) ?>">
			<?php echo image_tag('../uploads/article/'.$one->getImgOne()) ?>
			<p><?php echo $one->getTitle() ?></p>
		</a>
	</li>
	<?php endforeach; ?>
	<?php foreach($tchda8 as $one):?>
	<li>
		<a href="<?php echo url_for('article/details?id='.$one->getId()) ?>">
			<?php echo image_tag('../uploads/article/'.$one->getImgOne()) ?>
			<p><?php echo $one->getTitle() ?></p>
		</a>
	</li>
	<?php endforeach; ?>
</ul>
</div>
<div class="txtList">
<ul>
	<?php foreach ($article as $one):?>
		<li>
			<a href="<?php echo url_for('article/details?id='.$one->getId()) ?>">
				<?php echo $one->getTitle() ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>
</div>
</div>
</div>
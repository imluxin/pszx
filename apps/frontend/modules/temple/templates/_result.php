<?php foreach($result as $one): ?>
<li>
	<a href="<?php echo url_for('temple/detail?id='.$one['id']) ?>"> 
		<?php echo image_tag('../uploads/temple/'.$one['img_one']) ?>
		<p><?php echo $one->getName() ?></p>
	</a>
</li>
<?php endforeach; ?>
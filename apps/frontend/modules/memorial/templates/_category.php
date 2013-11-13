<?php foreach($category as $one):?>
	<option value="<?php echo $one->getId()?>"><?php echo $one->getName() ?></option>
<?php endforeach; ?>
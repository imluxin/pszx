<?php slot('title',$bunddla_hall->getName().'介绍-菩萨在线') ?>
<div id="content" class="build">
<div class="row box">
<div class="titleBar">
<h2 class="title">
<a href="<?php echo url_for('buddha/index')?>">拜佛首页</a> 
<a href="<?php echo url_for('buddha/description?id='.$bunddla_hall->getId()) ?>">佛主介绍</a> 
<a href="#">在线佛乐</a>
</h2>
</div>
	<div style="width:998px;margin:0px auto;margin-top:10px;text-align: center;margin-bottom:10px;">
		<?php echo image_tag('../uploads/buddha/'.$bunddla_hall->getImages()) ?>
		<br /><br />
		<p style="font-weight: bold;font-size:20px;"><?php echo $bunddla_hall->getName() ?></p>
		<br /><br />
		<p style="width:500px;margin:0px auto;text-align: left;text-indent: 25px;"><?php echo $bunddla_hall->getDescription() ?></p>
	</div>
</div>
</div>
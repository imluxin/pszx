<?php slot('title','网上礼佛-菩萨在线') ?>
<!-- content -->
<div id="content" class="buddha">
<div class="row clearfix">
<div class="main fl">
<div class="banner">
<?php include_component('adv', 'slider',array('adv'=>array(4,5,6)));?>
</div>
</div>
<div class="side fr box">
<div class="cont">
<div class="bannerTip"></div>
<div class="bannerNote"></div>
</div>
</div>
</div>
<div class="row box">
<div class="titleBar">
	<a class="btnWhite" href="<?php echo url_for('buddha/index?xh=yes') ?>">香火最旺</a>
	<a class="btnWhite" href="<?php echo url_for('buddha/index?rq=yes') ?>">人气最旺</a>
	<a class="btnWhite" href="<?php echo url_for('buddha/index?last=yes') ?>">最新创建</a>
<a class="btnPurple buildBtn fr"
	href="<?php echo url_for('buddha/new') ?>">创建佛殿</a></div>
<div class="cont">

<div class="pages"><?php include_partial('buddha/pager', array('pg'=>$pg,'search_url'=>$search_url))?></div>

<div class="imgList">
<ul class="clearfix">
<?php foreach($result as $one) { ?>
	<li>
		<a href="<?php echo url_for('buddha/detail?id='.$one['id']) ?>"> 
			<?php echo image_tag('../uploads/buddha/'.$one['images']) ?>
			<p><?php echo $one['name'] ?></p>
		</a>
	</li>
<?php }?>
</ul>
</div>
<!--p class="imgList_cout">排列6排合计18个</p -->
<div class="pages"><?php include_partial('buddha/pager', array('pg'=>$pg,'search_url'=>$search_url))?></div>
</div>
</div>
</div>
<!-- content end-->
<?php /**/?>
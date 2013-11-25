<?php slot('title',$memorial->getMName().'-生平-菩萨在线') ?>
<div id="content" class="build sp">
<div class="row box clearfix">
<div class="titleBar">
<?php include_partial('memorial/nav', array('memorial'=>$memorial))?>
</div>

<div class="side fl">
<div class="cont">
<div class="peopleImg"><?php echo image_tag('../uploads/memorial/'.$memorial['die_photo_one']) ?></div>
<div class="peopleInfo">
<?php include_partial('memorial/die_info', array('memorial'=>$memorial))?>
</div>
</div>
</div>
<div class="main fr">
<div class="cont">
<h3 class="subTitle">生平简介</h3>
<div class="cont">
<?php echo $memorial->getDescription() ?>
</div>
</div>
</div>
</div>
</div>

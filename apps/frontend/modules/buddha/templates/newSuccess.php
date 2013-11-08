<?php slot('title','创建佛殿-菩萨在线') ?>
<?php use_javascript("tiny_mce/tiny_mce.js")?>
<div id="content" class="build">
<div class="row box clearfix">
<div class="side fl">
<?php include_partial('temple/user_info', array('myuser'=>$myuser))?>
</div>
<div class="main fr">
<div class="cont">
<h3 class="subTitle">创建佛殿</h3>
<div class="buildForm">
<?php include_partial('form', array('form' => $form)) ?>
</div>
</div>
</div>
</div>
</div>

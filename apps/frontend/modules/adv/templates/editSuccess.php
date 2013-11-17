<?php use_javascript("jqueryui/ui/jquery-ui.js")?>
<?php use_javascript("jqueryui/ui/i18n/jquery-ui-i18n.js")?>
<?php slot('title','图片广告管理-菩萨在线') ?>
<div id="content" class="build">
<div class="row box clearfix">
<div class="side fl">
<?php include_partial('adv/user_info', array('myuser'=>$myuser))?>
</div>
<div class="main fr">
<div class="cont">
<h3 class="subTitle">修改广告</h3>
<div class="buildForm">
<?php include_partial('form', array('form' => $form,'adv'=>$adv)) ?>
</div>
</div>
</div>
</div>
</div>

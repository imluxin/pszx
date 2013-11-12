<p><a class="btnPurple" href="javascript:" onclick="$('#common_menu').slideToggle();">个人管理</a></p>
<ul id="common_menu">
	<li><a class="btnGray" href="<?php echo url_for('manager/index') ?>">基本资料</a></li>
	<li><a class="btnGray" href="<?php echo url_for('manager/index') ?>">账户资料</a></li>
	<?php /*<li><a class="btnGray" href="<?php echo url_for('manager/bto') ?>">佛殿寺庙祭品管理</a></li>*/ ?>
	<li><a class="btnGray" href="<?php echo url_for('manager/buddha') ?>">佛殿管理</a></li>
	<li><a class="btnGray" href="<?php echo url_for('manager/temple') ?>">寺庙管理</a></li>
	<li><a class="btnGray" href="<?php echo url_for('manager/memorial') ?>">纪念馆管理</a></li>
	<li><a class="btnGray" href="#">纪念馆升级管理</a></li>
	<li><a class="btnGray" href="<?php echo url_for('manager/oblation') ?>">祭品管理</a></li>
	<li><a class="btnGray" href="<?php echo url_for('manager/article') ?>">文章讣告管理</a></li>
</ul>
<?php if($is_admin):?>
<p><a class="btnPurple" href="javascript:" onclick="$('#admin_menu').slideToggle();">网站管理</a></p>
<ul id="admin_menu">
	<li><a class="btnGray" href="<?php echo url_for('manager/mbuddha') ?>">佛殿审核</a></li>
	<li><a class="btnGray" href="<?php echo url_for('manager/mtemple') ?>">寺庙审核</a></li>
	<li><a class="btnGray" href="<?php echo url_for('manager/mmemorial') ?>">纪念馆审核</a></li>
	<li><a class="btnGray" href="<?php echo url_for('manager/article') ?>">祭品审核</a></li>
	<li><a class="btnGray" href="<?php echo url_for('manager/article') ?>">文章讣告审核</a></li>
	<?php if($level == 'senior') {?>
	<?php include_partial('manager/senior_menu')?>
	<?php } ?>
	<?php if ($level == 'high') { ?>
	<?php include_partial('manager/senior_menu')?>
	<?php include_partial('manager/high_menu')?>
	<?php } ?>
</ul>
<?php endif; ?>
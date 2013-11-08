<div class="cont">
<div class="userIntro">
	<?php echo image_tag('../uploads/userphoto/'.$myuser->getPhoto(),array('class'=>'userIntro_photo')) ?>
	 <br />
<a href="javascript:" onclick="$('#photo_upload').slideToggle();">上传头像</a>
<div id="photo_upload" style="display: none; height: 40px;">
<form action="<?php echo url_for('manager/updatephoto') ?>"
	method="post"
	<?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
	<?php echo $form->renderHiddenFields(false) ?> <?php echo $form->renderGlobalErrors() ?>
<div style="padding-left: 50px; margin-bottom: 5px; margin-top: 3px;"><?php echo $form['file']->renderError() ?>
	<?php echo $form['file'] ?></div>
<input class="btnPurple" type="submit" value="确认" /></form>
</div>
<p class="userIntro_name"><?php echo $myuser->getUsername() ?></p>

</div>

<div class="userMenu">
<ul>
	<li><a class="btnGray" href="<?php echo url_for('manager/index') ?>">基本资料</a></li>
	<li><a class="btnGray" href="<?php echo url_for('manager/index') ?>">账户资料</a></li>
	<li><a class="btnGray" href="<?php echo url_for('manager/bto') ?>">佛殿寺庙祭品管理</a></li>
	<li><a class="btnGray" href="#">纪念馆管理</a></li>
	<li><a class="btnGray" href="#">文章讣告管理</a></li>
</ul>
</div>
</div>

<?php slot('title','修改祭品-菩萨在线') ?>
<div id="content" class="build">
<div class="row box clearfix">
<div class="side fl">
<div class="cont">
<h3 class="subTitle">用户信息</h3>
<div class="userInfo"><?php include_partial('oblation/user_info', array('myuser'=>$myuser))?>
</div>
<div class="note">
<p>温馨提示:</p>
<p>1.用户购买您创建的虚拟祭品时，您将获得消费额10%的金币;</p>
<p>2.虚拟祭品图片格式为XXXXXXX形式.图片大小为155*110。</p>
</div>
</div>
</div>
<div class="main fr">
<div class="cont">
<h3 class="subTitle">修改祭品</h3>
<div class="buildForm">
<?php include_partial('edit_form', array('form' => $form,'oblation' => $oblation)) ?>
</div>
</div>
</div>
</div>
</div>





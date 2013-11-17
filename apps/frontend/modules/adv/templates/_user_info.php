<div class="cont">
<h3 class="subTitle">用户信息</h3>
<div class="userInfo">
<p>昵称：<?php echo $myuser->getUsername()?></p>
<p>金币：<?php echo $myuser->getCoins() ?>个（等价<?php echo ($myuser->getCoins()/100) ?>元）</p>
</div>
</div>
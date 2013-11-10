<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_http_metas() ?>
<?php include_metas() ?>
<title><?php include_slot('title', '菩萨在线') ?></title>
<link rel="shortcut icon" href="" />
<?php include_stylesheets() ?>
<?php include_javascripts() ?>
</head>
<body>
	<div id="container">
		<!-- header -->
		<div id="header">
			<h1 class="logo">菩萨在线 www.pusazaixian.com</h1>
			<div class="headerLink">
				<ul>
					<li><a href="#">加入收藏</a></li>
					<?php if(!$sf_user->isAuthenticated()) {?>
					<li><a href="<?php echo url_for('register/index') ?>">免费注册</a></li>
					<li><a href="<?php echo url_for('@sf_guard_signin') ?>">用户登录</a></li>
					<?php } else { ?>
					<li><?php echo link_to('退出','@sf_guard_signout') ?></li>
					<?php } ?>
				</ul>
			</div>
			<div class="nav">
				<ul class="clearfix">
					<li><a href="<?php echo url_for('main/index') ?>">网站首页</a></li>
					<li><a href="<?php echo url_for('buddha/index') ?>">网上礼佛</a></li>
					<li><a href="<?php echo url_for('temple/index') ?>">名山名寺</a></li>
					<li><a href="<?php echo url_for('memorial/index') ?>">纪念馆</a></li>
					<li><a href="<?php echo url_for('oblation/index') ?>">祭品商店</a></li>
					<li><a href="<?php echo url_for('article/index') ?>">最新动态</a></li>
					<li><a href="<?php echo url_for('cash/index') ?>">充值提现</a></li>
					<li><a href="<?php echo url_for('manager/index') ?>">管理中心</a></li>
				</ul>
			</div>
		</div>
		<!-- header end-->
		
		<?php echo $sf_content ?>
		
		<!-- footer -->
		<div id="footer">
			<div class="footerNav">
				<ul class="clearfix">
					<li><a href="#">关于我们</a></li>
					<li><a href="#">网站动态</a></li>
					<li><a href="#">免责条款</a></li>
					<li><a href="#">广告服务</a></li>
					<li><a href="#">诚聘人才</a></li>
					<li><a href="#">联系我们</a></li>
				</ul>
			</div>
			<div class="cpr">
				<p>粤ICP备075612345678号．版权所有：菩萨在线网</p>
			</div>
		</div>
		<!-- footer end -->
	</div>
</body>
</html>

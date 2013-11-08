<?php slot('title', '登录-菩萨在线' ) ?>
<?php use_helper('I18N') ?>
<!--content-->
<div id="content" class="reg">
	<div class="box regBox">
		<div class="regTip">欢迎您注册菩萨在线网：注册成功就获得300金币</div>
		<div class="regNote">
			<p>当人们在您创建的菩萨佛殿、名山寺庙、名人、烈士、逝者纪念馆祭祀消费时，你都将获得消费额10%的金币提成，金币可以用于祭祀消费，满一定数目后也可以提现。</p>
			<p>您可以免费创建菩萨佛殿、名山寺庙，让信徒在这里烧香拜佛祈求平安，佛前三炷香，心愿自然成。</p>
			<p>您可以免费创建历史名人、英雄烈士纪念堂，让我们一起纪念和缅怀他们，让他们的光辉形象永远在我们心中。</p>
			<p>您可以免费在这里为逝去的亲人建纪念馆、天堂公墓，让逝者在天堂安享，让亲友可以超越时空祭祀怀念。</p>
		</div>
		<div class="regForm">
		<?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>
		</div>

	</div>
</div>
<!--content end-->

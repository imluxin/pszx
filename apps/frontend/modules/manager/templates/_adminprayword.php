<div class="admin_bless admin_box">
<div class="subTitle">祈福词语管理</div>
<div class="cont">
<table>
	<tr>
		<td valign="top">网上礼佛</td>
		<td>
		<form action="<?php echo url_for('praywordmanager/update') ?>" method="post">
		<input name="id" type="hidden" value="<?php echo $b_prayword->getId() ?>" />
		<textarea name="words"><?php echo $b_prayword->getWords() ?></textarea>
		<p class="submitBar clearfix">
		<input class="btnPurple" type="submit" value="确认" />
		</p>
		</form>
		</td>
	</tr>
	<tr>
		<td valign="top">名山名寺</td>
		<td>
		<form action="<?php echo url_for('praywordmanager/update') ?>" method="post">
		<input name="id" type="hidden" value="<?php echo $t_prayword->getId() ?>" />
		<textarea name="words"><?php echo $t_prayword->getWords() ?></textarea>
		<p class="submitBar clearfix">
		<input class="btnPurple" type="submit" value="确认" />
		</p>
		</form>
		</td>
	</tr>
	<tr>
		<td valign="top">纪念馆</td>
		<td>
		<form action="<?php echo url_for('praywordmanager/update') ?>" method="post">
		<input name="id" type="hidden" value="<?php echo $m_prayword->getId() ?>" />
		<textarea name="words"><?php echo $m_prayword->getWords() ?></textarea>
		<p class="submitBar clearfix">
		<input class="btnPurple" type="submit" value="确认" />
		</p>
		</form>
		</td>
	</tr>
</table>
</div>
</div>

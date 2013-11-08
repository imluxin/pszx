<?php slot('title','名山名寺-菩萨在线') ?>
<div id="content" class="temple">
<div class="row clearfix">
<div class="main fl">
<div class="banner"><img src="#" /></div>
</div>
<div class="side fr box">
<div class="cont">
<div class="bannerTip"></div>
<div class="bannerNote"></div>
<a class="buildBtn btnPurple" href="<?php echo url_for('temple/new') ?>">创建寺庙</a></div>
</div>
</div>
<div class="row box">
<div class="titleBar"><a class="btnWhite" href="#">香火最旺</a> <a
	class="btnWhite" href="#">人气最旺</a> <a class="btnWhite" href="#">最新创建</a>
<div class="search fr"><select>
	<option>省份</option>
</select> <select>
	<option>城市</option>
</select> <input type="text" value="输入名称" /> <input type="text"
	value="创建者" /> <input class="btnPurple" type="submit" value="搜索" /></div>
</div>
<div class="cont">
<div class="pages"><?php include_partial('temple/pager', array('pg'=>$pg))?></div>
<div class="imgList">
<ul class="clearfix">
	<?php foreach($result as $one) { ?>
	<li>
		<a href="<?php echo url_for('temple/detail?id='.$one['id']) ?>"> 
			<?php echo image_tag('../uploads/temple/'.$one['img_one']) ?>
			<p><?php echo strip_tags($one['description']) ?></p>
		</a>
	</li>
<?php }?>
</ul>
</div>
<div class="pages"><?php include_partial('temple/pager', array('pg'=>$pg))?></div>
</div>
</div>
</div>

<?php slot('title','纪念馆-菩萨在线')?>
<div id="content" class="memorial">
<div class="row clearfix">
<div class="main fl">
<div class="banner"><img src="#" /></div>
</div>
<div class="side fr box">
<div class="cont">
<div class="bannerTip"></div>
<div class="bannerNote"></div>
<div class="userLink">
<ul class="clearfix">
	<li><a class="btnGray" href="#">我要充值</a></li>
	<li><a class="btnGray" href="#">我要提现</a></li>
	<li><a class="btnGray" href="#">我要拜佛</a></li>
	<li><a class="btnGray" href="<?php echo url_for('memorial/new')?>">我要建馆</a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="row box">
<div class="searchPeople">
<div class="cont">
<table>
	<tbody>
		<tr>
			<td>逝者姓名</td>
			<td>逝者籍贯</td>
			<td>忌日</td>
			<td>生日</td>
			<td>纪念馆名称</td>
			<td>纪念馆编号</td>
			<td>纪念馆分类</td>
			<td>建馆者姓名</td>
			<td rowspan="2"><input class="btnPurple" type="submit" value="搜索"></td>
		</tr>
		<tr>
			<td><input type="text" style="width: 80px"></td>
			<td><select>
				<option>省</option>
			</select> <select>
				<option>市</option>
			</select></td>
			<td><input type="text" size="2">月<input type="text" size="2">日</td>
			<td><input type="text" size="2">月<input type="text" size="2">日</td>
			<td><input type="text"></td>
			<td><input type="text" style="width: 80px"></td>
			<td><select>
				<option>纪念馆分类</option>
			</select></td>
			<td><input type="text" style="width: 90px"></td>
		</tr>
	</tbody>
</table>
</div>
</div>
<div class="titleBar"><a class="btnWhite" href="#">香火最旺</a> <a
	class="btnWhite" href="#">人气最旺</a> <a class="btnWhite" href="#">最新纪念</a>
</div>
<div class="cont">
<div class="pages"><?php include_partial('memorial/pager', array('pg'=>$pg) ) ?></div>
<div class="imgList">
<ul class="clearfix">
<?php foreach($result as $one) { ?>
	<li>
		<a href="<?php echo url_for('memorial/detail?id='.$one['id']) ?>"> 
			<?php echo image_tag('../uploads/memorial/'.$one['die_photo_one']) ?>
			<p><?php echo $one['die_name_one'] ?></p>
		</a>
	</li>
<?php }?>
</ul>
</div>
<p class="imgList_cout">排列6排合计18个</p>
<div class="pages"><?php include_partial('memorial/pager', array('pg'=>$pg) ) ?></div>
</div>
</div>
</div>

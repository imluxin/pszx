<?php slot('title','礼佛-菩萨在线') ?>
<div id="content" class="build">
<div class="row box">
<div class="titleBar">
<h2 class="title">
<a href="<?php echo url_for('buddha/index')?>">拜佛首页</a> 
<a href="#">佛主介绍</a> 
<a href="#">在线佛乐</a>
</h2>
</div>
<!--flash-->
<div class="flash"></div>
<!--/flash--></div>
<div>
	许愿描述：<textarea id="wish" style="width:1000px;"></textarea>(输入您的许愿描述，然后点击下方的按钮。)
	<ul class="function_bar">
		<li><a href="javascript:owtr('1');">我要供烛</a></li>
		<li><a href="javascript:owtr('2')">我要供香</a></li>
		<li><a href="javascript:owtr('3')">我要供果</a></li>
		<li><a href="javascript:owtr('4')">我要供茶</a></li>
		<li><a href="javascript:owtr('5')">我要供花</a></li>
		<li><a href="javascript:owtr('6')">祈福许愿</a></li>
		<li><a href="javascript:owtr('7')">拜佛捐赠</a></li>
		<li><a href="javascript:owtr('8')">香火不断</a></li>
	</ul>
</div>

<script>
function owtr(g) {
	var wish = $('#wish').val();
	if(wish == '') {alert('请输入您的许愿描述'); $('#wish').focus(); return false; }
	var url = '<?php echo url_for('owtr/buddha')?>?type='+g+'&txt='+wish+'&bid=<?php echo $buddha->getId()?>';

	$.ajax({
		type: "post",
		url: url,
		beforeSend: function(XMLHttpRequest){
		},
		success: function(data, textStatus){
			var result = eval ("(" + data + ")");
			if(result.error == '') {
				var type_id = result.type_id;  // 物品类别id
				var gid = result.gid;  // 物品id
				var bless = result.bless;  // 祝福语
				var user_id = result.user_id; // 用户id
				var px = result.px;  
				var py = result.py;  
				var sx = result.sx;
				var sy = result.sy;
				alert(px+','+py);
			} else {
				alert(result.error);
			}
		},
		complete: function(XMLHttpRequest, textStatus){
		},
		error: function(){
		}
	});
}
</script>

<div class="row">
<div class="baifoTable">
<table>
	<tr>
		<th>礼佛ID</th>
		<th>昵称/姓名</th>
		<th>性别</th>
		<th>年龄</th>
		<th>来自何方</th>
		<th>拜佛许愿描述</th>
		<th>拜佛许愿时间</th>
	</tr>
	<?php foreach($result as $one):?>
	<tr>
		<td><?php echo $one->getUserId() ?></td>
		<td><?php echo $one->getSfGuardUser()->getUserName() ?></td>
		<td><?php echo $one->getSfGuardUser()->getGender() == 1 ? '男':'女' ?></td>
		<td><?php echo $one->getSfGuardUser()->getAge() ?></td>
		<td><?php echo $one->getSfGuardUser()->getProvince().','.$one->getSfGuardUser()->getCity() ?></td>
		<td><?php echo $one->getTxt() ?></td>
		<td><?php echo $one->getCreatedAt() ?></td>
	</tr>
	<?php endforeach;?>
</table>
<div class="pages">
<?php if(count($pg)>0): ?>
<?php if($pg->getPage()==1): ?>
<!-- 如果当前是第1页 -->
<a class="disabled">首页</a>
<a class="disabled">前一页</a>
<?php else : ?>
<a href="<?php echo url_for('buddha/detail?id='.$buddha->getId().'&page=1') ?>">首页</a>
<a
	href="<?php echo url_for('buddha/detail?id='.$buddha->getId().'&page='.$pg->getPreviousPage()) ?>">前一页</a>
<!-- 前一页号 -->
<?php endif; ?>
<?php foreach ($pg->getLinks() as $page): ?>
<!-- 页号集合 -->
<?php if($page==$pg->getPage()): ?>
<a class="current"><?php echo $page ?></a>
<?php else: ?>
<a href="<?php echo url_for('buddha/detail?id='.$buddha->getId().'&page='.$page) ?>"><?php echo $page ?></a>
<?php endif; ?>
<?php endforeach; ?>
<?php if($pg->getPage()==$pg->getLastPage()): ?>
<!-- 最后一页页号 -->
<a class="disabled">后一页</a>
<a class="disabled">尾页</a>
<?php else : ?>
<a href="<?php echo url_for('buddha/detail?id='.$buddha->getId().'&page='.$pg->getNextPage()) ?>">后一页</a>
<!-- 下一页页号 -->
<a href="<?php echo url_for('buddha/detail?id='.$buddha->getId().'&page='.$pg->getLastPage()) ?>">尾页</a>
<?php endif; ?>
<?php endif;?>
</div>
</div>
</div>
</div>

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
		<td><?php  ?></td>
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

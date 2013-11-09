<div class="admin_writing admin_box">
<div class="subTitle">
帖子管理
-
<span style="font-size:14px;text-decoration: underline;"><?php echo link_to('发表帖子','article/new')?></span>
</div>
<div class="cont">
<table class="table">
	<tr>
		<td>文章/讣告标题</td>
		<td>发表时间</td>
		<td>修改</td>
		<td>删除</td>
	</tr>
	<?php foreach($article_result as $one): ?>
	<tr>
		<td><?php echo $one->getTitle() ?></td>
		<td><?php echo $one->getCreatedAt() ?></td>
		<td><a href="<?php echo url_for('article/edit?article_page='.$article_page.'&id='.$one->getId()) ?>">修改</a></td>
		<td><?php echo jq_link_to_remote('删除', 
											array(
												'url' => 'ajax/DelArticle?id='.$one->getId(),
												'confirm' => '确定要删除吗？',
												'success' => 'if(data == 1) { location.reload(); }'
											), array())?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<div class="pages">
<?php include_partial('manager/article_pager', array('article_pg' => $article_pg))?>
</div>
</div>
</div>

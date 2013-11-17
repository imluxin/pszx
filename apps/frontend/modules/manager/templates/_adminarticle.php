<div class="admin_oblation_audit admin_box">
<div class="admin_shop_price admin_box">
	<div class="subTitle">文章讣告管理</div>
	<div class="cont">
		<table class="table">
				<tr>
					<td>序号</td>
					<td>标题</td>
					<td>内容</td>
					<td>操作</td>
                </tr>
                <?php foreach($result as $one):?>
                <tr>
                	<td><?php echo $one->getId() ?></td>
                    <td><?php echo $one->gettitle() ?></td>
                    <td><?php echo $one->getContent() ?></td>
                    <td>
                    <?php if(!$one->getIsApproved()) {?>
                    	<?php echo jq_link_to_remote('同意', 
											array(
												'url' => 'articlemanager/approve?id='.$one->getId(),
												'confirm' => '确定要同意吗？',
												'success' => 'if(data == 1) { location.reload() } else { alert(data); }'
											), array())?>
                    <?php } ?>
                    <?php if(!$one->getIsRejected()) { ?>
                    	<?php echo jq_link_to_remote('打回', 
											array(
												'url' => 'articlemanager/reject?id='.$one->getId(),
												'confirm' => '确定要打回吗？',
												'success' => 'if(data == 1) { location.reload() } else { alert(data); }'
											), array())?>
                    <?php } ?>
                    <?php echo jq_link_to_remote('删除', 
											array(
												'url' => 'ajax/DelArticle?id='.$one->getId(),
												'confirm' => '确定要删除吗？',
												'success' => 'if(data == 1) { location.reload(); }'
											), array())?>
                	</td>  
                <?php ?>
                </tr>
                <?php endforeach; ?>
		</table>
		<div class="pages">
			<?php if(count($pg)>0): ?>
			<?php if($pg->getPage()==1): ?>
			<!-- 如果当前是第1页 -->
			<a class="disabled">首页</a>
			<a class="disabled">前一页</a>
			<?php else : ?>
			<a href="<?php echo url_for('manager/marticle?page=1') ?>">首页</a>
			<a
				href="<?php echo url_for('manager/marticle?page='.$pg->getPreviousPage()) ?>">前一页</a>
			<!-- 前一页号 -->
			<?php endif; ?>
			<?php foreach ($pg->getLinks() as $page): ?>
			<!-- 页号集合 -->
			<?php if($page==$pg->getPage()): ?>
			<a class="current"><?php echo $page ?></a>
			<?php else: ?>
			<a href="<?php echo url_for('manager/marticle?page='.$page) ?>"><?php echo $page ?></a>
			<?php endif; ?>
			<?php endforeach; ?>
			<?php if($pg->getPage()==$pg->getLastPage()): ?>
			<!-- 最后一页页号 -->
			<a class="disabled">后一页</a>
			<a class="disabled">尾页</a>
			<?php else : ?>
			<a
				href="<?php echo url_for('manager/marticle?page='.$pg->getNextPage()) ?>">后一页</a>
			<!-- 下一页页号 -->
			<a
				href="<?php echo url_for('manager/marticle?page='.$pg->getLastPage()) ?>">尾页</a>
			<?php endif; ?>
			<?php endif;?>
		</div>
	</div>
</div>
</div>

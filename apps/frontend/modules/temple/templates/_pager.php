<?php if(count($pg)>0): ?>
<?php if($pg->getPage()==1): ?>
<!-- 如果当前是第1页 -->
<a class="disabled">首页</a>
<a class="disabled">前一页</a>
<?php else : ?>
<a href="<?php echo url_for('temple/index?page=1'.urldecode($search_url) ) ?>">首页</a>
<a
	href="<?php echo url_for('temple/index?page='.$pg->getPreviousPage().urldecode($search_url)) ?>">前一页</a>
<!-- 前一页号 -->
<?php endif; ?>
<?php foreach ($pg->getLinks() as $page): ?>
<!-- 页号集合 -->
<?php if($page==$pg->getPage()): ?>
<a class="current"><?php echo $page ?></a>
<?php else: ?>
<a href="<?php echo url_for('temple/index?page='.$page.urldecode($search_url)) ?>"><?php echo $page ?></a>
<?php endif; ?>
<?php endforeach; ?>
<?php if($pg->getPage()==$pg->getLastPage()): ?>
<!-- 最后一页页号 -->
<a class="disabled">后一页</a>
<a class="disabled">尾页</a>
<?php else : ?>
<a href="<?php echo url_for('temple/index?page='.$pg->getNextPage().urldecode($search_url)) ?>">后一页</a>
<!-- 下一页页号 -->
<a href="<?php echo url_for('temple/index?page='.$pg->getLastPage().urldecode($search_url)) ?>">尾页</a>
<?php endif; ?>
<?php endif;?>
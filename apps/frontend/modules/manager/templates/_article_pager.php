<?php if(count($article_pg)>0): ?>
<?php if($article_pg->getPage()==1): ?>
<!-- 如果当前是第1页 -->
<a class="disabled">首页</a>
<a class="disabled">前一页</a>
<?php else : ?>
<a href="<?php echo url_for('manager/article?article_page=1') ?>">首页</a>
<a
	href="<?php echo url_for('manager/article?article_page='.$article_pg->getPreviousPage()) ?>">前一页</a>
<!-- 前一页号 -->
<?php endif; ?>
<?php foreach ($article_pg->getLinks() as $page): ?>
<!-- 页号集合 -->
<?php if($page==$article_pg->getPage()): ?>
<a class="current"><?php echo $page ?></a>
<?php else: ?>
<a href="<?php echo url_for('manager/article?article_page='.$page) ?>"><?php echo $page ?></a>
<?php endif; ?>
<?php endforeach; ?>
<?php if($article_pg->getPage()==$article_pg->getLastPage()): ?>
<!-- 最后一页页号 -->
<a class="disabled">后一页</a>
<a class="disabled">尾页</a>
<?php else : ?>
<a
	href="<?php echo url_for('manager/article?article_page='.$article_pg->getNextPage()) ?>">后一页</a>
<!-- 下一页页号 -->
<a
	href="<?php echo url_for('manager/article?article_page='.$article_pg->getLastPage()) ?>">尾页</a>
<?php endif; ?>
<?php endif;?>
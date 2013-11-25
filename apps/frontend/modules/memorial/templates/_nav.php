	<h2 class="title">
		<a href="<?php echo url_for('memorial/index')?>">首页</a>
		<a href="<?php echo url_for('memorial/zxlw?id='.$memorial->getId()) ?>">在线灵位</a>
		<a href="<?php echo url_for('memorial/zxgm?id='.$memorial->getId()) ?>">在线公墓</a>
		<a href="<?php echo url_for('memorial/lifetime?id='.$memorial->getId()) ?>">生平</a>
		<a href="<?php echo url_for('memorial/photo?id='.$memorial->getId()) ?>">照片</a>
		<a href="<?php echo url_for('memorial/lifetime?id='.$memorial->getId()) ?>">视频</a>
		<a href="<?php echo url_for('memorial/lifetime?id='.$memorial->getId()) ?>">留言</a>
		<a href="<?php echo url_for('memorial/lifetime?id='.$memorial->getId()) ?>">追忆祭文</a>
		<a href="#">背景音乐</a>
	 </h2>
<a class="btnPurple buildBtn" href="#">写追忆祭文</a>
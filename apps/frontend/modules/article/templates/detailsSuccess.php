<?php slot('title','帖子-菩萨在线')?>
 <div id="content" class="build news">
    	<div class="row box clearfix">
        	<div class="side fr">
            	<div class="cont">
                	<div class="authorInfo clearfix">
                        <div class="authorPhoto">
                            <img src="#" />
                        </div>
                        <div class="authorLink">
                            <h4 class="authorLink_name">作者名称</h4>
                            <a class="btnPurple" href="#">我的空间</a>
                            <a class="btnPurple" href="#">给我留言</a>
                        </div>
                    </div>
                    <div class="otherWriting">
                    	<h3 class="subTitle">其他作品</h3>
                        <div class="txtList">
                        	<ul>
                            	<li>
                                	<a href="#">作品标题</a>
                                </li>
                            	<li>
                                	<a href="#">作品标题</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main fl">
            	<div class="cont">
                	<div class="writing">
                        <h4 class="writingTitle"><?php echo $article->getTitle(); ?></h4>
                        <p class="writingSubtitle">
                            <span class="writingSubtitle_author">作者：<?php echo $article->getSfGuardUser()->getUsername() ?></span>
                            <span class="writingSubtitle_time">日期：<?php echo $article->getCreatedAt() ?></span>
                        </p>
                        <!--帖子内容-->
                        <div class="writingCont">
                           <?php echo $article->getContent() ?>
                        </div>
                        <!--帖子内容-->
                    </div>
                    <div class="reply">
                        <h3 class="subTitle">我要回帖</h3>
                        <p class="clearfix">
                            <?php include_partial('article/reply', array('form'=>$form,'id'=>$id )) ?>
                        </p>
                    </div>
                    <div class="replies">
                    	<h3 class="subTitle">回帖内容</h3>
                    	<div class="txtList">
                    		<ul>
                    			<?php foreach($comments as $one): ?>
                    				<li><?php echo $one->getContent() ?></li>
                    			<?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
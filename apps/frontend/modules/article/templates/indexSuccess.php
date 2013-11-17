<?php slot('title','最新动态-菩萨在线')?>
    <div id="content" class="news">
    	<div class="row clearfix">
        	<div class="main fl">
            	<div class="banner">
                	<?php include_component('adv', 'slider',array('adv'=>array(10,11,12)));?>
                </div>
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
                            <li><a class="btnGray" href="#">我要祭祀</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row box clearfix">
        	<div class="titleBar">
        		<?php foreach ($category as $one):?>
            		<a class="btnWhite" href="<?php echo url_for('article/index?category='.$one->getId()) ?>"><?php echo $one['name']?></a>
        		<?php endforeach;?>
                <a class="btnPurple buildBtn" href="<?php echo url_for('article/new')?>">我要发帖</a>
            </div>
            <div class="main fl">
            	<div class="cont">
                    <div class="pages">
                       <?php include_partial('article/pager', array('pg'=>$pg,'search_url'=>$search_url) )?>
                    </div>
                    <div class="newsList">
                        <ul>
                        <?php foreach($result as $one):?>
                        <li>
                            <h4 class="newsList_title"><a href="<?php echo url_for('article/details?id='.$one->getId()) ?>"><?php echo $one->getTitle(); ?></a></h4>
                            <p class="newsList_subtitle">
	                            <span class="newsList_author">作者：<?php echo $one->getSfGuardUser()->getUsername()?></span>
	                            <span class="newsList_time">日期：<?php echo $one->getCreatedAt()?></span>
                            </p>
                            <p class="newsList_content">
                            <?php echo $one->getContent() ?>
                            </p>
                        </li>
                        <?php endforeach;?>
                        </ul>
                    </div>
                    <div class="pages">
                       <?php include_partial('article/pager', array('pg'=>$pg,'search_url'=>$search_url) )?>
                    </div>
                </div>
            </div>
            <div class="side fr">
            	<div class="cont">
                	<h3 class="subTitle">推荐作品</h3>
                    <div class="newsList">
                    	<ul>
							<li class="clearfix">
                            	<div class="newsList_img">
                                	<img src="#" />
                                </div>
                                <div class="newsList_view">
                                	<p>如来佛祖：神通广大法力无边，是西方极乐世界的最高统治者和最高法力神通的代表。</p>
                                </div>
                            </li>                        
							<li class="clearfix">
                            	<div class="newsList_img">
                                	<img src="#" />
                                </div>
                                <div class="newsList_view">
                                	<p>如来佛祖：神通广大法力无边，是西方极乐世界的最高统治者和最高法力神通的代表。</p>
                                </div>
                            </li>                        
							<li class="clearfix">
                            	<div class="newsList_img">
                                	<img src="#" />
                                </div>
                                <div class="newsList_view">
                                	<p>如来佛祖：神通广大法力无边，是西方极乐世界的最高统治者和最高法力神通的代表。</p>
                                </div>
                            </li>                        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
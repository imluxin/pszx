<?php slot('title','修改帖子-菩萨在线')?>
<?php use_javascript("tiny_mce/tiny_mce.js")?>
<div id="content" class="build">
    	<div class="row box clearfix">
        	<div class="side fl">
            	<div class="cont">
                    <h3 class="subTitle">
					用户信息
                    </h3>
                    <div class="userInfo">
                        <?php include_partial('article/user_info', array('myuser'=>$myuser))?>
                    </div>
                </div>
            </div>
            <div class="main fr">
            	<div class="cont">
                    <h3 class="subTitle">
					发帖
                    </h3>
                    <div class="buildForm">
                    <?php include_partial('article/edit_form', array('form' => $form,'article_page' => $article_page,'article' => $article)) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


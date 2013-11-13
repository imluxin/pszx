<?php slot('title', '祭品商店-菩萨在线' ) ?>
    <div id="content" class="shop">
    	<div class="row clearfix">
        	<div class="main fl">
            	<div class="banner">
                	<img src="#" />
                </div>
            </div>
            <div class="side fr box">
            	<div class="cont">
                	<div class="bannerTip"></div>
                    <div class="bannerNote"></div>
                </div>
            </div>
        </div>
        <div class="row box">
        	<div class="shopSort">
        		<?php foreach ($category as $one):?>
            		<a href="<?php echo url_for('oblation/index?category='.$one->getId()) ?>"><?php echo $one['name'] ?></a>
            	<?php endforeach;?>
            </div>
        	<div class="titleBar">
            	<a class="btnWhite" href="<?php echo url_for('oblation/index?xl=yes')?>">销量最多</a>
                <a class="btnWhite" href="<?php echo url_for('oblation/index?zd=yes') ?>">价格最低</a>
                <a class="btnWhite" href="<?php echo url_for('oblation/index?zc=yes')?>">期限最长</a>
                <a class="btnWhite" href="<?php echo url_for('oblation/index?last=yes')?>">最新创建</a>
                <div class="search fr">
                    <input type="text" />
                    <input class="btnPurple" type="submit" value="搜索">
                </div>
            </div>
            <div class="cont">
                <div class="pages">
                	<?php include_partial('oblation/pager', array('pg'=>$pg,'search_url'=>$search_url))?>
                </div>
            	<div class="shopList">
                        <ul class="clearfix">
                        <?php foreach($result as $one):?>
                            <li>
                            	<div class="shopList_img">
                                	<?php echo image_tag('../uploads/oblation/'.$one['images']) ?>
                                </div>
                                <div class="shopList_info">
                                	<table>
                                    	<tr>
                                        	<td>名称：</td>
                                            <td><?php echo $one['name']?></td>
                                        </tr>
                                        <tr>
                                        	<td>价格：</td>
                                            <td><?php echo $one['price']?>金币</td>
                                        </tr>
                                        <tr>
                                        	<td>时间：</td>
                                            <td><?php echo $one['times']?>小时</td>
                                        </tr>
                                        <tr>
                                        	<td colspan="2">
                                            	<a class="btnPurple" href="#">购买</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <div class="pages">
                	<?php include_partial('oblation/pager', array('pg'=>$pg,'search_url'=>$search_url))?>
                </div>
            </div>
        </div>
    </div>
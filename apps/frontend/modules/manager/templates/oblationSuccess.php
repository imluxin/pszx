<?php slot('title','管理中心-菩萨在线')?>
  <div id="content" class="admin">
    <div class="row clearfix">
      <div class="side box fl">
        <div class="titleBar">
          <h2 class="title">管理中心</h2>
        </div>
        <?php include_partial('manager/cont', array('myuser' => $myuser,'form' => $form)) ?>
      </div>
      <div class="main box fr">
        <div class="cont">
          <?php include_component('manager','oblation')?>
        </div>
      </div>
    </div>
  </div>
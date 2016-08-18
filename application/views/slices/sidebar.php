<div class="">
<!-- <div class="collapse navbar-collapse navbar-ex1-collapse"> -->
    <ul class="nav navbar-nav side-nav">
        <li class="user-controls">
            <a href="javascript:void(0)">
                <figure>
                    <img src="<?php echo $photo;?>" alt="">
                    <figcaption><?php echo $username;?></figcaption>
                </figure>
            </a>
        </li>
        <?php if (!in_array($role_id, array(2, 3,4,5,6))) {?>
            <li><a href="/index.php/" class="home">Home</a></li>
        <?php } ?> 
        <?php if ($role_id==1) {?>
            <?php foreach($territory_list as $t) { ?>
            <li>
            	<?php echo anchor('/territory/index/'.$t['id'], $t['name'], array('class'=>($territory_id==$t['id']?'':'')));?>
            	
                <ul style="<?php if (!isset($territory_id) or $territory_id!=$t['id']) echo 'display:none;'; else echo 'display:block'?>">
                   <li ><?php echo anchor('/ad/index/'.$t['id'], 'Ads', array('class'=>'ads '.(($controller=='ad' and isset($territory_id)  and $territory_id==$t['id'])?'active':''))); ?>
    				<li><?php echo anchor('/article/index/'.$t['id'], 'Articles', array('class'=>'articles '.(($controller=='article' and isset($territory_id) and $territory_id==$t['id'])?'active':''))); ?>
    				<li><?php echo anchor('/pub/index/'.$t['id'], 'Pubs', array('class'=>'pubs '.(($controller=='pub' and isset($territory_id)  and $territory_id==$t['id'])?'active':''))); ?>
                </ul>
            </li>
            <?php } ?>
        <?php } else if ($role_id==2) {?>
        <li><a href="/designer/index" class="home <?php if ($method=='index') echo 'active';?>">Home</a></li>
        <li>
            <?php echo anchor('/ad/designer_index','Ads', array('class'=>($controller=='ad'?'active':'')));?>
        </li>
        <li>
            <?php echo anchor('/pub/designer_index','Pubs', array('class'=>($controller=='pub'?'active':'')));?>
        </li>
        <?php } else if ($role_id == 3) { ?>
                <li><?php echo anchor('/creative_director/index/', 'Home', array('class'=>'home '.(($controller=='home')?'active':''))); ?></li>        
                <li ><?php echo anchor('/creative_director/ad_list', 'Ads', array('class'=>'ads '.(($controller=='ads')?'active':''))); ?></li>
                <li ><?php echo anchor('/creative_director/pub_list', 'Pubs', array('class'=>'pubs '.(($controller=='pubs')?'active':''))); ?></li>
        <?php } else if ($role_id == 4) { ?>
                <li ><?php echo anchor('/designer_creator/index/', 'Ads', array('class'=>'ads '.(($controller=='ad')?'active':''))); ?></li>
                <li ><?php echo anchor('/designer_creator/index/', 'Pubs', array('class'=>'pubs '.(($controller=='pub')?'active':''))); ?></li>                
        <?php } else if ($role_id == 5) { ?>
                <li><?php echo anchor('/editor/index/', 'Home', array('class'=>'home '.(($controller=='editor')?'active':''))); ?></li>
        <?php } else if ($role_id == 6){?>
                <li><?php echo anchor('/admin/index/', 'Home', array('class'=>'home '.(($controller=='admin')?'active':''))); ?></li>
                <li style="display:none;">   
                    <?php echo anchor('/national_article/index', 'National Article', array('class'=>'national_article '.(($controller=='national_article')?'active':''))); ?>
                </li>                   
                <li>   
                    <?php echo anchor('/stock_ad/index', 'Stock AD', array('class'=>'stock_ad '.(($controller=='stock_ad')?'active':''))); ?>
                </li>          
                <li>   
                    <?php echo anchor('/template/index', 'Template', array('class'=>'template '.(($controller=='template')?'active':''))); ?>
                </li>    
                <li>
                    <?php echo anchor('/pub/generic_icon', 'Pub Cover Image', array('class'=>'pub '.(($controller=='pub')?'active':''))); ?>
                </li>                               
        <?php } ?> 
        <div class="n2-logo">
            <img src="/assets/img/n2-logo.png" alt="">
        </div>
    </ul>
</div>
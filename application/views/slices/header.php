<div class="container">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Rensera</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <?php foreach($navs as $nav) { ?>
            <li class="<?php echo $nav['active']; if (array_key_exists('sub_navs', $nav)) echo 'dropdown'; ?>"><a href="<?php echo $nav['url'];?>" <?php if (array_key_exists('sub_navs', $nav)) echo 'class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"';?>><?php echo $nav['label'];if (array_key_exists('sub_navs', $nav)) echo '<span class="caret"></span>';?></a>
               <?php if (array_key_exists('sub_navs', $nav)) { ?>
               <ul class="dropdown-menu">
                  <?php foreach($nav['sub_navs'] as $sub) { ?>
                  <li><a href="<?php echo $sub['url'];?>"><?php echo $sub['label'];?></a></li>
                  <?php } ?>
               </ul>
              <?php } ?>
            </li>
          <?php }?>
          <li><a href="/index.php/user/logout">Logout</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right hidden">
          <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
          <li><a href="../navbar-static-top/">Static top</a></li>
          <li><a href="../navbar-fixed-top/">Fixed top</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav>
</div>
<div class="well well-sm">
  <div class="col-xs-4">
    My Projects Page
  </div>
  <div class="col-xs-4">
    <a href="/project/create" class="btn btn-xs btn-info">Add New Project</a>
    <a href="" class="btn btn-xs btn-info">Delete Project</a> Sort by
    <select name="" class="">
      <option value="">
        A to Z
      </option>
      <option value="">
        Z to A
      </option>
    </select>
  </div>
  <div class="col-xs-4">

  </div>
  <div class="clearfix">

  </div>
</div>
<div class="row">

  <div class="col-xs-3 bg-gray">

    <div class="panel panel-default">
      <div class="panel-heading bg">
        <div class="panel-title">
          Project Categories
        </div>
      </div>
      <div class="panel-body">
        <a href="/project/create_categories" class="btn btn-primary">Add New Category</a>
        <br />
        <div class="">
          <label>
            <input type="checkbox" name="" /> All Categories</label>
        </div>
        <?php foreach ($categories as $c) {
    echo '<div class=""><label><input type="checkbox" name="" /> '.$c['name'].'</label></div>';
} ?>
      </div>
    </div>
    <div class="clearfix">

    </div>
  </div>
  <div class="col-xs-9">
    <div class="row">
      <?php
      foreach ($projects as $p) {
          ?>
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <a href="/project/create/<?php echo $p['id']; ?>"><img alt="100%x200" data-src="holder.js/100%x200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTU2YTFiZDJmOGYgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTZhMWJkMmY4ZiI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44NTkzNzUiIHk9IjEwNS4xIj4yNDJ4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+"
            data-holder-rendered="true" style="height: 200px; width: 100%; display: block;"></a>
            <div class="caption">
              <div class="text-center">
                  <a href="/project/create/<?php echo $p['id']; ?>"><?php echo $p['name']; ?></a>
              </div>
            </div>
          </div>
        </div>
        <?php

      }
    ?>
    </div>
  </div>
</div>

<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="/project/index">Project</a></li>
  <li class="active">Index</li>
</ol>
<form method="post" action="/project/index" id="project_form">

<div class="well well-sm">
  <div class="col-xs-4">
    <a href="/project/create" class="btn btn-xs btn-info">Add New Project</a>  Sort by
    <select name="sort_by" id="sort_by" class="" onchange="do_query()">
      <option value="asc" <?php echo ($sort_by == 'asc') ? 'selected' : ''; ?>>
        A to Z
      </option>
      <option value="desc" <?php echo ($sort_by == 'desc') ? 'selected' : ''; ?>>
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
        <a href="/project/create_categories" class="btn btn-primary btn-xs">Add New Category</a>
        <br />
        <div class="">
          <label>
            <input type="checkbox" id='category_all' name="category_all" value="1" <?php echo (count($category_ids) == count($categories)) ? 'checked' : ''; ?> onclick=" do_query(this)"/> All Categories</label>
        </div>
        <?php foreach ($categories as $c) {
    echo '<div class=""><label><input type="checkbox" '.((is_array($category_ids) and in_array($c['id'], $category_ids)) ? 'checked' : '').' name="category_id[]" class="category_id" onclick="do_query()" value="'.$c['id'].'"/> '.$c['name'].'</label></div>';
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
            <a href="/project/create/<?php echo $p['id']; ?>"><img alt="100%x200" data-src="holder.js/100%x200" src="<?php echo $p['thumbnail'] ? $p['thumbnail'] : 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjQyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDI0MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTU2YTFiZDJmOGYgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMnB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTZhMWJkMmY4ZiI+PHJlY3Qgd2lkdGg9IjI0MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI4OS44NTkzNzUiIHk9IjEwNS4xIj4yNDJ4MjAwPC90ZXh0PjwvZz48L2c+PC9zdmc+'; ?>"
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

</form>
<script type="text/javascript" >
  function do_query(obj) {
    if (obj) {
        $('input[type=checkbox]').prop('checked', $(obj).prop('checked'));
    }
     var sort_by = $("#sort_by").val();
     var category_ids = [];
     $('.category_id').each(function(){
        if ($(this).prop('checked')) {
            category_ids[category_ids.length] = $(this).val();
        }
     });
     console.log(category_ids);
     window.location.href = '/project/index/'+ sort_by+'/'+ category_ids.join('_');
  }
</script>

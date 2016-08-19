<form name="" action="/project/create<?php if (isset($project)) {
    echo '/'.$project['id'];
} ?>" method="post">
<input type="hidden" name="id" value="<?php if (isset($project)) {
    echo $project['id'];
} ?>" />
<div class="row">
  <div class="col-xs-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title">
          Create Project
        </div>
      </div>
      <div class="panel-body">
        <div class="bg-warning">
          <?php echo validation_errors(); ?>
        </div>
        <div class="form-group">
          <label for="inputEmail" class="">Project Name</label>
          <input type="text" name="name" id="inputEmail" class="form-control" value="<?php if (isset($project)) {
    echo $project['name'];
} else {
    echo set_value('name');
} ?>" />
        </div>
        <div class="form-group">
          <label for="inputEmail" class="">Category</label>
          <select name="category" class="form-control">
              <option value="">
                Please select
              </option>
              <?php foreach ($categories as $c) {
    echo '<option value="'.$c['id'].'" ';
    if (isset($project) and $project['category_id'] == $c['id']) {
        echo 'selected';
    } else {
        echo set_select('category', $c['id']);
    }
    echo '>'.$c['name'].'</option>';
}?>
          </select>
        </div>
        <div class="form-group">
          <label for="inputEmail" class="">Template</label>
          <select name="template" class="form-control">
              <option value="">
                Please select
              </option>
              <?php foreach ($templates as $t) {
    echo '<option value="'.$t['id'].'" ';
    if (isset($project) and $project['template_id'] == $t['id']) {
        echo 'selected';
    } else {
        echo set_select('template', $t['id']);
    }
    echo '>'.$t['name'].'</option>';
}?>
          </select>
        </div>
        <div class="form-group">
            <lable for="">Thumbnail</lable>
            <input type="file" name="thumbnail" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit" />
        </div>
      </div>
    </div>
  </div>
</div>
</form>

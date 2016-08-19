<form action="/template/create<?php if (isset($template)) {
    echo '/'.$template['id'];
} ?>" method="post">
  <input type="hidden" name="id" value="<?php if (isset($template)) {
    echo $template['id'];
}  ?>"/>
  <div class="col-xs-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title">
          Create Template
        </div>
      </div>
      <div class="panel-body">
        <div class="bg-warning">
          <?php echo validation_errors(); ?>
        </div>
        <div class="form-group">
          <label for="inputEmail" class="">Template Name</label>
          <input type="text" name="name" id="inputEmail" class="form-control" value="<?php if (isset($template) and $template['name']) {
    echo $template['name'];
} else {
    echo set_value('name');
} ?>" placeholder="Template Name" required autofocus>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Submit" />
        </div>
      </div>
    </div>
  </div>
  <div class="col-xs-8">
  </div>
</form>

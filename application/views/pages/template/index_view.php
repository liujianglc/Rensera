<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="/template/index">Template</a></li>
  <li class="active">Index</li>
</ol>
<div class="row">
  <form action="/template/index<?php if (isset($template)) {
    echo '/'.$template['id'];
} ?>" method="post">
    <input type="hidden" name="id" value="<?php if (isset($template)) {
    echo $template['id'];
}  ?>" />
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
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <td>Name</td>
            <td></td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($list as $c) {
    ?>
            <tr>
              <td>
                <?php echo $c['name']; ?>
              </td>
              <td>
                <a href="/template/index/<?php echo $c['id']; ?>" class="btn btn-info btn-xs">Edit</a>&nbsp;&nbsp;
                <a href="/template/upload/<?php echo $c['id']; ?>" class="btn btn-info btn-xs">Upload New Version</a>&nbsp;&nbsp;

                <a href="/template/remove/<?php echo $c['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i> Remove</a>
              </td>
            </tr>
            <?php

}
        if (count($list) < 1) {
            echo '<tr>
              <td colspan="2">
              No data
              </td>
            </tr>';
        }
    ?>
        </tbody>
      </table>
    </div>
  </form>

</div>

<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="/project/index">Project</a></li>
  <li class="active">Group index</li>
</ol>
<form action="/user/group_index<?php if (isset($group)) {
    echo '/'.$group['id'];
} ?>" method="post">
  <input type="hidden" name="id" value="<?php if (isset($group)) {
    echo $group['id'];
} ?>"/>
<div class="row">

  <div class="col-xs-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title">
          Create Group
        </div>
      </div>
      <div class="panel-body">
        <div class="bg-warning">
          <?php echo validation_errors(); ?>
        </div>
        <div class="form-group">
          <label for="inputEmail" class="">Group Name</label>
          <input type="text" name="name" id="inputEmail" class="form-control" value="<?php if (isset($group)) {
    echo $group['name'];
} else {
    echo set_value('name');
} ?>" placeholder="Name" required autofocus>
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
        <?php foreach ($groups as $c) {
    ?>
        <tr>
          <td>
            <?php echo $c['name']; ?>
          </td>
          <td>
            <a href="/user/group_index/<?php echo $c['id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-trash-o"></i> Edit</a>&nbsp;&nbsp;
            <a href="/user/assign/<?php echo $c['id']; ?>" class="btn btn-info btn-xs">Assign Users</a>&nbsp;&nbsp;
            <a href="/user/remove_group/<?php echo $c['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-o"></i> Remove</a>
          </td>
        </tr>
        <?php

}?>
      </tbody>
    </table>
  </div>

</div>
</form>

<form action="/project/create_categories<?php if (isset($category)) {
    echo '/'.$category['id'];
} ?>" method="post">
  <input type="hidden" name="id" value="<?php if (isset($category)) {
    echo $category['id'];
} ?>"/>
  <div class="col-xs-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="panel-title">
          Create Category
        </div>
      </div>
      <div class="panel-body">
        <div class="bg-warning">
          <?php echo validation_errors(); ?>
        </div>
        <div class="form-group">
          <label for="inputEmail" class="">Category Name</label>
          <input type="text" name="category_name" id="inputEmail" class="form-control" value="<?php if (isset($category)) {
    echo $category['name'];
} else {
    echo set_value('category_name');
} ?>" placeholder="Category Name" required autofocus>
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
        <?php foreach ($categories as $c) {
    ?>
        <tr>
          <td>
            <?php echo $c['name']; ?>
          </td>
          <td>
            <a href="/project/create_categories/<?php echo $c['id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Edit</a>&nbsp;&nbsp;
            <a href="/project/remove_category/<?php echo $c['id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Remove</a>
          </td>
        </tr>
        <?php

}?>
      </tbody>
    </table>
  </div>
</form>

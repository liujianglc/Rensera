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
            <a href="/template/create/<?php echo $c['id']; ?>" class="btn btn-info btn-xs">Edit</a>&nbsp;&nbsp;
            <a href="/template/upload/<?php echo $c['id']; ?>" class="btn btn-info btn-xs">Upload New Version</a>&nbsp;&nbsp;

            <a href="/template/remove/<?php echo $c['id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Remove</a>
          </td>
        </tr>
        <?php

}?>
    </tbody>
  </table>
</div>

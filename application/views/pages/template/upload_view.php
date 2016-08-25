<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="/template/index">Template</a></li>
  <li class="active">Upload</li>
</ol>
<form action="/template/upload/<?php echo $template_id; ?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="template_id" value="<?php echo $template_id; ?>" />
  <div class="row">
    <div class="col-xs-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title">
            Upload Template
          </div>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label for="">Template File</label>
            <input type="file" name="template"  />
          </div>
          <div class="form-group">
              <label for="">Version</label>
              <input type="text" name="version"  class="form-control" style="width:120px;" />
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
              <td>
                Version
              </td>
              <td>
                File
              </td>
              <td>
                Uploaded At
              </td>
              <td>

              </td>
            </tr>

            <?php foreach ($list as $l) {
    ?>
              <tr>
                <td>
                  <?php echo $l['version']; ?>
                </td>
                <td>
                    <a href="<?php echo $l['file_path']; ?>" target="_blank">File</a>
                </td>
                <td>
                  <?php echo date('Y-m-d H:i', strtotime($l['created_at'])); ?>
                </td>
                <td>
                  <a href="/template/remove_version/<?php echo $l['id'].'/'.$template_id; ?>" onclick="return confirm('Are you sure?')" class="btn btn-xs btn-danger">Remove</a>
                </td>
              </tr>
            <?php

} ?>
          </thead>

        </table>
    </div>
  </div>
</form>

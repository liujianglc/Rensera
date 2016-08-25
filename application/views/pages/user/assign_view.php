<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="/project/index">Group Management</a></li>
  <li class="active">Assign User to Group - <?php echo $group['name']; ?></li>
</ol>
<form class="" action="/user/assign/<?Php echo $id; ?>" method="post">
    <table class="table table-bordered table-striped">
        <tr>
          <td>
            User Name
          </td>
          <td>
            Email
          </td>
          <td>
            Assign
          </td>
        </tr>
        <?php foreach ($users as $u) {
    ?>
        <tr>
          <td>
            <?php echo $u['name']; ?>
          </td>
          <td>
            <?php echo $u['email']; ?>
          </td>
          <td>
              <input type="checkbox" name="assigned" value="1"  <?php echo ($u['group_id'] and $u['group_id'] == $id) ? 'checked' : ''; ?> onclick="do_assign(this, <?php echo $u['id'].','.$id; ?>)"/>
          </td>
        </tr>
        <?php

} ?>
    </table>
</form>
<script type="text/javascript">
    function do_assign(chk, user_id, group_id) {
        $.post('/index.php/user/do_assign', { user_id: user_id, group_id: group_id}, function(data){
            $(chk).prop('checked', (data==1?true:false));
        })
    }
</script>

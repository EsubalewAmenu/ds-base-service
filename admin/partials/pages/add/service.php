<?php


global $table_prefix, $wpdb;
$wp_ds_services_table = $table_prefix . "ds_services";

if (isset($_POST['save_service'])) {

  if ($_POST['edit_service_id'] > 0) {
    $id = $_POST['edit_service_id'];

    $data = ['title' => $_POST['title'], 'name' => $_POST['name'], 'updated_at' => current_time('mysql')];
    $where = ['id' => $id];
    $wpdb->update($wp_ds_services_table, $data, $where);

    // $wpdb->query($wpdb->prepare("UPDATE $wp_ds_services_table SET title='" . $_POST['title'] . "', name='" . $_POST['name'] . "', 
    // updated_at = CURRENT_TIMESTAMP WHERE `id`=" . $id ));

  } else {

    $wpdb->insert($wp_ds_services_table, array(

      'title' => $_POST['title'],
      'name' => $_POST['name'],

      'user_id' => get_current_user_id(),

    ));
  }
} else if (isset($_POST['edit_service'])) {
  $id = $_POST['edit_service'];

  $service = $wpdb->get_row("SELECT * FROM $wp_ds_services_table WHERE id=" . $id, OBJECT);
}

?>


<div id="div_service_add" class="card card-primary">
  <div class="card-header">
    <h4>New service</h4>
  </div>

  <div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data">

      <div class="row">
        <div class="form-group col-12">
          <label for="title">Title</label>
          <input autofocus id="title" type="text" class="form-control" name="title" value="<?php if (isset($service->title)) echo $service->title ?>">
        </div>

        <div class="form-group col-12">
          <label for="name"> Name</label>
          <input autofocus id="name" type="text" class="form-control" name="name" value="<?php if (isset($service->name)) echo $service->name ?>">
        </div>

      </div>

      <input type="hidden" name="edit_service_id" id="edit_service_id" value="<?php echo $service->id ?>">

      <div class="form-group">
        <button value="1" type="submit" name="save_service" class="btn btn-primary btn-lg btn-block">
          <i class="fa fa-plus"> Save </i>
        </button>
      </div>
    </form>
  </div>

</div>
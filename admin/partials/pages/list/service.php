<?php

global $table_prefix, $wpdb;

$wp_services_table = $table_prefix . "ds_services";

$services = $wpdb->get_results("SELECT * FROM $wp_services_table where `deleted_at` IS NULL order by id desc");


?>


<div class="row">

<div class="table-responsive">
    <table class="table table-striped" id="table-1">
        <thead>
            <tr class="orang-back">
                <th class="text-center">
                    #
                </th>
                <th>Title</th>
                <th>name</th>
                <th>ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php

            for ($x = 0; $x < count($services); $x++) {
                echo '<tr>
                      <td> ' . ($x + 1) . ' </td>
                      
                      <td>' . $services[$x]->title . '</td>
                      
                      <td>' . $services[$x]->name . '</td>
                      
                      <td>' . $services[$x]->id . '</td>

                      <td>
                      <form action="" method="POST">
          <button value="' . $services[$x]->id . '" type="submit" name="edit_service" class="btn btn-primary">Edit</button>
  </form>
                    </tr>';
            }
            ?>



        </tbody>
    </table>
</div>

</div>
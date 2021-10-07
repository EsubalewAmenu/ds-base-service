<?php

global $table_prefix, $wpdb;

$wp_services_table = $table_prefix . "ds_services";

$services = $wpdb->get_results("SELECT * FROM $wp_services_table where (`deleted_at` = '0000-00-00 00:00:00' or `deleted_at` IS NULL) order by id desc");


?>

<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <div class="card card-primary">
                    <div class="card-header">

                        <!-- <form action="" method="POST"> -->

                        <div class="row">
                            <div class="col-sm-4">
                                <h4> Services </h4>
                            </div>
                            <div class="col-sm-7">
                            </div>
                            <div class="col-sm-1">
                                <!-- <button value="1" type="submit" name="new_service" class="btn btn-black btn-lg btn-block"><i class="fa fa-plus"> </i></button> -->
                                <button type="button" id="toggle_add_service" name="toggle_add_service" class="btn btn-black btn-lg btn-block"><i class="fa fa-plus"> </i>add</button>
                            </div>
                        </div>

                        <!-- </form> -->

                    </div>

                    <div class="card-body">

                        sadf
                        <?php
                        include_once DSSERVICE_PLAGIN_DIR . '/admin/partials/pages/add/service.php';
                        ?>
                        <script>
                            $(document).ready(function() {


                                $("#div_service_add").hide();


                                $("#toggle_add_service").click(function(e) {

                                    $("#div_service_add").toggle();

                                });

                            });
                        </script>

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
                                      <button value="' . $services[$x]->id . '" type="submit" name="service_detail" class="btn btn-primary">Detail</button>
                              </form>
                                                </tr>';
                                        }
                                        ?>



                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
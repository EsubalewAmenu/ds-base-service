
  <div id="div_service_add" class="card card-primary">
    <div class="card-header">
      <h4>New service</h4>
    </div>

    <div class="card-body">
      <form action="" method="POST" enctype="multipart/form-data">

        <div class="row">
          <div class="form-group col-12">
            <label for="title">Title</label>
            <input autofocus id="title" type="text" class="form-control" name="title" value="<?php if(isset($service->title)) echo $service->title ?>">
          </div>

          <div class="form-group col-12">
            <label for="name"> Name</label>
            <input autofocus id="name" type="text" class="form-control" name="name" value="<?php if(isset($service->name)) echo $service->name ?>">
          </div>

        </div>

        <input type="hidden" name="edit_service_id" id="edit_service_id" value="<?php echo $service->id ?>">

        <div class="form-group">
          <button value="1" type="submit" name="save_service" class="btn btn-primary btn-lg btn-block">
          <i class="fa fa-plus"> </i>
          </button>
        </div>
      </form>
    </div>

  </div>
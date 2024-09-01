<?php 
include 'includes/header.php';
$page = 'add-category';
?>
<h1>Category page</h1>
	<div class="card">
    <div class="card-header">
      <h4>Add category</h4>
    </div>
    <div class="card-body">
      <form method="post" action="insert-category.php" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control"></input>
          </div>

        <div class="col-md-6 mb-3">
            <label>Status</label>
            <input type="checkbox" name="status"></input>
         </div>


        
        <div class="col-md-6 mb-3">
            <label>Popular</label>
            <input type="checkbox" name="popular"></input>
          </div>

          <div class="col-md-6 mb-3">
            <label>Image</label>
            <input class="form-control" type="file" name="image"></input>
          </div>

          <div class="col-md-6 mb-3">
            <label>Description</label>
            <textarea name="description" rows="3" class="form-control
            "></textarea>
          </div>

        <div class="col-md-6 mb-3">
            <label>Meta Title</label>
            <input type="text" class="form-control" name="meta_title"></input>
          </div>

          <div class="col-md-6 mb-3">
            <label>Meta Keywords</label>
            <textarea name="meta_keywords" rows="3" class="form-control
            "></textarea>
          </div>

          <div class="col-md-6 mb-3">
            <label>Meta Description</label>
            <textarea name="meta_description" rows="3" class="form-control
            "></textarea>
          </div>

          <div class="col-md-6 mb-3">
           <button class="btn btn-success" type="submit"> submit</button>
          </div>
      </form>
    </div>    
  </div>
<?php 
include 'includes/footer.php'; 
?>
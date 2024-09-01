<?php include 'includes/header.php';
	$result = getTableDatas('categories');
	$image = '';
	if (isset($_POST['submit'])) {
	 	$post = cleanPost($_POST);
	 	if (isset($_FILES)) {
	 		$image  = uploadImage($_FILES['image'],'products');
	 	}
    //$images = $image;
//dnd($image);
	 	$status = isset($_POST['status']) && $_POST['status'] == 'on' ? '1' : '0';
	 	$trending = isset($_POST['trending']) && $_POST['status'] == 'on' ? '1' : '0';
    if (isset($image) && !is_null($image)) {
      // code...
	 	$sql = "INSERT INTO products(cate_id,name,small_description,description,original_price,selling_price,image,qty,tax,status,trending,meta_title,meta_keywords,meta_description)  VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
    $binds = [$post['cate_id'],$post['name'],$post['description'],$post['small_description'],$post['original_price'],$post['selling_price'], $image , $post['tax'],$post['qty'],$status,$trending,$post['meta_title'],$post['meta_keywords'],$post['meta_description']];
    //dnd($image);
    }
	 	if (query($sql,$binds,true)) {

        $_SESSION['success'] = 'Added Successfully';
        redirect('products.php');
	 	}

	 } ?>
<h1>Category page</h1>
	<div class="card">
    <div class="card-header">
      <h4>Add Products</h4>
    </div>
    <div class="card-body">
      <form method="post" action="" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-12 mb-3">
            <label>category</label>
           <select class="form-select" name="cate_id">
              <option>Select a Category</option>
              	<?php while ($row = mysqli_fetch_assoc($result)) {
              		echo "<option value='$row[id]'> $row[name]</option>";
              	} ?>
                
           </select>
          </div>
          <div class="col-md-6 mb-3">
            <label>Name</label>
            <input type="text" required required name="name" class="form-control"></input>
          </div>

          <div class="col-md-12 mb-3">
            <label> Description</label>
            <textarea name="description" required rows="3" class="form-control
            "></textarea>
          </div>

        <div class="col-md-6 mb-3">
            <label>Small Description</label>
            <input type="text" required name="small_description" required class="form-control"></input>
         </div>
         <div class="col-md-6 mb-3">
            <label>Original price</label>
            <input type="number" required name="original_price" required class="form-control"></input>
         </div>
        <div class="col-md-6 mb-3">
            <label>selling price</label>
            <input type="number" required name="selling_price" required class="form-control"></input>
         </div>
         <div class="col-md-6 mb-3">
            <label>Tax</label>
            <input type="number" required name="tax" class="form-control" required></input>
         </div>
         <div class="col-md-6 mb-3">
            <label>Quantity</label>
            <input type="number" required class="form-control" name="qty"></input>
         </div>
         <div class="col-md-6 mb-3">
            <label>Status</label>
            <input type="checkbox" required name="status" ></input>
         </div>
        <div class="col-md-6 mb-3">
            <label>Trending</label>
            <input type="checkbox" required name="trending" ></input>
          </div>

        <div class="col-md-6 mb-3">
            <label>Meta Title</label>
            <input type="text" class="form-control" required name="meta_title"></input>
          </div>


          <div class="col-md-12 mb-3">
            <label>Meta Keywords</label>
            <textarea required name="meta_keywords" rows="3" class="form-control
            "></textarea>
          </div>

          <div class="col-md-12 mb-3">
            <label>Meta Description</label>
            <textarea name="meta_description" rows="3" class="form-control
            "></textarea>
          </div>

          <div class="col-md-12 mb-3">
            <label>Image</label>
            <input class="form-control" type="file" name="image"></input>
          </div>

          <div class="col-md-12 mb-3">
           <button class="btn btn-success" type="submit" name="submit"> submit</button>
          </div>
      </form>
    </div>    
  </div>
<?php include'includes/footer.php'; ?>
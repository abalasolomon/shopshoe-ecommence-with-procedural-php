<?php 
include 'includes/header.php';
  $post = cleanPost($_GET);
    if (isset($_POST['edit'])) {
    $post = cleanPost($_POST);
    $trending = isset($_POST['trending']) && $_POST['trending'] == 'on'? '1':'0';
    $status = isset($_POST['status']) && $_POST['status'] == 'on'? '1':'0';
      $sql = "UPDATE products Set name = ?, 
  description = ?, small_description = ?, original_price = ?, selling_price = ?, tax = ?, qty = ?, status = ?,trending = ?, meta_title  = ?, meta_description = ?, meta_keywords = ? ";
  $binds = [ $post['name'], $post['description'], $post['small_description'], $post['original_price'], $post['selling_price'], $post['tax'], $post['qty'], $status, $trending, $post['meta_title'], $post['meta_keywords'], $post['meta_description']];

    if (isset($_FILES['image']) ) {
        $file = "../uploads/products/" .$post['image'];

        if (file_exists($file)) {
          unlink($file);
        }
          $image = uploadImage($_FILES['image'],'products');
          $sql .= ", image = ?";  


          array_push($binds,$image);

          //dnd($binds);
        $sql .= " Where id =". $_GET['prod'];
    }
     $editted =  query($sql,$binds,true);
     if ($editted) {
      $successMessage = 'Editted Successfully';
     }
  }
  //dnd(mysqli_fetch_assoc($result));

if (isset($_GET['prod'])) {
      $post = cleanPost($_GET);
      $result = getTableDatas('products','id',$post['prod']);
      
      // $result = mysqli_fetch_assoc($result);
      //dnd($result);
    }

?>


<h1>Product page</h1>
  <div class="card">
    <div class="card-header">
      <h4>Edit Products</h4>
    </div>
    <div class="card-body">
      <form method="post" action="" enctype="multipart/form-data">
        <?php while ($row = mysqli_fetch_assoc($result)) {
           ?>
           <input type="hidden" name="image" value="<?=$row['image']?>">
        <div class="row">
          <div class="col-md-12 mb-3">
            <label>category</label>
           <select class="form-select" name="cate_id">
              <option><?=getCate($row['cate_id'])?></option>
              
           </select>
          </div>
          <div class="col-md-6 mb-3">
            <label>Name</label>
            <input type="text" name="name" value="<?=$row['name']?>" class="form-control"></input>
          </div>

          <div class="col-md-12 mb-3">
            <label> Description</label>
            <textarea name="description" rows="3" class="form-control
            "><?=$row['description']?></textarea>
          </div>

        <div class="col-md-6 mb-3">
            <label>Small Description</label>
            <input type="text" name="small_description" value="<?=$row['small_description']?>" class="form-control"></input>
         </div>
         <div class="col-md-6 mb-3">
            <label>Original price</label>
            <input type="number" name="original_price" value="<?=$row['original_price']?>" class="form-control"></input>
         </div>
        <div class="col-md-6 mb-3">
            <label>selling price</label>
            <input type="number" name="selling_price" value="<?=$row['selling_price']?>" class="form-control"></input>
         </div>
         <div class="col-md-6 mb-3">
            <label>Tax</label>
            <input type="number" name="tax" value="<?=$row['tax']?>" class="form-control"></input>
         </div>
         <div class="col-md-6 mb-3">
            <label>Quantity</label>
            <input type="number" class="form-control" value="<?=$row['qty']?>" name="qty"></input>
         </div>
         <div class="col-md-6 mb-3">
            <label>Status</label>
            <input type="checkbox" name="status" <?=$row['status'] == '1' ? 'checked':''?> ></input>
         </div>
        <div class="col-md-6 mb-3">
            <label>Trending</label>
            <input type="checkbox" name="trending" <?=$row['trending'] == '1' ? 'checked':''?> ></input>
          </div>

        <div class="col-md-6 mb-3">
            <label>Meta Title</label>
            <input type="text" class="form-control" value="<?=$row['meta_title']?>" name="meta_title"></input>
          </div>


          <div class="col-md-12 mb-3">
            <label>Meta Keywords</label>
            <textarea name="meta_keywords" rows="3" class="form-control
            "><?=$row['meta_keywords']?></textarea>
          </div>

          <div class="col-md-12 mb-3">
            <label>Meta Description</label>
            <textarea name="meta_description" rows="3" class="form-control
            "><?=$row['meta_keywords']?></textarea>
          </div>
          <?php if ($row['image']) { ?>
              <img class='cate-image' src="../uploads/products/<?=$row['image']?>">
          <?php } ?>
          <div class="col-md-12 mb-3">
            <label>Image</label>
            <input class="form-control" type="file" name="image"></input>
          </div>

          <div class="col-md-12 mb-3">
           <button class="btn btn-success" type="submit" name="edit"> submit</button>
          </div>
      </form>
    </div>    
  </div>
<?php
}
  include 'includes/footer.php';
 ?>
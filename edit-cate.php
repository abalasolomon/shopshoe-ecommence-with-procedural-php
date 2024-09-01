<?php 
include 'includes/header.php';
  if (isset($_POST['edit'])) {
    $post = cleanPost($_POST);
    
    $popular = isset($_POST['popular']) && $_POST['popular'] == 'on'? '1':'0';
    $status = isset($_POST['status']) && $_POST['status'] == 'on'? '1':'0';
    $sql = "UPDATE categories Set name = ?, 
description = ?, status = ?,popular = ?, meta_title  = ?, meta_descrip = ?, meta_keywords = ? ";
$binds = [$post['name'],$post['description'],$status,$popular,$post['meta_title'],$post['meta_keywords'],$post['meta_description']];

  $post = cleanPost($_GET);
    if (isset($post['cate'])) {
      $result = getTableDatas('categories','id',$post['cate']);
      $image = mysqli_fetch_assoc($result);
    }

    if (isset($_FILES['image'])) {
        $file = "../upload/categories/".$image['image'];
        if (file_exists($file)) {
          unlink($file);
        }
          $image = uploadImage($_FILES['image'],'categories');
          if ($image) {
          $sql .= ", image = ?";

          array_push($binds,$image);
          }

        $sql .= " Where id = ". $post['cate'];

        
    }
     $editted =  query($sql,$binds,true);
     if ($editted) {
       // code...
      $successMessage = 'Editted Successfully';
     }
  }

  $post = cleanPost($_GET);
  if (isset($post['cate'])) {
    $result = getTableDatas('categories','id',$post['cate']);
  //dnd(mysqli_fetch_assoc($result));
  }


?>
<h1>Category page</h1>
	<div class="card">
    <div class="card-header">
      <h4>Edit/Update category</h4>
    </div>
    <div class="card-body">
      <form method="POST" action="" enctype="multipart/form-data">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="row">
          <input type="hidden" value="<?=$post['cate']?> name=cate">
          <div class="col-md-6 mb-3">
            <label>Name</label>
            <input type="text" name="name" value="<?=$row['name']?>" class="form-control"></input>
          </div>

          <div class="col-md-12 mb-3">
            <label>Description</label>
            <textarea name="description" rows="3" class="form-control
            "><?=$row['description']?></textarea>
          </div>

        <div class="col-md-6 mb-3">
            <label>Status</label>
            <input type="checkbox" <?=$row['status'] == '1' ? 'checked' : ''?> name="status"></input>
         </div>
        
        <div class="col-md-6 mb-3">
            <label>Popular</label>
            <input type="checkbox" <?=$row['popular'] =='1' ? 'checked' : '' ?> name="popular"></input>
          </div>

        <div class="col-md-6 mb-3">
            <label>Meta Title</label>
            <input type="text" class="form-control" value="<?=$row['meta_title']?> " name="meta_title"></input>
          </div>

          <div class="col-md-12 mb-3">
            <label>Meta Keywords</label>
            <textarea name="meta_keywords"  rows="3" class="form-control
            "><?=$row['meta_keywords']?> </textarea>
          </div>

          <div class="col-md-12 mb-3">
            <label>Meta Description</label>
            <textarea name="meta_description" rows="3" class="form-control
            "><?=$row['meta_descrip']?> </textarea>
          </div>

          <div class="col-md-12 mb-3">
            <?php 
            if (isset($row['image'])) { ?>
              <img src="../uploads/categories/<?=$row['image']?>" class="cate-image" alt="image here">
            <?php } ?>
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
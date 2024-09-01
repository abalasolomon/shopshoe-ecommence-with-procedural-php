<?php 
	include'includes/header.php';
	$result = getTableDatas('products');
  $successMessage = null;
   if (isset($_SESSION['success']) ) {
     $successMessage = $_SESSION['success'];
     unset($_SESSION['success']);
   }  

 ?>
<h1>Products page</h1>
	<div class="row">
        <div class="card">
          <div class="card-header ">
            <h4>Products</h4>
            
          </div>
          <div class= 'card-body'>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Category</th>
                  <th>Name</th>
                  <th>Small Description</th>
                  <th>Original price</th>
                  <th>selling price</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                <?php while ($row = mysqli_fetch_assoc($result)) {?>
                <tr>

                  <td><?= $row['id']?></td>
                  <td><?=getCate($row['cate_id'])?></td>
                  <td><?= $row['name']?></td>
                  <td><?= $row['small_description']?></td>
                  <td><?= $row['selling_price']?></td>
                  <td><?= $row['original_price']?></td>
                  <td> <img src="../uploads/products/<?=$row['image']?>" class="cate-image" alt="image here"></td>
                  <td>
                    <a href="edit-product.php?prod=<?=$row['id']?>" class="btn btn-sm btn-primary">Edit</a>
    
                    <a href="delete-product/<?=$row['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                  </td>
                </tr>
              <?php } ?>
               
              </tbody>
            </table>
          </div>
          <div class="card-footer p-3">
            <!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p> -->
          </div>
        </div>
        
    </div>
 <?php 
	include'includes/footer.php';
 ?>
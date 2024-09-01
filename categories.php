<?php 
include 'includes/header.php';
$page = 'dashboard';
$result = getTableDatas('categories');
 ?>
<h1>Category page</h1>
	<div class="row">
      
        <div class="card">
          <div class="card-header ">
            <h4>Categories</h4>
            
          </div>
          <div class= 'card-body'>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               <?php 
               		while ($row = mysqli_fetch_assoc( $result)) {
                ?>
                <tr>
                  <td><?=$row['id']?></td>
                  <td><?=$row['name']?></td>
                  <td><?=$row['description']?></td>
                  <td> <img src="../uploads/categories/<?=$row['image']?>" class="cate-image" alt="image here"></td>
                  <td>
                    <a href="edit-cate.php?cate=<?=$row['id']?>" class="btn btn-primary">Edit</a>
    
                    <a href="delete-prod.php?cate=<?=$row['id']?>" class="btn btn-danger">Delete</a>
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
 include 'includes/footer.php';
 if (isset($_GET['message'])) {
  $successMessage = $_GET['message'];
    echo "
   <script>
      swal(\"$successMessage\");
    </script>

    ";
  } 
?>
<?php 
include 'includes/header.php';
$page = 'add-category';
 $post = cleanPost($_GET);
    $result = getTableDatas('orders','status','1');
?>
<div class="container">
   <div class="row">
       <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-primary">
            <h4>Completed Orders
              <a href="orders.php" class="btn btn-secondary float-end">New Order </a>
            </h4>
          </div>
          <div class="card-body">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Order Date</th>
                  <th>Tracking Number</th>
                  <th>Total Price</th>
                  <th>Action</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
               <?php    while ($row = mysqli_fetch_assoc($result)) { ?>
                  <tr>
                    <td><?=$row['created_at']?></td>
                    <td><?=$row['tracking_no']?></td>
                    <td><?=$row['total_price']?></td>
                    <td><?=$row['status'] == 0 ? 'padding' : 'completed' ?></td>
                    <td>
                      <a href="view-orders.php?order=<?=$row['id']?>" class="btn btn-primary">View</a>
                    </td>
                  </tr>
                <?php   } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
<?php 
include 'includes/footer.php'; 
?>
<?php 
include 'includes/header.php';
$page = 'add-category';
    if (isset($_POST['submit'])) {
    	$sql = "UPDATE orders SET status = ? WHERE id = ? ";
    	$binds = ['1',$_POST['order_id']];
    	query($sql,$binds);
    	$_SESSION['success'] = 'Status updated';
    }
 $post = cleanPost($_GET);
    $result = getTableDatas('orders','id',$post['order']);
    $row = mysqli_fetch_assoc($result);

?>
	<div class="container py-5">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header bg-primary">
						<h4> Orders View
							<a href="orders.php" class="btn btn-secondary float-end">Back</a>
						</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 order-details">
								<h3>Shipping Details</h3>
								<hr>
								<label> First Name </label>
								<div class="border p-2"><?=$row['fname']?> </div>
								<label> Last Name </label>
								<div class="border p-2"><?=$row['lname']?> </div>
								<label> Email </label>
								<div class="border p-2"><?=$row['email']?> </div>
								<label> Contact no</label>
								<div class="border p-2"><?=$row['phone']?> </div>
								<label> Shipping Address </label>
								<div class="border p-2">
									<?=$row['address1']?> ,<br>
									<?=$row['address2']?> ,<br>
									<?=$row['city']?> ,<br>
									<?=$row['state']?> ,
									<?=$row['country']?> 
								</div>
								<label> Zip Code</label>
								<div class="border p-2"><?=$row['pincode']?> </div>
							</div>
							<div class="col-md-6">
								<h3>Order Details</h3>
								 <hr>
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>Name</th>
											<th>Quantity</th>
											<th>Price</th>
											<th>image</th>
										</tr>
									</thead>
									<tbody>
										<?php
										    $result = getTableDatas('order_items','id',$row['id']);
										    $order = mysqli_fetch_assoc($result); 
										    $prod = getProd($order['prod_id'])	
										 ?>
											<tr>
												<td><?=$prod['name']?></td>
												<td><?=$order['qty']?></td>
												<td><?=$order['price']?></td>
												<td>
													<img src="uploads/products/'<?=$prod['image']?> " width="50px"  alt="item image">				
												</td>
											</tr>
									</tbody>
								</table>
								<h4 class="py-z">Grand Total: <span class="float-end"> N <?=$order['price']?> </span> </h4>
								<div class="mt-5 px-2">
									<label>Order Status</label>
									<form action="" method="post"> 
											<input type="hidden" name="order_id" value="<?=$order['id']?>">
										<select class="form-select" name= "order_status" >
											<option value="0" <?=$row['status'] == '0'? 'selected': ''?>  > 	Pending </option>
											<option value="1" <?=$row['status'] == '1'? 'selected': ''?> > 	Completed </option>
										</select>
										<button type='submit' name="submit" class="btn btn-primary mt-3 float-end">Update</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
include 'includes/footer.php'; 
?>
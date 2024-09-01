<?php 
include 'includes/header.php';
$page = 'add-category';
 $post = cleanPost($_GET);
    $result = getTableDatas('orders','status','1');
?>


<?php 
include 'includes/footer.php'; 
?>
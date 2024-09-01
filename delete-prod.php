<?php
include 'includes/header.php';
if (isset($_GET['cate'])) {
	$sql = "DELETE FROM categories WHERE id = ?";
	$binds = [$_GET['cate']];
	query($sql,$binds);
	$_SESSION['success'] = 'Category Delete';
}
elseif (isset($_GET['prod'])) {
	$sql = "DELETE FROM categories WHERE id = ?";
	$binds = [$_GET['cate']];
	query($sql,$binds);
	$_SESSION['success'] = 'Product Delete';
}
	if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
    redirect($previous);
	}else{
		
	}
 ?>
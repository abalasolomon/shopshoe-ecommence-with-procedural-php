<?php 
include 'includes/header.php';
	checkAdmin($user['role_as']);
	$post = [];
	$errors = [];
	if ($_POST) {
		$post = cleanPost($_POST);
		//array
		$required = [
			'name' => 'name',
			'description' => 'description',
			'meta_title' => 'meta_title',
			'meta_keywords' => 'meta_keywords',
			'meta_description' => 'meta_description',

			];
		foreach ($required as $key => $value) {
			if (empty($post[$key])) {
				$errors[] = "{$value} is required";
			}
		}
		if (empty($errors)) {
			$status = isset($_POST['status']) && $post['status'] == 'on'? 1:0;
			$popular = isset($_POST['popular']) && $_POST['popular'] == 'on'? 1:0;
			$image = uploadImage($_FILES['image'],'categories');
			if (isset($image)) {		
				$sql = "INSERT INTO categories(name,description,status,popular,image,meta_title	,meta_descrip,meta_keywords) VALUES(?,?,?,?,?,?,?,?)";
				$binds = [$post['name'],$post['description'],$status,$popular,$image,$post['meta_title'],$post['meta_description'],$post['meta_keywords']];
				$result = query($sql,$binds,true);
				if($result){
					redirect('categories.php?message=Added Successfully');
				}
			}else{
				redirect('categories.php?error=upload failed');
			} 
		}
	}

 ?>
<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = trim(htmlspecialchars(htmlentities($_POST["name"])));
    $textarea = trim(htmlspecialchars(htmlentities($_POST["textarea"])));
    $price = trim(htmlspecialchars(htmlentities($_POST["price"])));
    $discount = trim(htmlspecialchars(htmlentities($_POST["discount"])));
    $image = $_FILES['image'];
    print_r($image);
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_error = $image['error'];
    $image_size = $image['size'];
    $image_type = $image['type'];
    if(empty($name)){
        $_SESSION['error'] = "name empty";
    }
    elseif(strlen($name) < 3){
        $_SESSION['error'] = " name must be greater than 3";
    }
    elseif( strlen($name)  >30){
        $_SESSION['error'] = " name must be smaller than 30";
    }

    if(empty($textarea)){
        $_SESSION['error'] = "textarea empty";
    }

    if(empty($price)){
        $_SESSION['error'] = "price empty";
    }

    if($discount  > 100){
        $_SESSION['error'] = "discount can`t be $discount";
    }
    
    if($discount != false){
        $new_price = $price - (($price/100) * $discount);
    }
    else{
        $new_price = $price ;
        $discount = "there is no discount";
    }

    if($image_name != ''){
        $ext = pathinfo($image_name);
        $original_name = $ext['filename'];
	    $original_ext = $ext['extension'];
        $allow = ["gif","png","jpeg","jpg"];
        if(in_array($original_ext , $allow)){
            if($image_error === 0){
				if($image_size  < 5000000){
					$new_name = uniqid('',true) . "." .$original_ext;
	            $destnotion = "img/".$new_name;
					move_uploaded_file($image_tmp_name,  $destnotion);
    			}
				else {
					$_SESSION['error'] = "Your File Is To Big";
				}
			}
			else {
				$_SESSION['error'] = " You Have An Error";
			}
		}
    
        else{
            $_SESSION['error'] = " your file not allowed";
        }
    }
	else{
		$_SESSION['error'] = " Please Choose Image";
	}

    if (!isset($_SESSION['error'])){
        $_SESSION['success'] = "data added";
        $_SESSION['employees'][] = [
            'name' => $name,
            'discription' => $textarea,
            'discount' => $discount ,
            'price' => $new_price,
            'image' => $new_name,
        ];
    }
    header("location:input.php");
}
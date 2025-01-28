<?php
require("connection.php");

function image_upload($img){
    $tmp_loc = $img['tmp_name'];
    $new_name = random_int(11111,99999).$img['name'];

    $new_loc = UPLOAD_SRC.$new_name;

    if(!move_uploaded_file($tmp_loc,$new_loc)){
        header("location: admin_crud.php?alert=img_upload");
        exit;
    }
    else{
        return $new_name;
    }
}

function image_remove($img){
    if(!unlink(UPLOAD_SRC.$img)){
        header("location: admin_crud.php?alert=img_rem_fail");
        exit;
    }
}

// Add Products
if(isset($_POST['addproduct']))
{
    foreach($_POST as $key => $value){
        $_POST[$key] = mysqli_real_escape_string($con,$value);
    }
    $img_path = image_upload($_FILES['image']);

    $query="INSERT INTO `products`(`name`, `price`, `image`) VALUES ('$_POST[name]','$_POST[price]','$img_path')";
    if(mysqli_query($con,$query)){
        header("location: admin_crud.php?success=added");
    }
    else{
        header("location: admin_crud.php?alert=add_failed");
    }
}

// Remove Products
if(isset($_GET['rem']) && $_GET['rem']>0)
{
    $query="SELECT * FROM `products` WHERE `id`='$_GET[rem]'";
    $result=mysqli_query($con,$query);
    $fetch=mysqli_fetch_assoc($result);

    image_remove($fetch['image']);

    $query="DELETE FROM `products` WHERE `id`='$_GET[rem]'";
    if(mysqli_query($con,$query)){
        header("location: admin_crud.php?success=removed");
    }
    else{
        header("location: admin_crud.php?alert=remove_failed");
    }
}

// Edit Products
if(isset($_POST['editproduct']))
{
    foreach($_POST as $key => $value){
        $_POST[$key] = mysqli_real_escape_string($con,$value);
    }

    if(file_exists($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name']))
    {
        $query="SELECT * FROM `products` WHERE `id`='$_POST[editpid]'";
        $result=mysqli_query($con,$query);
        $fetch=mysqli_fetch_assoc($result);
        
        image_remove($fetch['image']);
        $imgpath=image_upload($_FILES['image']);
        $update="UPDATE `products` SET `name`='$_POST[name]',`price`='$_POST[price]',`image`='$imgpath' WHERE `id`='$_POST[editpid]'";
    }
    else{
        $update="UPDATE `products` SET `name`='$_POST[name]',`price`='$_POST[price]' WHERE `id`='$_POST[editpid]'";
    }
    if(mysqli_query($con,$update)){
        header("location: admin_crud.php?success=updated");
    }
    else{
        header("location: admin_crud.php?alert=update_failed");
    }
}

?>
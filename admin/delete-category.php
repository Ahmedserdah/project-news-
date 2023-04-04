<?php
include "../config/constraint.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql="delete from category where id='$id'";
    if($result=mysqli_query($conn,$sql)){
        $_SESSION['category']= "<div class='success'>category is deleted </div>";
        header("location:manage-category.php");
    }else{
        $_SESSION['category']= "<div class='error'>category is not deleted </div>";
        header("location:manage-category.php");
    }
}else{
    header("location:manage-category.php");
}
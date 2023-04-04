<?php

include "../config/constraint.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql="delete from admin where id='$id'";
    if($result=mysqli_query($conn,$sql)){
        $_SESSION['admin']= "<div class='success'>admin is deleted </div>";
        header("location:manage-admin.php");
    }else{
        $_SESSION['admin']= "<div class='error'>admin is not deleted </div>";
    header("location:manage-admin.php");
    }
}else{
    header("location:manage-admin.php");
}

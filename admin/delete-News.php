<?php
include "../config/constraint.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql="delete from news where id='$id'";
    if($result=mysqli_query($conn,$sql)){
        $_SESSION['news']= "<div class='success'>news is deleted </div>";
        header("location:manage-news.php");
    }else{
        $_SESSION['news']= "<div class='error'>news is not deleted </div>";
        header("location:manage-news.php");
    }
}else{
    header("location:manage-news.php");
}
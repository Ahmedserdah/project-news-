<?php
$page_title="Update_Category";
include "special-parts/menu.php";



    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "select * from Category where id='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result && $result->num_rows > 0) {
            $Category = $result->fetch_assoc();
            $id = $Category['id'];
            $title = $Category['title'];
            $old_image_name = $Category['image_name'];
            $featured = $Category['featured'];
            $active = $Category['active'];




    } else {
        header("location:manage-Category.php");
    }
}else{
    header("location:manage-Category.php");
}
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br>


        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image:</td>
                    <td>
                        <img src="<?php echo $old_image_name?>" width="60px">

                    </td>
                </tr>

                <tr>
                    <td>New Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes" <?php echo ($featured=="Yes")? "checked":""?> > Yes

                        <input type="radio" name="featured" value="No" <?php echo ($featured=="No")? "checked":""?>> No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes" <?php echo ($active=="Yes")? "checked":""?>> Yes

                        <input type="radio" name="active" value="No" <?php echo ($active=="No")? "checked":""?>> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="">
                        <input type="hidden" name="id" value="">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php

if(isset($_POST['submit'])){
      $title=$_POST['title'];
      $featured=$_POST['featured'];
      $active=$_POST['active'];
      if (isset($_FILES['image']['name'])&&$_FILES['image']['name']!="" ){
          $name=$_FILES['image']['name'];
          $temp=$_FILES['image']['tmp_name'];
          $ext=explode(".",$name);
          $ext=end($ext);
          $image_name="../images/category/".$title.".".$ext;
          echo $image_name;
          move_uploaded_file($temp,$image_name);
      }else{
          $image_name=$old_image_name;
      }
      $sql_inse="update category set title='$title',featured='$featured',active='$active' ,image_name='$image_name' where id='$id'";
      $result=mysqli_query($conn,$sql_inse);

      if($result){
          $_SESSION['category']= "<div class='success'>is category update</div>";
          header("location:manage-category.php");

      }else
          $_SESSION['category']="<div class='error'>is category not update</div>";
      header("location:manage-category.php");

  }

include "special-parts/fotar.php";
?>
<?php
$page_title="Add_Category";
include ("special-parts/menu.php")
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>



        <br><br>

        <!-- Add CAtegory Form Starts -->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes" checked> Yes
                        <input type="radio" name="featured" value="No"> No 
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes" checked> Yes
                        <input type="radio" name="active" value="No"> No 
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
        <!-- Add CAtegory Form Ends -->


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
          $image_name="../images/pngegg.png";
          }
      $sql_inse="insert into category set title='$title',featured='$featured',active='$active' ,image_name='$image_name' ";
      $result=mysqli_query($conn,$sql_inse);

      if($result){
          $_SESSION['category']= "<div class='success'>is category add</div>";
          header("location:manage-category.php");

      }else
          $_SESSION['category']="<div class='error'>is category not add</div>";
      header("location:manage-category.php");

  }
  include ("special-parts/fotar.php");
  ?>

    </body>
    </html>
<?php
$page_title="Add_News";
include "special-parts/menu.php"?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add News</h1>

        <br><br>



        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the News">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the News."></textarea>
                    </td>
                </tr>


                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">

                            <?php
                            $result=mysqli_query($conn,"select id,title from category");
                            if($result && $result->num_rows>0){
                            while ($category=$result->fetch_assoc()){
                                $id=$category['id'];
                                $title=$category['title'];
                               echo "<option value='$id'> $title</option>";
                            }}else{
                                echo "<option value='0'> No category Found </option>";
                            }

                            ?>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes 
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes 
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
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
      $category=$_POST['category'];
      $description=$_POST['description'];
      if (isset($_FILES['image']['name'])&&$_FILES['image']['name']!="" ){
          $name=$_FILES['image']['name'];
          $temp=$_FILES['image']['tmp_name'];
          $ext=explode(".",$name);
          $ext=end($ext);
          $image_name="images/News/".$title.".".$ext;
          echo $image_name;
          move_uploaded_file($temp,"../".$image_name);
      }else{
          $image_name="images/pngegg.png";
          }
      $sql_inse="insert into news set title='$title',featured='$featured',active='$active' ,image_name='$image_name',Category_id='$category',description='$description' ";
      $result=mysqli_query($conn,$sql_inse);

      if($result){
          $_SESSION['News']= "<div class='success'>is News add</div>";
          header("location:manage-News.php");

      }else
          $_SESSION['News']="<div class='error'>is News not add</div>";
      header("location:manage-News.php");

  }
  include "special-parts/fotar.php"
?>

    </body>
    </html>
<?php
$page_title="Update_Category";
include "special-parts/menu.php";



    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "select * from news where id='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result && $result->num_rows > 0) {
            $news = $result->fetch_assoc();
            $id = $news['id'];
            $title = $news['title'];
            $old_image_name = $news['image_name'];
            $featured = $news['featured'];
            $active = $news['active'];
            $description=$news['description'];
            $Category_id=$news['Category_id'];

        } else {
            header("location:manage-news.php");
        }
    }else{
        header("location:manage-news.php");
    }
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update News</h1>
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
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="5"><?php echo $description?></textarea>
                    </td>
                </tr>


                <tr>
                    <td>Current Image:</td>
                    <td>
                        <img src="<?php echo "../".$old_image_name?>" width="60px">

                    </td>
                </tr>

                <tr>
                    <td>Select New Image:</td>

                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category_id:</td>
                    <td>
                        <select name="Category_id" >
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
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="current_image" value="">

                        <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php
if(isset($_POST['submit'])){
    $title=$_POST['title'];
    $description=$_POST['description'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];
    $Category_id=$_POST['Category_id'];


    if (isset($_FILES['image']['name'])&&$_FILES['image']['name']!="" ){
        $name=$_FILES['image']['name'];
        $temp=$_FILES['image']['tmp_name'];
        $ext=explode(".",$name);
        $ext=end($ext);
        $image_name="images/News/".$title.".".$ext;
        echo $image_name;
        move_uploaded_file($temp,"../".$image_name);
    }else{
        $image_name="images/pngegg.png>";
    }

    $sql_inse="update news set title='$title',featured='$featured',active='$active' ,image_name='$image_name',description='$description',Category_id='$Category_id' ";
    $result=mysqli_query($conn,$sql_inse);

    if($result){
        $_SESSION['News']= "<div class='success'>is News add</div>";
        header("location:manage-News.php");

    }else
        $_SESSION['News']="<div class='error'>is News not add</div>";
    header("location:manage-News.php");

}
include "special-parts/fotar.php"?>

</body>
</html>
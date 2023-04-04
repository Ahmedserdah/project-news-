<?php
$page_title="mange_Category";
include "special-parts/menu.php";
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br>
        <?php

        if (isset($_SESSION['category'])) {
            echo $_SESSION['category'];
            unset($_SESSION['category']);
        }


        ?>
        <br>

        <!-- Button to Add Admin -->
        <a href="add-category.php" class="btn-primary">Add Category</a>


        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql_inse="select * from Category ";
            $result=mysqli_query($conn,$sql_inse);
            if($result && $result->num_rows>0) {
                while ($Category = $result->fetch_assoc()) {
                    $id = $Category['id'];
                    $title = $Category['title'];
                    $image_name = $Category['image_name'];
                    $featured = $Category['featured'];
                    $active = $Category['active'];
                    ?>
                    <tr>
                        <td> <?php echo "$id"?></td>
                        <td> <?php echo "$title"?></td>

                        <td>
                            <img src="<?php echo "$image_name"?> " width="50px">


                        </td>

                        <td><?php echo "$featured"?></td>
                        <td><?php echo "$active"?></td>
                        <td>
                            <a href="update-category.php?id=<?php echo "$id"?>" class="btn-secondary">Update Category</a>
                            <a href="delete-category.php?id=<?php echo "$id"?>" class="btn-danger">Delete Category</a>
                        </td>
                    </tr>

            <?php

                }
            }else{
                echo "
            <tr>
                <td colspan=\"6\">
                    <div class=\"error\">No Category Added.</div>
                </td>
            </tr>";}

            ?>

        </table>
    </div>

</div>

<?php
include "special-parts/fotar.php";
?>
<?php
$page_title="mange_News";
include "special-parts/menu.php"

?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage News</h1>

        <br/><br/>
        <?php
        if (isset($_SESSION['news'])) {
        echo $_SESSION['news'];
        unset($_SESSION['news']);
        }
        ?>
        <br>

        <!-- Button to Add Admin -->
        <a href="add-News.php" class="btn-primary">Add News</a>

        <br/><br/><br/>


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
            $sql_inse="select * from news ";
            $result=mysqli_query($conn,$sql_inse);
            if($result && $result->num_rows>0) {
                while ($news = $result->fetch_assoc()) {
                    $id = $news['id'];
                    $title = $news['title'];
                    $image_name = $news['image_name'];
                    $featured = $news['featured'];
                    $active = $news['active'];



            ?>
            <tr>
                        <td> <?php echo "$id"?></td>
                        <td> <?php echo "$title"?></td>

                        <td>
                            <img src="<?php echo "../".$image_name?> " width="50px">


                        </td>

                        <td><?php echo "$featured"?></td>
                        <td><?php echo "$active"?></td>
                        <td>
                            <a href="update-News.php?id=<?php echo "$id"?>" class="btn-secondary">Update News</a>
                            <a href="delete-News.php?id=<?php echo "$id"?>" class="btn-danger">Delete News</a>
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

<?php include "special-parts/fotar.php"?>

</body>
</html>
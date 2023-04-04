<?php
$page_title="mange_admin";
include ("special-parts/menu.php");

?>

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>

        <br/>
        <?php

        if (isset($_SESSION['admin'])) {
            echo $_SESSION['admin'];
            unset($_SESSION['admin']);
        }


        ?>

        <br><br><br>


        <a href="add-admin.php" class="btn-primary">Add Admin</a>

        <br/><br/><br/>

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>


            <?php
            $sql_inse="select * from admin ";
            $result=mysqli_query($conn,$sql_inse);
            if($result && $result->num_rows>0){
                while ($admin=$result->fetch_assoc()){
                    $id=$admin['id'];
                    $username=$admin['username'];
                    $fullname=$admin['fullname'];
                    ?>

                   <tr>
                         <td><?php echo $id?></td>
                <td><?php echo $username?></td>
                <td><?php echo $fullname?></td>
                <td>
                    <a href="update-admin.php?id=<?php echo $id?>" class="btn-secondary"> update </a> &nbsp;
                    <a href="delete-admin.php?id=<?php echo $id?>" class="btn-danger"> delete </a>&nbsp;
                    <a href="update-password.php?id=<?php echo $id?>" class="btn-primary"> change password </a>&nbsp;

                </td>
            </tr>
                    <?php
                }

            }else echo "<tr>
                <td>
                    <p> no admin yet ! </p></td>
            </tr>";
            ?>




        </table>

    </div>
</div>


<?php
include ("special-parts/fotar.php");
?>
<?php
$page_title="Add_Admin";
include ("special-parts/menu.php");
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php


if(isset($_POST['submit'])){
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql_inse="insert into admin set username='$username',fullname='$full_name',password='$password'  ";

    $result=mysqli_query($conn,$sql_inse);


if($result){
    $_SESSION['admin']= "<div class='success'>is admin add</div>";
    header("location:manage-admin.php");

}else
    $_SESSION['admin']="<div class='error'>is admin not add</div>";
    header("location:manage-admin.php");




}


include ("special-parts/fotar.php");
?>

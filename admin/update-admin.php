<?php
$page_title="Update_Admin";
include ("special-parts/menu.php");

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select * from admin where id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result && $result->num_rows>0){
        $admin=$result->fetch_assoc();
        $username=$admin['username'];
        $fullname=$admin['fullname'];

    }

}else{
    header("location:manage-admin.php");
}
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo "$fullname"?>">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo "$username"?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
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

    $sql_inse="update admin set username='$username',fullname='$full_name',password='$password'  ";

    $result=mysqli_query($conn,$sql_inse);


if($result){
    $_SESSION['admin']= "<div class='success'>admin is update </div>";
    header("location:manage-admin.php");

}else
    $_SESSION['admin']="<div class='error'>admin is not update</div>";
    header("location:manage-admin.php");




}
?>
<?php
include "special-parts/fotar.php";
?>
</body>
</html>
<?php
$page_title="Change_Password";

include ("special-parts/menu.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select password from admin where id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result && $result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        $old_password=$admin['password'];
    } else{

            header("location:manage-admin.php");}
} else {
        header("location:manage-admin.php");

}

?>
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Current Password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div>


<?php

if(isset($_POST['submit'])) {
    $Current_Password =md5( $_POST['current_password']);
    $New_Password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    if ($old_password==$Current_Password){
        if ($New_Password=$confirm_password){
            $New_Password=md5($New_Password);
            $sql_inse = "update admin set password='$New_Password'where id='$id' ";
            $result = mysqli_query($conn, $sql_inse);
            if($result){
                $_SESSION['admin']= "<div class='success'>password is updated </div>";
                header("location:manage-admin.php");

            }else
                $_SESSION['admin']="<div class='error'>password is not update</div>";
            header("location:manage-admin.php");


        }else{
            echo "password are not matched";
        }

    }else echo "current is not correct";


}
include ("special-parts/fotar.php")
?>
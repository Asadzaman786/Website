<?php
include('back-header.php');
$role_name ="";
if(isset($_POST['submit'])){
    $role_name = $_POST['role_name'];
    /* Insert Data into database */
    $sql = "insert into roles (role_name) values ('{$role_name}')";
    //echo $sql;die;
    if($conn->query($sql)){
        $_SESSION['msg'] = "<p class='text-center text-success fs-4'>Data Insert Successful</p>";
        header("Location:role-list.php");
    }
    else
    header("Location:add-role.php");
}
$conn->close();
?>

<h4>Add Role</h4>
<form method="post">
    <div class="row">
        <div class="col-md-12">
            <label for="role_name">Name</label>
            <input type="text" name="role_name" autocomplete="off" class="form-control" value="<?php echo $role_name; ?>">
        </div>
        <div class="col-md-12 my-3 d-flex justify-content-end">
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
<?php include('back-footer.php') ?>

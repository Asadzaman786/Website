<?php
include('back-header.php');
$name ="";
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    /* Insert Data into database */
    $sql = "insert into categories (name) values ('{$name}')";
    //echo $sql;die;
    if($conn->query($sql)){
        $_SESSION['msg'] = "<p class='text-center text-success fs-4'>Data Insert Successful</p>";
        header("Location:categories-list.php");
    }
    else
    header("Location:add-category.php");
}
$conn->close();
?>

<h4>Add Category</h4>
<form method="post">
    <div class="row">
        <div class="col-md-12">
            <label for="role_name">Name</label>
            <input type="text" name="name" autocomplete="off" class="form-control" value="<?php echo $name; ?>">
        </div>
        <div class="col-md-12 my-3 d-flex justify-content-end">
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
<?php include('back-footer.php') ?>

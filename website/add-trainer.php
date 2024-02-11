<?php
include('back-header.php');
$name ="";
$qualification ="";
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $qualification = $_POST['qualification'];
    /* Insert Data into database */
    /* Image Upload */
    $upload_dir = "uploads/";
    $target_file = $upload_dir.basename($_FILES["photo_url"]["name"]);
    if(move_uploaded_file($_FILES['photo_url']['tmp_name'],$target_file)){
        $sql = "insert into trainers (name,qualification,photo_url) values ('{$name}','{$qualification}','{$target_file}')";
    }else{
        $sql = "insert into trainers (name,qualification) values ('{$name}','{$qualification}')";
    }
    //echo $sql;die;
    if($conn->query($sql)){
        $_SESSION['msg'] = "<p class='text-center text-success fs-4'>Data Insert Successful</p>";
        header("Location:trainers-list.php");
    }
    else
    header("Location:add-trainer.php");
}
$conn->close();
?>

<h4>Add Trainer</h4>
<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <label for="role_name">Name</label>
            <input type="text" name="name" autocomplete="off" class="form-control" value="<?php echo $name; ?>">
        </div>
        <div class="col-md-12">
            <label for="qualification">Qualification</label>
            <input type="text" name="qualification" autocomplete="off" class="form-control" value="<?php echo $qualification; ?>">
        </div>
        <div class="col-md-12">
            <label for="photo_url">Upload Image</label>
            <input type="file" name="photo_url" class="form-control">
        </div>
        <div class="col-md-12 my-3 d-flex justify-content-end">
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
<?php include('back-footer.php') ?>

<?php
include('back-header.php');
$post_title ="";
$post_description ="";
if(isset($_POST['submit'])){
    $post_title = $_POST['post_title'];
    $post_description = $_POST['post_description'];
    $published_at = $_POST['published_at'];
    $category_id = $_POST['category_id'];
    /* Insert Data into database */
    /* Image Upload */
    $upload_dir = "uploads/";
    $target_file = $upload_dir.basename($_FILES["photo_url"]["name"]);
    if(move_uploaded_file($_FILES['photo_url']['tmp_name'],$target_file)){
        $sql = "insert into posts (post_title,post_description,photo_url,published_at,category_id) values ('{$post_title}','{$post_description}','{$target_file}','{$published_at}','{$category_id}')";
    }else{
        $sql = "insert into posts (post_title,post_description,published_at,category_id) values ('{$post_title}','{$post_description}','{$published_at}','{$category_id}')";
    }
    //echo $sql;die;
    if($conn->query($sql)){
        $_SESSION['msg'] = "<p class='text-center text-success fs-4'>Data Insert Successful</p>";
        header("Location:posts-list.php");
    }
    else
    header("Location:add-post.php");
}
?>

<h4>Add Post</h4>
<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <label for="post_title">Post Title</label>
            <input type="text" name="post_title" autocomplete="off" class="form-control" value="<?php echo $post_title; ?>">
        </div>
        <div class="col-md-12">
            <label for="post_description">Post Description</label>
            <textarea class="form-control" rows="4" name="post_description" value="<?php echo $post_description; ?>"></textarea>
        </div>
        <div class="col-md-12">
            <label for="photo_url">Upload Image</label>
            <input type="file" name="photo_url" class="form-control">
        </div>
        <div class="col-md-12">
            <label for="published_at">Published At</label>
            <input type="datetime-local" id="published_at" name="published_at" class="form-control">
        </div>
        <?php
        $sql_one = "select * from categories";
        $result = $conn->query($sql_one);
        ?>
        <div class="col-md-12">
            <label for="category_id">Select Category</label>
            <select class="form-control" name="category_id">
                <option value="">Select</option>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <option value="<?= $row['id'];?>"><?= $row['name'];?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-md-12 my-3 d-flex justify-content-end">
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
<?php 
$conn->close();
include('back-footer.php') 
?>

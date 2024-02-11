<?php
include('back-header.php');
$sql = "SELECT posts.id,posts.post_title,posts.post_description,posts.photo_url,posts.published_at,categories.name from posts JOIN categories on posts.category_id = categories.id";
$result = $conn->query($sql);
?>
<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<h4>Posts List</h4>




<div class="col-md-12 d-flex justify-content-between">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Posts List</li>
        </ol>
    </nav>
    <a href="add-post.php" class="btn btn-sm btn-primary">Add Post</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Post Title</th>
            <th>Post Description</th>
            <th>Image</th>
            <th>Published At</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $sl=1; while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $sl++; ?></td>
                <td><?= $row['post_title']; ?></td>
                <td><?= $row['post_description']; ?></td>
                <td><img src="<?= $row['photo_url']; ?>"></td>
                <td><?= $row['published_at']; ?></td>
                <td><?= $row['name']; ?></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="show-post.php?id=<?= $row['id']; ?>">Show Post</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php include('back-footer.php') ?>
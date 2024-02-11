<?php
include('back-header.php');
$sql = "select * from roles";
$result = $conn->query($sql);
?>
<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<h4>Role List</h4>




<div class="col-md-12 d-flex justify-content-between">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Role List</li>
        </ol>
    </nav>
    <a href="add-role.php" class="btn btn-sm btn-primary">Add Role</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['role_name']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php include('back-footer.php') ?>
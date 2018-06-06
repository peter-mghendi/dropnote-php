<!doctype html>
<?php include '../_includes/_protect.php' ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DropNote | Edit Profile</title>
    <link rel="stylesheet" href="../_config/css/bootstrap.css"/>
    <link rel="stylesheet" href="../_config/css/custom.css">
    <link rel="stylesheet" href="../_config/css/dataTables.css"/>

</head>
<body>
<?php
include '../_includes/nav/private_nav.php';
include '../_includes/_connect.php';
$changed = $_SESSION['token'];
$sql ="select * from users WHERE token = '$changed'";
$result = mysqli_query($db,$sql);
$row =mysqli_fetch_row($result);
$id = $row[0];
?>
<div class="container-fluid page-content" >
    <div class="card-content">
        <form class="form" role="form" method="post" action="_change.php">

    <div class="form-group">
        <label for="new_username">Username:</label>
        <input type="text" class="form-control" name="new_username" id="new_username" placeholder="Username" autocomplete="off" value="<?php echo $row[1];?>" required>
    </div>

    <div class="form-group">
        <label for="new_email">Email:</label>
        <input type="email" class="form-control" name="new_email" id="new_email" placeholder="Your Email" autocomplete="off" value="<?php echo $row[2];?>" required>
    </div>

    <div class="form-group">
        <label for="new_password">Password:</label>
        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Create a Password" autocomplete="off" value="<?php echo $row[3];?>" required>
    </div>

    <input type='text' name='id' value='<?php echo $id?>' autocomplete='off' hidden>
    <button type="submit" class="btn btn-other btn-block" name="submit"><span class="glyphicon glyphicon-transfer"></span> Change</button>
</form>
    </div>
</div>
<script src="_config/js/custom.js"></script>
<script src="_config/js/jquery.min.js"></script>
<script src="_config/js/bootstrap.min.js"></script>
</body>
</html>

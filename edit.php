<!doctype html>
<?php include './_includes/_protect.php' ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DropNote | Edit Note</title>
    <link rel="stylesheet" href="_config/css/bootstrap.css"/>
    <link rel="stylesheet" href="_config/css/custom.css">
    <link rel="stylesheet" href="_config/css/dataTables.css"/>

</head>
<body>
<?php
include './_includes/nav/private_nav.php';
include './_includes/_connect.php';
$edited = $_GET['id'];
$sql ="select * from notes WHERE id = '$edited'";
$result = mysqli_query($db,$sql);
$row =mysqli_fetch_row($result);
$id = $row[0];
if (!$row[6] != "[Unspecified]"){
                $etok = $row[6];
                $esql= "SELECT * FROM users WHERE token = '$etok'";
                $eres = mysqli_query($db,$esql);
                $erow =mysqli_fetch_row($eres);
                $edrop_for = $erow[2];
            } else {
                $edrop_for = $row[6]; 
            }
?>
<div class="container-fluid page-content" >
    <div class="card-content">
        <form class="form" role="form" method="post" action="_includes/_edit.php">
            <div class="form-group">
                <label for="new_title">Title:</label>
                <input type="text" class="form-control" name="new_title" id="new_title" placeholder="RE:Title" autocomplete="off" value='<?php echo "$row[1]"?>'>
            </div>

            <div class="form-group">
                <label for="new_content">Content:</label>
                <textarea class="form-control" name="new_content" id="new_content" rows="10"  placeholder="Note Content..." autocomplete="off" required><?php echo "{$row[2]}"?></textarea>
            </div>
            <div class="form-group">
                <label for="for">Dropped For:</label>
                <input type="text" class="form-control" name="new_dropped_for" id="new_dropped_for" placeholder="Leave blank for unspecified." autocomplete="off" value='<?php echo "$edrop_for"?>'>
            </div>
                <div class="form-group">
                    <input type="checkbox" id="new_cbAnonymous" name="new_cbAnonymous">
                <label for="new_cbAnonymous">Send as Anonymous</label>
                <label><b>*NOTE: </b>Anonymous notes are not tied to your account in any way.<br>
                Consequently, no further actions can be performed on them after they are saved.</label>
            </div>
            <input type='text' name='id' value='<?php echo "{$_GET['id']}"?>' autocomplete='off' hidden>
            <button type="submit" class="btn btn-other btn-block" name="submit"><span class="glyphicon glyphicon-hand-down"></span> Drop</button>
        </form>
    </div>
</div>
<script src="_config/js/custom.js"></script>
<script src="_config/js/jquery.min.js"></script>
<script src="_config/js/bootstrap.min.js"></script>
</body>
</html>

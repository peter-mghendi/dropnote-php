<?php
  $card = 'none;';
  if( isset($_POST['voucher']) or isset($_GET['voucher']))
  {
      include './_includes/_dropcode.php'; 
      $card = 'block;';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DropNote | Drop Code</title>
    <link rel="stylesheet" href="_config/css/bootstrap.css"/>
    <link rel="stylesheet" href="_config/css/custom.css">
    <link rel="stylesheet" href="_config/css/dataTables.css"/>

</head>
<body>
<?php
include '_includes/_nav.php';
include '_includes/_modal.php';
?>
<div class="container-fluid page-content" >
    <div class="card-content">
        <form class="form" role="form" method="post" action="<?php $_PHP_SELF ?>">
            <div class="form-group">
                <label for="title">Code: </label>
                <input type="text" class="form-control" name="voucher" id="voucher" placeholder="Drop Code Here" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-other btn-block" name="submit"><span class="glyphicon glyphicon-hand-down"></span> Drop</button>
        </form>
    </div>
    <div class="card-content" style="display: <?php echo $card;?>">
        <h3><b>RE: <?php echo $title ?></b></h3>
        <h4>Dropped by <?php echo $drop_by;?> on <?php echo $dropped_on;?></h4>
        <hr>
        <p><?php echo $content?></p>
    </div>
</div>
<script src="_config/js/custom.js"></script>
<script src="_config/js/jquery.min.js"></script>
<script src="_config/js/bootstrap.min.js"></script>
</body>
</html>
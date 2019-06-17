<?php
  $card = 'none;';
  // TODO Validate data, minify
  if (isset($_POST['voucher']) or isset($_GET['voucher'])) {
      include './_includes/_dropcode.php'; 
      $card = 'block;';
    }
?>
<?php include '_includes/header.php'; ?>
<div class="container page-content" >
    <div class="card mb-3">
        <div class="card-body">
            <form class="form" role="form" method="post">
                <div class="form-group">
                    <label for="title">Code: </label>
                    <input type="text" class="form-control" name="voucher" id="voucher" placeholder="Drop Code Here" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-other btn-block" name="submit">Drop</button>
            </form>
        </div>
    </div>
    <div class="card mb-3" style="display: <?=$card;?>">
        <div class="card-header">
            <h4 class="card-title"><b>RE: <?=$title;?></b></h4>
            <h5 class="card-subtitle ext-muted mb-2">Dropped by <?=$drop_by;?> on <?=$dropped_on;?></h5>
        </div>
        <div class="card-body"><p><?=$content?></p></div>
    </div>
</div>
<?php include '_includes/footer.php'; ?>
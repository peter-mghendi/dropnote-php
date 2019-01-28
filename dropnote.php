<?php
  $card = 'none;';
  if( isset($_POST['content']))
  {
      include './_includes/_dropnote.php'; 
      $card = 'block;';
      
      include('./_includes/phpqrcode/qrlib.php'); 
      $text='HELLO WORLD';
      $folder="_config/img/qr/";
      $file_name="qr.png";
      $file_name=$folder.$voucher.$file_name;
      QRcode::png($voucher, $file_name, QR_ECLEVEL_H, 5, 3, false);
}?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DropNote | Drop Note</title>
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
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="RE:Title" maxlength="20" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" name="content" id="content" rows="10"  placeholder="Note Content..." maxlength="5000" autocomplete="off" required></textarea>
            </div>
            <fieldset style='display: <?php if( isset($_SESSION['username'])){echo 'block';} else {echo 'none';}?>'>
            <div class="form-group">
                <label for="dropped_for">Dropped For:</label>
                <input type="text" class="form-control" name="dropped_for" id="dropped_for" placeholder="Leave blank for unspecified." maxlength="100" autocomplete="off">
            </div>
                <div class="form-group">
                <input type="checkbox" id="cbAnonymous" name="cbAnonymous">
                <label for="cbAnonymous">Send as Anonymous</label>
                <label><b>*NOTE: </b>Anonymous notes are not tied to your account in any way.<br>
                Consequently, no further actions can be performed on them after they are saved.</label>
            </div>
            </fieldset>
            <button type="submit" class="btn btn-other btn-block" name="submit" id="btnDropNote"><span class="glyphicon glyphicon-hand-down"></span> Drop</button>
        </form>
    </div>
    <div class="card-content" id="voucherCard" style="display: <?php echo $card;?>">
        <h3>Your note <?php echo $title ?> has been saved!</h3>
        <p>Your code is: <?php echo $voucher ?> <a><span class="glyphicon glyphicon-copy"></span></a></p>
        <p>Your link is: <?php echo $link;?> <a><span class="glyphicon glyphicon-copy"></span></a></p>
        <button class="btn btn-sm box-btn btn-primary" id="btnQr">
            <span class="glyphicon glyphicon-qrcode"></span> View QR</button>
    </div>
    <div class="card-content hidden-div" id="qrCard">
        <button class="btn btn-sm box-btn btn-warning" id="qrBack" >
            <span class="glyphicon glyphicon-hand-left"></span> Back</button>
            <div class="text-center">
                <a target="_blank" href="<?php echo $file_name;?>">
                    <img src="<?php echo $file_name;?>" 
                         alt="QR Code cannot be displayed"
                         title="<?php echo $link;?>"></div>
    </div>
    
</div>
<script type="text/javascript">
    var btnQr = document.getElementById("btnQr");
    var qrBack = document.getElementById("qrBack");
    var qrCard = document.getElementById("qrCard");
    var vcrCard = document.getElementById("voucherCard");
    btnQr.onclick = function() {
        vcrCard.style.display = "none";
        qrCard.style.display = "block";
    };
    qrBack.onclick = function() {
        qrCard.style.display = "none";
        vcrCard.style.display = "block";
    };
</script>
<script src="_config/js/custom.js"></script>
<script src="_config/js/jquery.min.js"></script>
<script src="_config/js/bootstrap.min.js"></script>
<script src="_config/js/qrcode.min.js"></script>
</body>
</html>
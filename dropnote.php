<?php include '_includes/header.php'; ?>
<?php
  $card = 'none;';
  if( isset($_POST['content'])) {
      include './_includes/_dropnote.php'; 
      $card = 'block;';
      $folder="_assets/img/qr/";
      $file_name=$folder.$voucher."_qr.png";
      QRcode::png($voucher, $file_name, QR_ECLEVEL_H, 5, 3, false);
}?>
<div class="container page-content" >
    <div class="card mb-3">
        <div class="card-body">
            <form class="form" role="form" method="post"">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="RE:Title" maxlength="20" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" name="content" id="content" rows="4"  placeholder="Note Content..." maxlength="5000" autocomplete="off" required></textarea>
                </div>
                <fieldset style='display: <?=isset($_SESSION['user'])?'block':'none';?>'>
                    <div class="form-group">
                        <label for="dropped_for">Dropped For:</label>
                        <input type="text" class="form-control" name="dropped_for" id="dropped_for" placeholder="Leave blank for unspecified." maxlength="100" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="cbAnonymous" name="cbAnonymous">
                        <label for="cbAnonymous">Send as Anonymous</label><br>
                        <small>Anonymous notes are not tied to your account in any way. Consequently, no further actions can be performed on them after they are saved.</small>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-other btn-block" name="submit" id="btnDropNote">Drop</button>
            </form>
        </div>
    </div>
    <div class="card hidden-div mb-3" id="voucherCard" style="display: <?php echo $card;?>">
        <div class="card-body">
            <h3>Your note <?=$title ?> has been saved!</h3>
            <div class="d-block">
                <p class="d-inline">Your code is: <span id="code"><?=$voucher;?></span></p>
                <a class="btn btn-link trigger text-primary" data-trigger="copy" data-clipboard-target="#code">
                    <i class="far fa-copy"></i>
                </a>
            </div>
            <div class="d-block">
                <p class="d-inline">Your link is: <span id="link"><?=$link;?></span></p>
                <a class="btn btn-link trigger text-primary" data-trigger="copy" data-clipboard-target="#link">
                    <i class="far fa-copy"></i>
                </a>
            </div>
            <button class="btn btn-sm box-btn btn-primary" id="btnQr">View QR</button>
        </div>
    </div>

    <div class="card hidden-div mb-3" id="qrCard">
        <div class="card-body">
            <button class="btn btn-sm box-btn btn-warning" id="qrBack">Back</button>
            <div class="text-center">
                <a target="_blank" href="<?php echo $file_name;?>">
                    <img src="<?php echo $file_name;?>" 
                         alt="QR Code cannot be displayed"
                         title="<?php echo $link;?>">
                </a>
            </div>
        </div>
    </div>
</div>
<?php include '_includes/footer.php'; ?>
<?php include './_includes/_protect.php' ?>
<?php include '_includes/header.php'; ?>
<?php 
$contentCard = "none;";
if(isset($_GET['voucher'])){
    $contentCard = "block;";
}
$vistat = 'visible'; 
$histat = 'hidden';  
$hiquery = "select * from notes WHERE status = 'hidden' AND dropped_by = '{$_SESSION['token']}'";
$hiresult = mysqli_query($db,$hiquery);
$hicount = mysqli_num_rows($hiresult);
?>
<div class="container-fluid" >
    <div id="visibleNotes" class="card notes-margin mb-3">
        <div class="card-body">
            <a href="javascript:void(0)" id="btnShow" class="btn btn-sm btn-success box-btn">VIEW HIDDEN</a>
            <a href="<?=$this_page;?>?note=hide&status=<?=$vistat;?>" class="btn btn-sm btn-warning box-btn">HIDE ALL</a>
            <a href="<?=$this_page;?>?note=delete&status=<?=$vistat;?>" class="btn btn-sm btn-danger box-btn">DELETE ALL</a>
            <table class="table table-borderless table-hover datatable" id="example">
                <caption><?="You have $hicount hidden notes";?></caption>
                <thead>
                <tr class="text-center">
                    <th>TITLE</th>
                    <th>VOUCHER</th>
                    <th>DROPPED ON</th>
                    <th>DROPPED FOR</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    $query = "select * from notes WHERE status = '$vistat' AND dropped_by = '{$_SESSION['token']}'";
                    $resulti = mysqli_query($db,$query);
                    while($row =mysqli_fetch_row($resulti)){
                        $id = $row[0];
                        if ($row[6] != "[Unspecified]"){
                            $tok = $row[6];
                            $usql= "SELECT * FROM users WHERE token = '$tok'";
                            $res = mysqli_query($db,$usql);
                            $urow =mysqli_fetch_row($res);
                            $drop_for = $urow[2];
                        } else $drop_for = $row[6];
                        
                        // TODO Revoke all
                        echo "<tr>";
                        echo "<td><a href = \"drops.php?voucher=$row[3]\">$row[1]</a></td>";
                        echo "<td>$row[3]</td>";
                        echo "<td>$row[4]</td>";
                        echo "<td><a>$drop_for</a></td>";
                        echo "<td><span>
                                <a name='edit' title='Edit' href='edit.php?id=$id'><i class='fas fa-edit'></i></a>
                                <a name='hide' title='Hide' href='$this_page?note=hide&id=$id&status=$vistat'><i class='fas fa-eye-slash'></i></a>
                                <a name='revoke' title='Revoke' href='$this_page?note=revoke&id=$id'><i class='fas fa-redo-alt'></i></a>
                                <a name='delete' title='Delete' href='$this_page?note=delete&id=$id&status=$vistat'><i class='fas fa-eraser'></i></a>
                            </span></td>";
                        echo "</tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <div id="hiddenNotes" class="card hidden-div notes-margin mb-3">
        <div class="card-body">
        <a href="javascript:void(0)" id="btnHide" class="btn btn-sm btn-success box-btn"><span class="glyphicon glyphicon-eye-close"></span> HIDE HIDDEN</a>
        <a href="<?=$this_page;?>?note=hide&status=<?php echo $histat; ?>" class="btn btn-sm btn-warning box-btn"><span class="glyphicon glyphicon-eye-open"></span> UNHIDE ALL</a>
        <a href="<?=$this_page;?>?note=delete&status=<?php echo $histat; ?>" class="btn btn-sm btn-danger box-btn"><span class="glyphicon glyphicon-trash"></span> DELETE ALL</a>
        <table class="table table-borderless table-hover datatable" id="example">
                <caption><?="You have $hicount hidden notes";?></caption>
                <thead>
                <tr class="text-center">
                    <th>TITLE</th>
                    <th>VOUCHER</th>
                    <th>DROPPED ON</th>
                    <th>DROPPED FOR</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                <?php
                
                while($hirow =mysqli_fetch_row($hiresult)){
                    $id = $hirow[0];
                    if (!$hirow[6] != "[Unspecified]"){
                        $hitok = $hirow[6];
                        $hisql= "SELECT * FROM users WHERE token = '$hitok'";
                        $hires = mysqli_query($db,$hisql);
                        $hirow =mysqli_fetch_row($hires);
                        $hidrop_for = $hirow[2];
                    } else $hidrop_for = $hirow[6];
                    
                    // TODO Revoke all
                    echo "<tr>";
                    echo "<td><a href = \"drops.php?voucher=$hirow[3]\">$hirow[1]</a></td>";
                    echo "<td>$hirow[3]</td>";
                    echo "<td>$hirow[4]</td>";
                    echo "<td><a>$hidrop_for</a></td>";
                    echo "<td><span>
                            <a name='edit' title='Edit' href='edit.php?id=$id'><i class='fas fa-edit'></i></a>
                            <a name='unhide' title='Unhide' href='$this_page?note=hide&id=$id&status=$histat'><i class='fas fa-eye'></i></a>
                            <a name='revoke' title='Revoke' href='$this_page?note=revoke&id=$id'><i class='fas fa-redo-alt'></i></a>
                            <a name='delete' title='Delete' href='$this_page?note=delete&id=$id&status=$histat'><i class='fas fa-eraser'></i></a>
                        </span></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="card mb-3" style="display: <?=$contentCard;?>">
        <?php include './_includes/_dropcode.php';?>
        <div class="card-header">
            <h4 class="card-title"><b>RE: <?=$title ?></b></h4>
            <h5 class="card-subtitle text-muted"><b>Dropped on <?=$dropped_on;?></b></h5>
            <div class="d-block">
                <h5 class="card-subtitle text-muted d-inline">Voucher: <span id="code"><?=$voucher;?></span></h5>
                <a class="btn btn-link trigger text-primary" data-trigger="copy" data-clipboard-target="#voucher">
                    <i class="far fa-copy"></i>
                </a>
            </div>
        </div>
        <div class="card-body"><p><?=$content?></p></div>
    </div>
</div>
<?php include '_includes/footer.php'; ?>
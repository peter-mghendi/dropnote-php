<?php include './_includes/_protect.php' ?>
<?php include '_includes/header.php'; ?>
<?php 
$contentCard = "none;";
if(isset($_GET['voucher'])){
    $contentCard = "block;";
}
$vistat = 'visible'; 
$histat = 'hidden';  ?>
<div class="container-fluid" >
    <div id="visibleNotes" class="card-content notes-margin">
    <br>
    <table class="table table-condensed" id="example">
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
        while($row =mysqli_fetch_row($resulti) )
        {
            $id = $row[0];
            if ($row[6] != "[Unspecified]"){
                $tok = $row[6];
                $usql= "SELECT * FROM users WHERE token = '$tok'";
                $res = mysqli_query($db,$usql);
                $urow =mysqli_fetch_row($res);
                $drop_for = $urow[2];
            } else {
                $drop_for = $row[6]; 
            }
            
            echo "<tr>";
            echo "<td><a href = \"drops.php?voucher=$row[3]\">$row[1]</a></td>";
            echo "<td>$row[3]</td>";
            echo "<td>$row[4]</td>";
            echo "<td><a>$drop_for</a></td>";
            echo "<td><span>
                    <a name='edit' title='Edit' class='glyphicon glyphicon-edit' href='edit.php?id=$id'></a>
                    <a name='hide' title='Hide' class='glyphicon glyphicon-eye-close' href='_includes/_hide.php?id=$id&status=$vistat'></a>
                    <a name='revoke' title='Revoke' class='glyphicon glyphicon-console' href='_includes/_revoke.php?id=$id'></a>
                    <a name='delete' title='Delete' class='glyphicon glyphicon-trash' href='_includes/_delete.php?id=$id&status=$vistat'></a>
                  </span></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    
    <?php
    $hiquery = "select * from notes WHERE status = 'hidden' AND dropped_by = '{$_SESSION['token']}'";
    $hiresult = mysqli_query($db,$hiquery);
    $hicount = mysqli_num_rows($hiresult);
    echo "You have $hicount hidden notes"
    ?>

    <br><br>
    <a href="_includes/_hide.php?status=<?php echo $vistat; ?>" class="btn btn-sm btn-warning box-btn"><span class="glyphicon glyphicon-eye-close"></span> HIDE ALL</a>
    <a href="javascript:void(0)" id="btnShow" class="btn btn-sm btn-success box-btn"><span class="glyphicon glyphicon-eye-open"></span> VIEW HIDDEN</a>
    <a href="_includes/_delete.php?status=<?php echo $vistat; ?>" class="btn btn-sm btn-danger box-btn"><span class="glyphicon glyphicon-trash"></span> DELETE ALL</a>
    </div>
    
    <div id="hiddenNotes" class="card-content text-center hidden-div notes-margin">
    <br>
    <table class="table" id="example">
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
        
        while($hirow =mysqli_fetch_row($hiresult) )
        {
            $id = $hirow[0];
            if (!$hirow[6] != "[Unspecified]"){
                $hitok = $hirow[6];
                $hisql= "SELECT * FROM users WHERE token = '$hitok'";
                $hires = mysqli_query($db,$hisql);
                $hirow =mysqli_fetch_row($hires);
                $hidrop_for = $hirow[2];
            } else {
                $hidrop_for = $hirow[6]; 
            }
            
            echo "<tr>";
            echo "<td><a href = \"drops.php?voucher=$hirow[3]\">$hirow[1]</a></td>";
            echo "<td>$hirow[3]</td>";
            echo "<td>$hirow[4]</td>";
            echo "<td><a>$hidrop_for</a></td>";
            echo "<td><span>
                    <a name='edit' title='Edit' class='glyphicon glyphicon-edit' href='edit.php?id=$id'></a>
                    <a name='unhide' title='Unhide' class='glyphicon glyphicon-eye-open' href='_includes/_hide.php?id=$id&status=$histat'></a>
                    <a name='revoke' title='Revoke' class='glyphicon glyphicon-console' href='_includes/_revoke.php?id=$id'></a>
                    <a name='delete' title='Delete' class='glyphicon glyphicon-trash' href='_includes/_delete.php?id=$id&status=$histat'></a>
                  </span></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <?php
    echo "You have $hicount hidden notes"
    ?>

    <br><br>
    <a href="_includes/_hide.php?status=<?php echo $histat; ?>" class="btn btn-sm btn-warning box-btn"><span class="glyphicon glyphicon-eye-open"></span> UNHIDE ALL</a>
    <a href="javascript:void(0)" id="btnHide" class="btn btn-sm btn-success box-btn"><span class="glyphicon glyphicon-eye-close"></span> HIDE HIDDEN</a>
    <a href="_includes/_delete.php?status=<?php echo $histat; ?>" class="btn btn-sm btn-danger box-btn"><span class="glyphicon glyphicon-trash"></span> DELETE ALL</a>
    </div>
    
    <div class="card-content" style="display: <?php echo $contentCard ?>">
        <?php include './_includes/_dropcode.php';?>
        <h3><b>RE: <?php echo $title ?></b></h3>
        <h4><b>Dropped on <?php echo $dropped_on;?></b></h4>
        <h5><b>Voucher: <?php echo $voucher;?> <a><span class="glyphicon glyphicon-copy"></span></a></b></h5>
        <hr>
        <p><?php echo $content?></p>
    </div>
</div>
<?php include '_includes/footer.php'; ?>
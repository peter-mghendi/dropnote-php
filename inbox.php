<?php include './_includes/_protect.php' ?>
<?php include '_includes/header.php'; ?>
<?php 
$privateCard = "none;";
if(isset($_GET['voucher'])){
    $privateCard = "block;";
}?>
<div class="container-fluid" >
    <div id="welcomeCard" class="card container mb-3">
        <div class="card-body">
            <table class="table table-borderless table-hover datatable" id="example">
                <thead>
                <tr class="text-center">
                    <th>TITLE</th>
                    <th>VOUCHER</th>
                    <th>DROPPED ON</th>
                    <th>DROPPED BY</th>
                </tr>
                </thead>
                <tbody>
                <?php        
                $query = "select * from notes WHERE status = 'visible' AND dropped_for = '{$_SESSION['token']}'";
                $resulti = mysqli_query($db,$query);
                while($row =mysqli_fetch_row($resulti) )
                {
                    $id = $row[0];
                    $tok = $row[5];
                    $usql= "SELECT * FROM users WHERE token = '$tok'";
                    $res = mysqli_query($db,$usql);
                    $urow =mysqli_fetch_row($res);
                    $drop_by = $urow[2];
                    echo "<tr>";
                    echo "<td><a href = \"private.php?voucher=$row[3]\">$row[1]</a></td>";
                    echo "<td>$row[3]</td>";
                    echo "<td>$row[4]</td>";
                    echo "<td><a>$drop_by</a></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card mb-3" style="display: <?php echo $privateCard ?>">
        <?php include './_includes/_dropcode.php';?>
        <div class="card-header">
            <h4 class="card-title">RE: <?php echo $title ?></h3>
            <h4 class="card-subtitle text-muted">Dropped on <?php echo $dropped_on;?></h4>
            <h5 class="card-subtitle text-muted">Voucher: <?php echo $voucher;?> <a></a></h5>
        </div>
        <div class="card-body"><p><?php echo $content?></p></div>
    </div>
</div>
<?php include '_includes/footer.php'; ?>
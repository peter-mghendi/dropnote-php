<?php include './_includes/_protect.php' ?>
<?php include '_includes/header.php'; ?>
<?php if (session_status() === PHP_SESSION_NONE ){session_start();}
include '_includes/_nav.php'; 
include '_includes/_modal.php'; 
include './_includes/_connect.php'; 
$privateCard = "none;";
if(isset($_GET['voucher'])){
    $privateCard = "block;";
}?>
<div class="container-fluid" >
    <div id="welcomeCard" class="card-content container-fluid">
    <br>
    <table class="table table-condensed" id="example">
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
    <br><br>
    </div>
    <div class="card-content" style="display: <?php echo $privateCard ?>">
        <?php include './_includes/_dropcode.php';?>
        <h3><b>RE: <?php echo $title ?></b></h3>
        <h4><b>Dropped on <?php echo $dropped_on;?></b></h4>
        <h5><b>Voucher: <?php echo $voucher;?> <a><span class="glyphicon glyphicon-copy"></span></a></b></h5>
        <hr>
        <p><?php echo $content?></p>
    </div>
</div>
<?php include '_includes/footer.php'; ?>
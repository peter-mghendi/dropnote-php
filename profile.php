<?php include '_includes/_protect.php'?>
<?php include '_includes/header.php'; ?>
<div class="container-fluid page-content">
    <div class="card-content">
    <h2><b>Profile</b></h2>
    <h4><b>Account Details for <?Php echo $_SESSION['username'] ?></b></h4>
    <h5>Here you can view edit your profile info.</h5>
    <span>
    <a href='_account/change.php' class='btn btn-sm btn-warning box-btn text-center'>EDIT PROFILE</a>
    <a href="javascript:voi(0)" onclick="return forreal()" id="btnDelUser" class='btn btn-sm btn-danger box-btn text-center'>DELETE MY ACCOUNT</a>
    <?php //href='_account/_deleteuser.php' ?> 
    </span>
    <table class="table" id="example">
        <!--<thead>
        <tr>
            <th>ITEM</th>
            <th>VALUE</th>
            <th>ACTION</th>
        </thead>-->
        <tbody>
        <?php
        include '_includes/_connect.php';
        $sql ="select * from users WHERE token = '{$_SESSION['token']}'";
        $result = mysqli_query($db,$sql);
        while($row =mysqli_fetch_row($result) ){
            $id = $row[0];
            $token = $row[4];

            echo "<tr>";
            echo "<td>Username:</td>";
            echo "<td>$row[1]</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Email:</td>";
            echo "<td>$row[2]</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Password</td>";
            echo "<td>$row[3]</td>";
            echo "</tr>";
            
            echo "<tr>";
            echo "<td>Token</td>";
            echo "<td>$row[4]</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    </div>
</div>
<?php include '_includes/footer.php'; ?>
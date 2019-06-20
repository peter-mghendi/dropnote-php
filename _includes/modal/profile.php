<div class="card">
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="view" role="tabpanel" aria-labelledby="view-tab">
                <table class="table table-borderless" id="table">
                    <caption>User ID: <?=$_SESSION['token'];?></caption>
                    <thead>
                    <tr>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
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
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="edit" role="tabpanel" aria-labelledby="edit-tab">
            <?php
                $changed = $_SESSION['token'];
                $sql ="select * from users WHERE token = '$changed'";
                $res = mysqli_query($db,$sql);
                $row =mysqli_fetch_row($res);
                $id = $row[0];
                ?>
                <form class="form" role="form" method="post">
                    <div class="form-group">
                        <label for="new_username">Username:</label>
                        <input type="text" class="form-control" name="new_username" id="new_username" placeholder="Username" autocomplete="off" value="<?php echo $row[1];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="new_email">Email:</label>
                        <input type="email" class="form-control" name="new_email" id="new_email" placeholder="Your Email" autocomplete="off" value="<?php echo $row[2];?>" required>
                    </div>
                    <button type="submit" class="btn btn-other" name="submit">Save</button>
                </form>
            </div>
            <div class="tab-pane" id="password" role="tabpanel" aria-labelledby="password-tab">
            <form class="form" role="form" method="post">
                    <div class="form-group">
                        <label for="old_password">Current Password:</label>
                        <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Current Password" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password:</label>
                        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="con_password">Confirm Password:</label>
                        <input type="password" class="form-control" name="con_password" id="con_password" placeholder="Confirm Password" autocomplete="off" required>
                    </div>
                    <button type="submit" class="btn btn-other" name="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>



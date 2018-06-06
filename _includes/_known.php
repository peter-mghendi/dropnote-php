<!doctype html>
<?php 
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
if(isset($_POST['description'])){
    require '_connect.php';
    extract($_POST);
    if(empty($subject)){
        $subject = "[Untitled]";
    }
    if((!isset($_SESSION['email']) and empty($mail)) or isset($reportAnonymous)){
        $user = "[Anonymous]";
    }elseif (isset($_SESSION['email']) and !isset($reportAnonymous)) {
        $user = $_SESSION['email'];
    } else {$user = $mail;}
    $sql_query = "INSERT INTO reports VALUES(NULL, '$subject', '$description', '$user')";
    mysqli_query($db, $sql_query);
}?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DropNote | Known Issues</title>
    <link rel="stylesheet" href="../_config/css/bootstrap.css"/>
    <link rel="stylesheet" href="../_config/css/custom.css">
    <link rel="stylesheet" href="../_config/css/dataTables.css"/>

</head>
<body>
<?php include 'nav/private_nav.php';?>
<div class="container-fluid" >
    <div id="known">
<?php

$filename = "../_config/_known.txt";
$file = fopen( $filename, "r" );
if(!$file){
   echo "Error in opening file: $filename";
   exit();
}
$filesize = filesize($filename);
$filetext = fread( $file, $filesize );
fclose( $file );

echo ( "File size : $filesize bytes" );
echo ( "<pre>$filetext</pre>" );
?>
        <span class="text-center"><button id="btnReportNew" class="btn box-btn"><span class="glyphicon glyphicon-fire"></span> Report New</button></span>
    </div>
    <div id="cardReport"class="card-content hidden-div">
        <button id="btnCloseReport" class="btn btn-sm btn-danger box-btn"><span class="glyphicon glyphicon-remove" style="float: right"></span></button>
        <form class="form" role="form" method="post" action="<?php $_PHP_SELF ?>">
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" maxlength="20" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" id="description" rows="10"  placeholder="ERROR/ISSUE/BUG description..." maxlength="200" autocomplete="off" required></textarea>
            </div>
            <fieldset style='display: <?php if( isset($_SESSION['email'])){echo 'block';} else {echo 'none';}?>'>
            <div class="form-group">
                <input type="checkbox" id="reportAnonymous" name="reportAnonymous">
                <label for="reportAnonymous">Send as Anonymous</label>
            </div>
            </fieldset>
            <fieldset style='display: <?php if( !isset($_SESSION['email'])){echo 'block';} else {echo 'none';}?>'>
            <div class="form-group">
                <label for="mail">Your Email:</label>
                <input type="email" class="form-control" name="mail" id="mail" placeholder="Email(Not Required)" maxlength="100" autocomplete="off">
            </div>
            </fieldset>
            <label><b>*NOTE: </b>Error Reports with email addresses attached will be given priority</label>
            <button type="submit" class="btn btn-other btn-block" name="submit" id="btnReport"><span class="glyphicon glyphicon-flag"></span> Report</button>
        </form>
    </div>
    <br><br>
</div>
<script type="text/javascript">
    var show = document.getElementById("btnReportNew");
    var hide = document.getElementById("btnCloseReport");
    var card = document.getElementById("cardReport");
    show.onclick = function(){
        card.style.display = "block";
    };
    hide.onclick = function(){
        card.style.display = "none";
    };
</script>
<script src="_config/js/custom.js"></script>
<script src="_config/js/jquery.min.js"></script>
<script src="_config/js/bootstrap.min.js"></script>
</body>
</html>
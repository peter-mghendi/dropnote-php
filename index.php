<?php include '_includes/header.php'; ?>
<div class="container-fluid" >
    <div id="welcomeCard" class="card-content text-center">
        <h3>DropNote</h3><hr>
        <p>Drop a Note or a Code above, or click one of the buttons below to access the corresponding information.</p>
        <span>
            <button id="one" class="btn btn-primary box-btn">Info</button>
            <button id="two" class="btn btn-primary box-btn">About</button>
            <button id="three" class="btn btn-primary box-btn">Help</button>
        </span>
    </div>
    <div id="cardone" class="card-content hidden-div" >
        <h3><span class="glyphicon glyphicon-info-sign"></span> Info</h3><hr>
        <p><span>Behold, we bring you DropNote! (Are you beholding?) The tool you never knew you needed (Because you probably don't). 
                Okay, I did this as a joke. But hey, here we are, and here it is. Just one rule though: don't make it a point listening 
                to words on a screen. Honestly, why are you even reading this? </span><br>
            <span>Okay don't get me wrong, I did this as seriously as anything else (ummmm...), but it may contain bugs that slipped past
                our notice (The ones that aren't intentional). Click <a href="_includes/_known.php"><span class="glyphicon glyphicon-hand-right">
                    </span> here <span class="glyphicon glyphicon-hand-left"></span></a> to view the bugs we've already caught, report the ones we 
                    haven't and/or discuss us putting in new ones for you to "catch". ;) </span><br>               
        </p>
        
    </div>
    <div id="cardtwo" class="card-content hidden-div">
        <h3><span class="glyphicon glyphicon-book"></span> About</h3><hr>
        <h4><span class="glyphicon glyphicon-hand-down"></span> DropNote v1.0.0.1</h4>
        <p><span><b>DISCLAIMER: </b><br></span>
        <span>1. Whatever you write here is your own problem. If it gets you arrested, don't drag me into it.
            Yeah. That about covers it. Oh, and no, I won't fix your computer.</span><br>
            <span>2. Any data you provide will not be shared with any third parties by DropNote (cough, cough...zuckerberg...cough).</span><br><br>
                Copyright <span class="glyphicon glyphicon-tent"></span> <?php echo date("Y");?>.  All rights reserved.
        </p>
        
        
    </div>
    <div id="cardthree" class="card-content hidden-div">
        <h3><span class="glyphicon glyphicon-question-sign"></span> Help</h3><hr>
        <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consequatur, culpa 
                cum deleniti, dolorum facere hic maiores nobis numquam optio recusandae sunt tempora ut! 
                Atque iusto maiores optio quaerat quo. </span>
            <span>Pissed off yet? Honestly, what did you expect?</span><br><br>
            <div class="text-center"><b><span class="glyphicon glyphicon-console"></span> WITH <span class="glyphicon glyphicon-heart"></span>
                    BY <span class="glyphicon glyphicon-tent"></span></b></div>
        </p>
    </div>
</div>
<?php include '_includes/footer.php'; ?>
<?php include '_includes/header.php'; ?>
<div class="container-fluid index" >
    <div id="welcomeCard" class="container card text-center">
        <div class="card-body">
            <h4 class="card-title">DropNote</h4>
            <p class="card-text mb-2">Drop a Note or a Code above, or click one of the buttons below to access the corresponding information.</p>
            <nav class="nav nav-pills nav-fill">
                <a id="pills-info-tab" class="nav-item nav-link active" href="#info" data-toggle="pill">
                    <i class="fas fa-info-circle mr-2"></i>Info</a>
                <a id="pills-about-tab" class="nav-item nav-link" href="#about" data-toggle="pill">
                    <i class="fas fa-question-circle mr-2"></i>About</a>
                <a id="pills-help-tab" class="nav-item nav-link" href="#help" data-toggle="pill">
                    <i class="fas fa-life-ring mr-2"></i>Help</a>
            </nav>
        </div>
    </div>

    <div class="container card tab-content" id="pills-tabContent">
        <div class="card-body tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="pills-info-tab">
            <h4 class="card-title"><i class="fas fa-info-circle mr-2"></i>Info</h4>
            <p class="card-text">Behold, we bring you DropNote! (Are you beholding?) The tool you never knew you needed (because you probably don't). 
                    Okay, I did this as a joke. But hey, here we are, and here it is. Just one rule though: don't make it a point listening 
                    to words on a screen. Honestly, why are you even reading this? </p>
                <p>Okay don't get me wrong, I did this as seriously as anything else (ummmm...), but it may contain bugs that slipped past
                    our notice (The ones that aren't intentional). Click <a href="https://www.github.com/l3njo/dropnote-web"><i class="far fa-hand-point-right mr-2"></i>here<i class="far fa-hand-point-left ml-2"></i></a> to 
                    view the bugs we've already caught, report the ones we 
                    haven't and/or discuss us putting in new ones for you to "catch". ;) </p>               
            </p>
        </div>
        <div class="card-body tab-pane fade" id="about" role="tabpanel" aria-labelledby="pills-about-tab">
            <h4 class="card-title"><i class="fas fa-question-circle mr-2"></i>About</h4>
            <h5 class="card-subtitle mb-2 text-muted"">DropNote v2.0</h5>
            <p class="card-text"><b>DISCLAIMER: </b></p>
            <p class="card-text">1. Whatever you write here is your own problem. If it gets you arrested, don't drag me into it.
                Yeah. That about covers it. Oh, and no, I won't fix your computer.</p>
            <p class="card-text">2. Any data you provide will not be shared with any third parties by DropNote (cough, cough...zuckerberg...cough).</p>
            <p class="card-text">&copy !boop <?=date("Y");?>.  All rights reserved.</p>
        </div>
        <div class="card-body tab-pane fade" id="help" role="tabpanel" aria-labelledby="pills-help-tab">
            <h4><i class="fas fa-life-ring mr-2"></i>Help</h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam consequatur, culpa 
                    cum deleniti, dolorum facere hic maiores nobis numquam optio recusandae sunt tempora ut! 
                    Atque iusto maiores optio quaerat quo.Pissed off yet? Honestly, what did you expect?</p>
            <p class="card-text text-center">
                <i class="fas fa-code mx-2"></i>WITH<i class="fas fa-heart mx-2"></i>BY<i class="fas fa-dizzy mx-2"></i>
            </p>
        </div>
    </div>
</div>
<?php include '_includes/footer.php'; ?>
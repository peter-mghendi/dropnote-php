<script type="text/javascript">
    var btnQr = document.getElementById("btnQr");
    var qrBack = document.getElementById("qrBack");
    var qrCard = document.getElementById("qrCard");
    var vcrCard = document.getElementById("voucherCard");
    btnQr.onclick = function() {
        vcrCard.style.display = "none";
        qrCard.style.display = "block";
    };
    qrBack.onclick = function() {
        qrCard.style.display = "none";
        vcrCard.style.display = "block";
    };
</script>
<script type="text/javascript">
        var visibleCard = document.getElementById("visibleNotes");
        var hiddenCard = document.getElementById("hiddenNotes");
        var btnShow = document.getElementById("btnShow");
        var btnHide = document.getElementById("btnHide");
        
        btnShow.onclick = function() {
            visibleCard.style.display = "none";
            hiddenCard.style.display = "block";  
        };
        btnHide.onclick = function() {
            visibleCard.style.display = "block";
            hiddenCard.style.display = "none";  
        };
</script>
<script src="_assets/js/index.js"></script>
<script src="_assets/js/custom.js"></script>
<script src="_assets/vendor/jquery/jquery-3.4.1.min.js"></script>
<script src="_assets/vendor/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
<script src="_assets/vendor/fontawesome-free-5.9.0-web/js/all.min.js"></script>
<script src="assets/vendor/datatables/datatables.min.js"></script>
</body>
</html>


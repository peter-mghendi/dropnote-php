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
<script src="_config/js/index.js"></script>
<script src="_config/js/custom.js"></script>
<script src="_config/js/jquery.min.js"></script>
<script src="_config/js/bootstrap.min.js"></script>
<script src="_config/js/qrcode.min.js"></script>
<script type="text/javascript">
   function() forreal{
   confirm("Do you want to continue ?");
   if( retVal === true ){
        alert("User wants to continue!");
        return true;
   }else{
        alert("User does not want to continue!");
	return false;
   }};   
</script>
</body>
</html>


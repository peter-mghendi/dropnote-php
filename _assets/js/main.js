"use strict";
$(document).ready( function () {
    $('.datatable').DataTable();
    
    $('[data-toggle="tooltip"]').tooltip({
        trigger: 'click',
        placement: 'bottom'
      });

    function flashTooltip(btn, message){
        $(btn).tooltip('hide')
            .attr('data-original-title', message)
            .tooltip('show');
        setTimeout(function() {
            $(btn).tooltip('hide');
        }, 1000);
    }
      
    var triggers = document.querySelectorAll("[data-trigger='copy']");
    var clipboard = new ClipboardJS(triggers);

    clipboard.on('success', function(e) {
        flashTooltip(e.trigger, 'Copied!');
        e.clearSelection();
    });
    
    clipboard.on('error', function(e) {
        flashTooltip(e.trigger, 'Press Ctrl+C to copy.');
    });

    var url = window.location.pathname;
    var filename = url.substring(url.lastIndexOf('/')+1);
  
    if(filename=='dropnote.php') {
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
    }

    if(filename=='drops.php') {
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
    }
} );

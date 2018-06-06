var modal_login = document.getElementById('loginModal');
var btnlogin = document.getElementById('btnlogin');
var btn_login = document.getElementById('btn_login');
var span_login = document.getElementById('close1');
var modal_signup = document.getElementById('signupModal');
var btnsignup = document.getElementById('btnsignup');
var btn_signup = document.getElementById('btn_signup');
var span_signup = document.getElementById('close2');
var modal_share = document.getElementById('shareModal');
var btnshare = document.getElementById('btnshare');
var btn_share = document.getElementById('btn_share');
var span_share = document.getElementById('close3');

btnlogin.onclick = function(){
    modal_login.style.display = "block";
    modal_signup.style.display = "none";
    modal_share.style.display = "none";
};
btn_login.onclick = function(){
    modal_login.style.display = "block";
    modal_signup.style.display = "none";
    modal_share.style.display = "none";
};
btnsignup.onclick = function(){
    modal_login.style.display = "none";
    modal_signup.style.display = "block";
    modal_share.style.display = "none";
};
btn_signup.onclick = function(){
    modal_login.style.display = "none";
    modal_signup.style.display = "block";
    modal_share.style.display = "none";
};
btnshare.onclick = function () {
    modal_login.style.display = "none";
    modal_signup.style.display = "none";
    modal_share.style.display = "block";
};
btn_share.onclick = function () {
    modal_login.style.display = "none";
    modal_signup.style.display = "none";
    modal_share.style.display = "block";
};

span_login.onclick = function() { 
    modal_login.style.display = "none";
    //modal_signup.style.display = "none";
};
span_signup.onclick = function(){
    //modal_login.style.display = "none";
    modal_signup.style.display = "none";
};
span_share.onclick = function(){
    modal_share.style.display = "none";
};
window.onclick = function(event){
    if (event.target === modal_login){
        modal_login.style.display = 'none';
    } else if (event.target === modal_signup){
        modal_signup.style.display = 'none';
    }else if (event.target === modal_share){
        modal_share.style.display = 'none';
    } 
};
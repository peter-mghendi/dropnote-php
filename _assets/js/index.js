var one = document.getElementById('one');
var two = document.getElementById('two');
var three = document.getElementById('three');
    
var cardone = document.getElementById('cardone');
var cardtwo = document.getElementById('cardtwo');
var cardthree = document.getElementById('cardthree');
    
one.onclick = function (){
    cardone.style.display = "block";
    cardtwo.style.display = "none";
    cardthree.style.display = "none";
};
two.onclick = function (){
    cardone.style.display = "none";
    cardtwo.style.display = "block";
    cardthree.style.display = "none";
};
three.onclick = function (){
    cardone.style.display = "none";
    cardtwo.style.display = "none";
    cardthree.style.display = "block";
};